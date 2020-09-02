<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\Studentbatch;
use App\Studentbatchhistory;
use App\Department;
use App\Universitymember;
use App\University;
use Gate;
use App\User;
use DB;
use App\Course;
use App\File;
use App\Student;
use App\Result;


class StudentbatchController extends Controller
{
    public function __Construct()
    {
    	$this->studentbatch        = new Studentbatch();
    	$this->studentbatchhistory = new Studentbatchhistory();
    	$this->department 		   = new Department();
    	$this->universitymember    = new Universitymember();
    	$this->file                = new File();
    	$this->student             = new Student();
    	$this->result              = new Result();
    	
    	$this->middleware('permission:studentbatch-list|studentbatch-create|studentbatch-edit|studentbatch-delete', ['only' => ['index','show']]);

        $this->middleware('permission:studentbatch-create', ['only' => ['create','store']]);

        $this->middleware('permission:studentbatch-edit', ['only' => ['edit','update']]);

        $this->middleware('permission:studentbatch-delete', ['only' => ['destroy']]);
    	/**/
    }

    public function index()
    {
    
    	$user = Auth::user();

		if(Gate::allows('checkrole_Superadmin')){
		$batch_list = $this->studentbatch->get_student_batch_all_summary_SA();
		$title =  'Student Batch Request';
		}
		elseif(Gate::allows('checkrole_Univadmin')){
		$title =  'University Student Batch Request';
		$batch_list = $this->studentbatch->get_student_batch_all_summary_SA();                 
		}
		elseif(Gate::allows('checkrole_SNO')){
		
		$title =  'University Student Batch Request';
		$batch_list = $this->studentbatch->get_student_batch_all_summary_SNO($user->id);
	    }
		else{
		//print 'Others';	
		$batch_list = $this->studentbatch->getmy_studentbatch_summary($user->id);
		$title =  'My Student Batch Request';
		}//var_dump(DB::getQueryLog());//dd(DB::getQueryLog());//var_dump($batch_list); dd("hello");

	$data = [
            'title' => $title,
            'studentbatchs_data' => $batch_list,
    		];
    	return view('studentbatches.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show(Studentbatch $studentbatch)
    {
    $id   = $studentbatch->id; 
    $obj = $this->file->get_batch_attachment($id);
    if($obj->count()>0){
    	$file_obj = $obj[0];
    }else{
    	$file_obj = null;
    }
    
    

    if(isset(Auth::user()->id)){$uid = Auth::user()->id;}else{$uid = 0;} 	
	$batch_full_list = $this->studentbatch->get_batchhistory_all_full($studentbatch->id);	
	
	$depo_obj        = $this->studentbatch->get_depart_by_batch($studentbatch->id);
	$department_name = $depo_obj->depo_name; 



	$depo_id 		 = $depo_obj->depo_id;	 	
    $univ_object     = $this->department->get_single_department($depo_id)->first();

    $university_name = $univ_object->univname;    
    
    $stu_his_user = Studentbatchhistory::where('batch_id',$id)
    						->pluck('responded')
    						->toArray(); 
    $responded = array_values($stu_his_user)[0];
	$requested = $studentbatch->requested;						

    
	$arr_batch_status =	array(
	'batch_initiation'=>'Batch Initiation',
	'denied'=>'Denied', 
	'inprogress'=>'In progress',
	'not_yet_started'=> 'Not Yet started',
	'waiting_for_approval'=>'Waiting for Approval',
	'approved'=>'Approved');

	if(Gate::allows('checkrole_TP')){

		$arr_batchhistory_status =	array(	
		'inprogress'=>'In progress',		
		'waiting_for_approval'=>'Waiting for Approval',
		);
	}
	else{
		$arr_batchhistory_status =	array(	
		'denied'=>'Denied',		
		'approved'=>'Approved');
	}

	
	$student_list   = $this->student->getmy_student_list($studentbatch['list']);

	
	$arr_final_results = Result::where('batch_id',$id)
    						->get();  			


    if(count($arr_final_results)>0){

    	$student_result_list   = $arr_final_results[0]->finallist;   
    	$student_result_status = $arr_final_results[0]->publish; 	
    	//print count($arr_final_results);
    	$result_id = $arr_final_results[0]->id;//var_dump($arr_final_results[0]->id);
    	$result_flag = true;
    	$student_result_list = Student::wherein('student.id',$student_result_list)->get();

    	
    }
    else{
    	$result_flag = false;
    	$student_result_list = null;
    	$result_id = null;
    	$student_result_status = null;
    }



	$selectbox_student_list = $this->student->getmy_student_list($studentbatch['list'])->pluck('name','id')->toArray();	

	

		$data = [
	            'title' => 'Batch Details',
	            'batch_data' => $studentbatch ,	            
	            'batch_history' => $batch_full_list,
	            'arr_batch_status' => $arr_batch_status, 
	            'arr_batchhistory_status' => $arr_batchhistory_status,
	            'department'  => $department_name,
	            'university'  => $university_name,   
	            'loggedin_userid' => $uid, 
	            'batchhis_request' => $requested,
	            'batchhis_responded' => $responded,
	            'depo_id' => $depo_obj->depo_id,   
	            'file_obj' => $file_obj, 
	            'student_list' => $student_list,
	            //'student_result' => $student_result,
	            'student_result_list' => $student_result_list,
	            'result_flag'=> $result_flag,
	            'box_student_list' =>$selectbox_student_list,
	            'result_id' => $result_id,
	            'student_result_status' => $student_result_status,
	    ];

    return view('studentbatches.show', $data);
    }

    public function create()
   	{

   	 if(isset(Auth::user()->id)){$id = Auth::user()->id;}else{$id = 0;}
    
     if(!Gate::allows('checkrole_TP')){

     $arr_batch_status = array(
		'batch_initiation'=>'Batch Initiation',
		'denied'=>'Denied', 
		'inprogress'=>'In progress',
		'not_yet_started'=> 'Not Yet started',
		'waiting_for_approval'=>'Waiting for Approval',
		'approved'=>'Approved');

$selected_status=array('denied'); 

$univ_obj = Universitymember::where('user_id',$id)
    ->first();

$univ_obj = Universitymember::where('user_id',$id)
                            ->first();
$user_university = $univ_obj->university_id;

		

$select_univ = University::where('id',$user_university)
				->pluck('name','id')->toArray();

$universitymember_list = $this->universitymember->get_University_By_User($id);
	  $arr = array();
	  foreach($universitymember_list as $value){	  	
	  	array_push($arr,$value->univid);
	  }	  
	  $all = University::whereIn('id', $arr)
				->pluck('name','id')->toArray();

	  }
	  else{

	  $arr_batch_status = array('batch_initiation'=>'Batch Initiation');
	  $selected_status=array('batch_initiation');

	  $universitymember_list = $this->universitymember->get_University_By_User($id);
	  $arr = array();
	  foreach($universitymember_list as $value){	  	
	  	array_push($arr,$value->univid);
	  }	  
	  $all = University::whereIn('id', $arr)
				->pluck('name','id')->toArray();
	  $first = array( "selectuniversity");

	  $university_id = $universitymember_list[0]->univid;

	  $univ_obj = Universitymember::where('user_id',$id)
	                            ->first();
	  $user_university = $univ_obj->university_id;

	  $select_univ = University::where('id',$user_university)
					->pluck('name','id')->toArray();
	}

	//Course::where

	

	$univid_with_organization = Universitymember::where('user_id', $id)
    ->join('users', 'universitymember.user_id', '=', 'users.id')
    ->join('university', 'university.id', '=', 
    	  'universitymember.university_id')
    ->select('universitymember.university_id as uid','universitymember.id','users.name','university.name')->first()->toArray();

 

   $course_data = Course::where('university_id',
    $univid_with_organization["uid"])    
    ->pluck('name','id')->toArray();
   



	$data = [ 'title' => 'Add StudentBatch',
                'loggedin_userid' => $id,
                'batch_select_box' =>  $arr_batch_status,
                'selected_status' => $selected_status,               
                'university_select' => $all,
                'course_box' => $course_data, 
                          
              ];

    return view('studentbatches.create',$data);

    }

    public function store(Request $request)
    {
    	$validatedData = request()->validate(
    		[
	        'batchname' => ['required','unique:studentbatch','min:5'],
	        'requested' => 'required',
	        'status'	=> 'required',
	        'file' => 'required|mimes:pdf|max:20000',	        
	      	],
	      	[
	        'batchname.required' => 'You have to choose Studentbatchname',
	        'batchname.min'=> 'Studentbatch Should be Minimum of 5 Character', // custom message
	        'batchname.unique'=> 'The Studentbatch has already been',

	    	]
	    );
        
        $input = $request->all();       

        $input['batchname']    = $request->input('batchname');
		$input['status']       = $request->input('status');
		$input['requested']    = $request->input('requested');
		$input['list']         = $request->input('student_list');
		$input['course_id']    = $request->input('course_box');
		


		$studentbatch   = Studentbatch::create($input);
        $lastInsertedId = $studentbatch->id;


        // File Upload
        $fileModel = new File;

        if($request->file()) {

        	$fileName   = time().'_'.$request->file->getClientOriginalName();
        	//var_dump($fileName);dd($request->file());
       		$filePath = $request->file('file')->storeAs('studentfiles', $fileName, 'public');

       		$fileModel->file_path   = $filePath;
        	$fileModel->author_by   = $request->requested;
            $fileModel->assigned_to = $request->responded; 
            $fileModel->batch_id    = $lastInsertedId;
            $fileModel->save();	

            //dd($filePath);
        }



$studentbatch_history  = new Studentbatchhistory;
$studentbatch_history->requested   = $request->input('requested');
$studentbatch_history->subject     = $request->input('subject');
$studentbatch_history->body        = $request->input('body');
$studentbatch_history->responded   = $request->input('responded');
$studentbatch_history->depo_id     = $request->input('department');
$studentbatch_history->batch_id    = $lastInsertedId;
$studentbatch_history->batch_status= $request->input('batchhistory_status');
$studentbatch_history->save();
//dd('history store adding..');
$studentbatch_history->save();

return redirect()->route('studentbatchs.index')
                        ->with('success','Studentbatch created successfully.');
    }


    public function getDepartments($id) {
    	
        $departments = Department::where("university_id",$id)->pluck("name","id");
        return json_encode($departments);

    }

    
}
