<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;

class Department extends Model
{
  protected $table = 'department';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name','university_id'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  
  public function course()
  {
    return $this->hasOne('App\Course');
  }

  public function getAllDepartment_Univ_bymembership($uid){

         $result = DB::table('university')
                           ->select('department.id as dep_id','university.id as id','university.name as name','university.status as status', 'users.name as authorby', 'department.name as deponame' )
                           ->where('universitymember.user_id', $uid)
                           ->join('users', 'university.author_id', '=', 'users.id')
                           ->join('department', 'department.university_id', '=', 'university.id')
                           ->join('universitymember','university.id', '=', 
                            'universitymember.university_id') 
                           ->groupBy('university.name')
                           //->orderBy('department.updated_at', 'desc')
                           //->orderBy('university.name', 'desc')
                           ->get();
                           
         return $result;
         
  }

  public function getAllDepartment_Univ_bymember($uid){

         $result = DB::table('university')
                           ->select('department.id as dep_id','university.id as id','university.name as name','university.status as status', 'users.name as authorby', 'department.name as deponame' )
                           ->where('universitymember.user_id', $uid)
                           ->join('users', 'university.author_id', '=', 'users.id')
                           ->join('department', 'department.university_id', '=', 'university.id')
                           ->join('universitymember','university.id', '=', 
                            'universitymember.university_id') 
                           //->orderBy('university.name', 'asc')
                           ->orderBy('department.updated_at', 'desc')
                           ->orderBy('university.name', 'desc')
                           ->paginate(5);
                           
         return $result;
         
  }
   public function getAllDepartment_Univ(){

         $result = DB::table('university')
                           ->select('department.id as dep_id','university.id as id','university.name as name','university.status as status', 'users.name as authorby', 'department.name as deponame' )
                           ->join('users', 'university.author_id', '=', 'users.id')
                           ->join('department', 'department.university_id', '=', 'university.id')
                           //->orderBy('university.name', 'asc')
                           ->orderBy('department.updated_at', 'desc')
                           ->orderBy('university.name', 'desc')
                           ->paginate(5);
                           //->get();
         return $result;
         /* //var_dump($getall) ;dd("hello index");
         $universities = DB::table('university')
                           ->select('university.id as id','university.name as name','university.status as status', 'users.name as authorby', 'department.name as deponame' )
                           ->join('users', 'university.author_id', '=', 'users.id')
                           ->join('department', 'department.university_id', '=', 'university.id')
                           ->get();
        */

  }
   public function get_single_department($id){
     $result = DB::table('department')
                       ->select('department.id as dep_id','department.university_id  as id','department.name as deponame', 'university.name as univname',
                       'department.created_at as created_at','department.updated_at as updated_at')
                       ->join('university', 'university.id', '=', 'department.university_id')
                       //->join('department', 'department.id', '=', $id)
                       ->where('department.id', $id)
                       ->get();
     return $result;
   }

   public function get_all_department_university(){
     $result = DB::table('department')
                       ->select('department.id as dep_id','department.university_id  as id','department.name as deponame', 'university.name as univname',
                       'department.created_at as created_at','department.updated_at as updated_at')
                       ->join('university', 'university.id', '=', 'department.university_id')
                       ->get();
     return $result;
   }

    


    public function get_Department_university_member($uid){

        $result = DB::table('department')
                           ->select('department.id as dep_id','department.name as name')
                           ->join('universitymember', 'universitymember.university_id', '=', 'department.university_id') 
                           ->where('department.university_id', $uid) 
                           ->orderBy('department.name', 'asc')
                           ->groupBy('department.name')
                           ->get();
        return $result;
    }

}
