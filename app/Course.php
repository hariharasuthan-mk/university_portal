<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\University;

class Course extends Model
{
    //

    protected $table = 'course';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = [
        'name', 'duration', 'status', 'author_id', 'university_id', 'department_id',
    ];

   
   

    public function university()
    {
        return $this->belongsTo('App\University', 'university_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }
    
    public function getAll_Course(){

        $result = DB::table('course')
                          ->select('course.id as id','course.name as name',
                          	'course.duration as duration',
                          	'course.author_id as author_id',
                          	'course.status as status',
                          	'users.name as authorby')                          
                ->join('users', 'course.author_id', '=', 'users.id')
						  //->where('course.status', 'yes')  
						  //->groupBy('course.name')
                          ->orderBy('course.created_at', 'desc')
                          ->paginate(5);                           
                          //->get();
    	return $result;
	}

  public function getAll_Course_bymember($uid){

        $result = DB::table('course')
                          ->select('course.id as id','course.name as name',
                          	'course.duration as duration',
                          	'course.status as status',
                          	'course.author_id as author_id',
                          	'users.name as authorby')                          
                          ->join('users', 'course.author_id', '=', 'users.id')
//->join('universitymember','course.id', '=','universitymember.university_id') 
					      ->where('course.author_id', $uid) 
						  //->where('course.status', 'yes')  
						  //->groupBy('course.name')         
                          ->orderBy('course.created_at', 'desc')
                          ->paginate(5);                          
                          //->get();
      return $result;
  }


}
