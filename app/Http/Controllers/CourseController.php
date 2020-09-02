<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Gate;
use App\User;
use App\Course;
use App\Universitymember;
use App\University;
use App\Department;

class CourseController extends Controller
{
    //
    
    function __construct()
    {
    	$this->course = new Course();

        $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);

        $this->middleware('permission:course-create', ['only' => ['create','store']]);

        $this->middleware('permission:course-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:course-delete', ['only' => ['destroy']]);

        
    }


    public function index()
  	{  
      /*
      $user = Auth::user();

      if(Gate::allows('checkrole_Superadmin')){
        //print 'login as superadmin';
        $courses = $this->course->getAll_Course();
      }  
      else{
        //print 'other user';
        $courses = $this->course->getAll_Course_bymember($user->id);//
      }

      $data = [
          'title' => 'Course List' ,
          'course_data' => $courses ,          
      ];

      return view('courses.index', $data);
      */
      if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

      $title  = 'Course List';

      $courses = Course::where('author_id',$id)->with('university')->get();

      return view('courses.index1', compact('courses','title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
    	//print 'show';
    	$data = [
          'title' => 'Individual Course page',
          'courses_data' => $course,
      	];

      return view('courses.show', $data);     
             
    }

    public function create()
    {
      //print 'create';
      if(isset(Auth::user()->id)){$uid = Auth::user()->id;}else{$uid = 0;}
      //print 'uid'.$uid;
      $univ_obj = Universitymember::where('user_id',$uid)
    						->pluck('university_id')->toArray();
      
      //var_dump($univ_obj[0]);

      $university_belongsto = $univ_obj[0];

      $university_obj = University::where('id',$university_belongsto)
                       ->pluck('name')->toArray();          
      //var_dump($university_obj[0]);

      $status_select = array('yes'=>'Yes','no'=> 'No');
      //print $university_obj[0];
      $departments = Department::where("university_id",$id=$univ_obj[0])->pluck("name","id")->toArray();

      $data = [ 'title' => 'Add Course',
                'loggedin_userid' => $uid,
                'university_belongsto' => $university_belongsto,
                'status_select' => $status_select,
                'university_name' => $university_obj[0],
                'departments_box' => $departments,
              ];

      return view('courses.create',$data);
    }

    public function store(Request $request)
    {

       $input = $request->all();
       
      $validatedData = request()->validate(
                  [
                    'name' => [ 'required',                    
                                    Rule::unique('course')->where(

                                    	function ($query) {
return $query->where('duration', request('duration'))
             ->where('author_id', request('author_id'));
                                    })
                                ],
					'duration' => ['required','min:3'],

                  ],
                   [                    
            'name.unique'=> "The Coursename has already been taken to the same University with same duration",  
            'name.required' => 'You have to add Course name', 
     'duration.required' => 'You have to add Course duration', 

                  ]
      );

      $course  = new Course;        
      $course->author_id        = $request->input('author_id');
      $course->university_id    = $request->input('university_id');
      $course->department_id    = $request->input('department_id');
      $course->name             = $request->input('name');
      $course->duration         = $request->input('duration');
      $course->status           = $request->input('status');
      $course->save();//dd($course);

     return redirect()->route('course.index')
                        ->with('success','Course successfully created');
    }

    public function edit(Course $course)
	{
	  //print 'edit course';

    //var_dump($course->university_id);dd("dfd");

    
    $departments = Department::where("university_id",$id=$course->university_id)->pluck("name","id")->toArray();
    
    
	    $data = [
	          'title' => 'Edit Course page',
	          'courses_data' => $course ,
            'departments_box' => $departments,
	    ];
	    return view('courses.edit', $data);

	}

	public function update(Request $request, Course $course)
	{
	    //print 'update course';
	    $validatedData = request()->validate([
            'name' => 'required',
            'author_id' => 'required',
            'duration' => 'required',
            'status' => 'required',
        ]);

	    //$course->update($validatedData);
      //$course  = new Course;  
      $input = $request->all();

      $course->author_id        = $request->input('author_id');
      $course->university_id    = $request->input('university_id');
      $course->department_id    = $request->input('department_id');
      $course->name             = $request->input('name');
      $course->duration         = $request->input('duration');
      $course->status           = $request->input('status');
      $course->save();//dd($course);

	    return redirect('course')
                   ->with('success','Course updated successfully');

	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')
                        ->with('success','Course deleted successfully');
    }


    /*
    public function getCourseDepoUniv($query) {

        parse_str($query,$array);
        $UnivId = $array['UnivId'];
        $DepoId = $array['DepoId'];

        // print $UnivId.'<br/>'; print $DepoId.'<br/>';

        $course_data = Course::where("university_id",$id=$UnivId
        )->where("department_id",$id=$DepoId)
        ->where("status","yes")
        ->pluck("name","id");
        //var_dump($course_data);
        return json_encode($course_data);
    }
    */

    public function getCourseDepoUniv($id1,$id2) {

        /*
        parse_str($query,$array);
        $UnivId = $array['UnivId'];
        $DepoId = $array['DepoId'];

        print $UnivId.'<br/>';
        print $DepoId.'<br/>';
        */

        $course_data = Course::where("university_id",$id=$id1
        )->where("department_id",$id=$id2)
        ->where("status","yes")
        ->pluck("name","id");
        //var_dump($course_data);
        return json_encode($course_data);
    }

}
