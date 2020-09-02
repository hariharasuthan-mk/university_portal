<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use DB;
use Gate;
use App\Department;
use App\University;



class StudentController extends Controller
{
    //
    public function __Construct()
    {
    	$this->student = new Student();  
    	$this->department = new Department();
        $this->university = new University();
  	
    	$this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','show']]);
        $this->middleware('permission:student-create', ['only' => ['create','store']]);
        $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    	/**/
    }

    public function index()
    {
     //\DB::connection()->enableQueryLog();

     $user = Auth::user();
     if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

     if(Gate::allows('checkrole_Superadmin')||(Gate::allows('checkrole_SNO'))){       
        $students_data = Student::latest()->paginate(20);

        //$queries = \DB::getQueryLog();dd($queries);

        $data = [
         'title' => 'Student List' ,
         'data' => $students_data ,
        ];    
        return view('student.superadminindex', $data);
      }  
      else{
        //print 'login as others';
        $students_data = $this->student->getStudent_Univ_bymember($id);
        //Student::latest()->paginate(5);       
      //$all_students_university = $this->student->getAllStdent_List($user->id);
        $data = [
         'title' => 'Student List' ,
         'data' => $students_data ,
        ];
        return view('student.index', $data);
      } 
    
     
   }

   public function create()
    {
      if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}

      if(Gate::allows('checkrole_Superadmin')){
      $universities = $this->university->getAll_Univ();
      }
      else{
      $universities = $this->university->getAll_Univ_bymember($id);
      }     

      $data = [ 'title' => 'Add student under university, department' ,
                'university_data' => $universities,
                'loggedin_userid' => $id ];
      //var_dump($universities);  dd("hello");

       return view('student.create',$data);
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
                    'fullname'   => ["required",'min:3'],
                    //'university_id' => ["required"],
                    //'department_id' => ["required"],
                    'sex'   => ["required"],
                  ],
                   [
                    'name.required' => "You have to choose Department",
                    'fullname.required' => "You have to choose Fullname",
                    'sex.required' => "You have to choose Sex",
                    'name.min'=> "Department Should be Minimum of 3 Character",
                  ]
      );        

        $input = $request->all();
        $input['name']          = $request->input('name');
    		$input['fullname']      = $request->input('fullname');
    		$input['sex']           = $request->input('sex');
    		$input['department_id'] = $request->input('department');
    		$input['university_id'] = $request->input('university');

        Student::create($input);//var_dump($validatedData);dd($request->all());
        return redirect('student');
     }

    /**
      * Display the specified resource.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */    

     public function show(Student $student)
     {
        $data = [
            'title' => 'Individual Student page',
            'student_data' => $student ,
            //'author_name' => $name,
        ];
        return view('student.show', $data);
     }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\State  $state
      * @return \Illuminate\Http\Response
      */
     public function edit(Student $student)
     {
      
      /**/
      var_dump($student->university_id);var_dump($student->department_id);
      dd("dfd");dd("hello");	
      

      $departments = Department::where("university_id",$id=$student->department_id)->pluck("name","id")->toArray();

      $departments = Department::where("university_id",$id=$student->department_id)->pluck("name","id")->toArray();

      $data = [
	          'title' => 'Edit Course page',
	          //'student_data' => $course ,
            'departments_box' => $departments,
            'university_box' => $universities,
	  ];
      
      return view('student.edit', $data);
      
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
    */

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('student');
    }

    public function getStudentCourse($id1,$id2) {

        $student_data = Student::where("university_id",$id=$id1
        )->where("department_id",$id=$id2)        
        ->pluck("name","id");
        //var_dump($course_data);
        return json_encode($student_data);
    }
}
