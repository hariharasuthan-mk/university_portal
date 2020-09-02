<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\User;
use App\Http\Requests\University\FieldRequest;
use App\Http\Requests\University\updateFieldRequest;


class UniversityController extends Controller
{
    //
    function __construct()
    {
    	$this->university = new University();
        
        $this->middleware('permission:university-list|university-create|university-edit|university-delete', ['only' => ['index','show']]);

        $this->middleware('permission:university-create', ['only' => ['create','store']]);

        $this->middleware('permission:university-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:university-delete', ['only' => ['destroy']]);
        
    }
    public function index()
  	{
      $user = Auth::user();
      if(Gate::allows('checkrole_Superadmin')){
        //print 'login as superadmin';
        $universities = $this->university->getAll_Univ()->paginate(5);
      }  
      else{
        //print 'other user';
        $universities = $this->university->getAll_Univ_bymember($user->id);
      }
      
      $data = [
          'title' => 'University List' ,
          'university_data' => $universities ,
      ];
      return view('universities.index', $data);
   }

   public function create()
   {
      if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

      $data = [ 'title' => 'Add University',
                'loggedin_userid' => $id];

      return view('universities.create',$data);
   }

   public function store(FieldRequest $request)
    {
      $validatedData = $request->validated();     
      University::create($validatedData);//University::create($request->all());

      return redirect()->route('universities.index')
                        ->with('success','University created successfully.');
    }


    /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\State  $state
   * @return \Illuminate\Http\Response
   */
	public function edit(University $university)
	{
	    $data = [
	          'title' => 'Edit University page',
	          'universities_data' => $university ,
	    ];
	    return view('universities.edit', $data);

	}

	/**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\State  $state
   * @return \Illuminate\Http\Response
   */
	public function update(updateFieldRequest $request, University $university)
	  {    
      $validatedData = $request->validated();  
	    $university->update($validatedData);
	    return redirect('universities')
                   ->with('success','University updated successfully');

	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
    	$data = [
          'title' => 'Individual University page',
          'universities_data' => $university ,
      	];

      return view('universities.show', $data);       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->delete();


        return redirect()->route('universities.index')
                        ->with('success','University deleted successfully');
    }


}
