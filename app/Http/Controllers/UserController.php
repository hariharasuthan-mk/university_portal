<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\User\FieldRequest;
use App\Http\Requests\User\updateFieldRequest;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Gate;
use App\University;
use App\Universitymember;



class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        /**/
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]); 
                
        $user = auth()->user();       
        
        $this->universitymember = new Universitymember();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $roles = Role::pluck('name','name')->all();
        $university = University::where('status', 'yes')->pluck('name','id')->toArray();
        
        return view('users.create',compact('roles','university'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldRequest $request)
    {   
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $validatedData = $request->validated();     
        $user = User::create($validatedData);
        $lastInsertedId= $user->id;

        $this->add_membership($request->input('organizations'),$lastInsertedId);


        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //Gate::allows('isSuperadmin');
        $user = User::find($id);
        $user_university = $this->universitymember->get_Univ_Group($id);
    
    return view('users.show',compact('user','user_university'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        $university = University::where('status', 'yes')->pluck('name','id')->toArray();

        $selected_university = Universitymember::where('status', 'yes')
                                        ->where('user_id', $id)
                                        ->pluck('university_id')->toArray();
        
        return view('users.edit',compact('user','roles','userRole','university','selected_university',));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateFieldRequest $request, $id)
    {   
        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);

        $this->get_membershipdetail($request->input('organizations'),$id);
        $validatedData = $request->validated(); 

        $user->update($validatedData);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function get_membershipdetail($request,$uid){

    $univ_mem = Universitymember::where('user_id', $uid)
                        ->pluck('id')->toArray();                        
        
        if(!empty($univ_mem)){            
            DB::table('Universitymember')->wherein('id',$univ_mem)->delete();
            //print ('deleted');
        }
        if($request){
           $input['organizations']    = $request;          

           foreach($input['organizations'] as $value){
            $univ_mem = new Universitymember;        
            $univ_mem->university_id = $value;
            $univ_mem->user_id       = $uid;
            $univ_mem->status        = 'yes';
            $univ_mem->save();
           }
        }
    }

    public function add_membership($request,$uid){

        if($request){
           $input['organizations']    = $request;

            foreach($input['organizations'] as $value){
                $univ_mem = new Universitymember;        
                $univ_mem->university_id = $value;
                $univ_mem->user_id       = $uid;
                $univ_mem->status        = 'yes';
                $univ_mem->save();
            }
        }
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Universitymember::where('user_id', '=', $id)->delete();
        User::find($id)->delete();       

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function getSNO($univid) {    

        $all_snousers = User::role('SNO')->pluck('id')->toArray();
        $sno_member_list = $this->universitymember->get_sno_list_byuniversity($univid);
        $univ_members = array();
        foreach($sno_member_list  as  $value){            
            $univ_members[] = $value->id;
        }
        $result_sno_member =array_intersect($all_snousers,$univ_members);        
        $all_snousers = User::whereIn('id', $result_sno_member)
                        ->pluck('name','id')->toArray();
        return json_encode($all_snousers);
    }
    
}