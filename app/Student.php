<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = [
        'name', 'sex','fullname', 'university_id', 'department_id',
    ];

    public function university()
    {
        return $this->belongsTo('App\University', 'university_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }

  public function get_studentresult_list($arr_stid){
      
        $result = DB::table('student')
                          ->select('student.id as id',
                            'student.name as name',
                            'student.fullname as fullname',
                            'student.sex as sex',                            
                          )                  
                      ->wherein('student.id', $arr_stid)
                      ->orderBy('student.created_at', 'desc')
                      ->get();
        return $result;
  }  

  public function getmy_student_list($arr_stid){

    	
        $result = DB::table('student')
                          ->select('student.id as id',
                            'student.name as name',
                            'student.fullname as fullname',
                            'student.sex as sex',
                            'department.name as depo_name',
                            'university.name as univ_name',
                          )
                  ->join('department','department.id','=','student.department_id') 
                  ->join('university','university.id','=','student.university_id')
                      ->wherein('student.id', $arr_stid)
                      ->orderBy('student.created_at', 'desc')
                      ->get();
        return $result;
	}

  public function getAllStdent_List(){

         $result = DB::table('student')
                           ->select('student.id as stu_id',
                            'student.name as stu_id','student.id as stu_id',
                            'student.id as stu_id',
                            'university.id as id','university.name as name','university.status as status', 'users.name as authorby', 'department.name as deponame' )
                           ->join('users', 'university.author_id', '=', 'users.id')
                           ->join('department', 'department.university_id', '=', 'university.id')
                           //->orderBy('university.name', 'asc')
                           ->orderBy('department.updated_at', 'desc')
                           ->orderBy('university.name', 'desc')
                           ->paginate(5);
                           //->get();
         return $result;         

  }

  public function getStudent_Univ_bymember($uid){

        $result = DB::table('university')
                          ->select('student.id as id','student.name as name',
                            'student.sex as sex','student.fullname as fullname',
                            'student.university_id as university_id',
                             'student.department_id as department_id',
                             'university.name as university',
                             'department.name as department',
                            )
                          ->where('university.status', 'yes')
                          ->where('universitymember.user_id', $uid)
                          ->join('users', 'university.author_id', '=', 'users.id')                           
                          ->join('universitymember','university.id', '=', 
                            'universitymember.university_id')
                          ->join('student','student.university_id', '=', 
                            'universitymember.university_id')    
                          ->join('department','student.department_id', '=', 
                            'department.id')                   
                          //->groupBy('university.name')
                          ->orderBy('student.created_at', 'desc')
                          ->orderBy('university.created_at', 'desc')
                          ->paginate(20);                          
                          //->get();
      return $result;
  }

}
