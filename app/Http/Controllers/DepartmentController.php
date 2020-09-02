<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Department;
use App\University;
use DB;
use Gate;


class DepartmentController extends Controller
{

  public function __Construct()
  {
      $this->department = new Department();
      $this->university = new University();

      $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','show']]);

        $this->middleware('permission:department-create', ['only' => ['create','store']]);

        $this->middleware('permission:department-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:department-delete', ['only' => ['destroy']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
     $user = Auth::user();

     if(Gate::allows('checkrole_Superadmin')){
        //print 'login as superadmin';
        $all_departments_university = $this->department->getAllDepartment_Univ();
      }      
      else{
       //print 'login as others';
       $all_departments_university = $this->department->getAllDepartment_Univ_bymember($user->id); 
      }     

     $data = [
         'title' => 'University based Department List' ,
         'department_data' => $all_departments_university ,
     ];
     return view('department.index', $data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
      if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

      if(Gate::allows('checkrole_Superadmin')){
      $universities = $this->university->getAll_Univ();//->paginate(5);
      }
      else{
      $universities = $this->department->getAllDepartment_Univ_bymembership($id); 
      }

      

      $data = [ 'title' => 'Add department under university' ,
                'university_data' => $universities,
                'loggedin_userid' => $id ];
      //var_dump($universities);  dd("hello");


       return view('department.create',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       
       $validatedData = request()->validate(
                  [
                    'name'       => ["required",'min:3'],
                    'university_id' => ["required"],
                    'name' => [
                                    'required',
                                    Rule::unique('department')->where(function ($query) {
                                        return $query->where('university_id', request('university_id'));
                                    })
                                ]
                  ],
                   [
                    'name.required' => "You have to choose Department",
                    'name.unique'=> "The Department has already been taken to another University",
                    'name.min'=> "Department Should be Minimum of 3 Character",
                  ]
      );
      //var_dump($validatedData);dd($request->all());

      Department::create($validatedData);
      return redirect('departments');

        

     }
     /**
      * Display the specified resource.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
       
       $department_university = $this->department->get_single_department($id);

       $data = [
           'title' => 'Individual Department page',
           'department_data' => $department_university ,
       ];

       return view('department.show', $data);

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
      if(isset(Auth::user()->id)){$uid = Auth::user()->id;}else{$uid = 0;}
      if(Gate::allows('checkrole_Superadmin')){
      $all_university_list = $this->university->getAll_Univ_list();// all department list
      }
      else{      
      $all_university_list = $this->university->getAll_Univ_bymember($uid);
      // all member department      
      //$this->department->getAllDepartment_Univ_bymembership($id); 
      //$this->university->getAll_Univ_list();// all department 
      }

      $department_university = $this->department->get_single_department($id);

      $data = [
           'title' => 'Edit department page',
           'department_data' => $department_university ,
           'departmentid' => $id,
           'all_university_list' => $all_university_list,
       ];
       return view('department.edit', $data);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */

     public function update($id, Request $request)
     {

       
       $validatedData = request()->validate(
                  [
                    'name'       => ["required",'min:3'],
                    'university_id' => ["required"],
                    'name' => [
                                    'required',
                                    Rule::unique('department')->where(function ($query) {
                                        return $query->where('university_id', request('university_id'));
                                    })
                                ]
                  ],
                   [
                    'name.required' => "You have to choose Department",
                    'name.unique'=> "The Department has already been taken to another University",
                    'name.min'=> "Department Should be Minimum of 3 Character",
                  ]
      );


       $depo = Department::find($id); // new Department;
       $depo->name = $request->input('name');
       $depo->university_id = $request->input('university_id');

       $depo->save();
       return redirect('departments');

     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */

     public function destroy(Department $department)
     {
       
       $department->delete();
       return redirect('departments');
     }

}
