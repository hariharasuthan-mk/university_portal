<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Universitymember extends Model
{
    //
    protected $table = 'universitymember';
    protected $fillable = [
        'name', 'university_id','status', 'user_id',
    ];
    protected $hidden = [
      'author_id',
 	];


 	public function get_Univ_Group($id){

        $result = DB::table('universitymember')
                          ->select('university.id as id','university.name as name','university.status as status')
                          ->where('universitymember.status', 'yes')
                          ->where('universitymember.user_id', $id)
                          ->join('university', 'university.id', '=', 'universitymember.university_id')
                          ->orderBy('university.created_at', 'desc')
                          ->get();
        return $result;
	}

  public function get_University_By_User($userid){
        $result = DB::table('universitymember')
                          ->select('universitymember.university_id as univid')
                          ->where('universitymember.status', 'yes')
                          ->where('universitymember.user_id', $userid)
                          ->get();  
        return $result;                        
  }

  public function get_University_SNO($userid){
        $result = DB::table('universitymember')
                          ->select('universitymember.id as id',
                            'universitymember.university_id as univid','universitymember.status as status')
                          ->where('universitymember.status', 'yes')
                          ->where('universitymember.user_id', $userid)
                          ->get();  
        return $result;                        
  }

  public function get_sno_list_byuniversity($unv_id){
         $result = DB::table('universitymember')
                          ->select( 'users.id as id')
                          ->join('users', 'users.id', '=', 
                            'universitymember.user_id')
                          ->where('universitymember.status', 'yes')
                          ->where('universitymember.university_id', $unv_id)
                          ->get();                          
        return $result; 
  }

}
