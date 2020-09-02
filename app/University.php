<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class University extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
   	protected $table = 'university';
    protected $fillable = [
        'name', 'author_id','status',
    ];
    protected $hidden = [
      'author_id',
 	];

  public function course()
  {
    return $this->hasOne('App\Course');
  }
  
 	public function getAll_Univ(){

        $result = DB::table('university')
                          ->select('university.id as id','university.name as name','university.status as status', 'users.name as authorby')
                          ->where('status', 'yes')
                          ->join('users', 'university.author_id', '=', 'users.id')
                          ->orderBy('university.created_at', 'desc');

                          //->get();
    	return $result;
	}

  public function getAll_Univ_bymember($uid){

        $result = DB::table('university')
                          ->select('university.id as id','university.name as name','university.status as status', 'users.name as authorby')
                          ->where('university.status', 'yes')
                          ->where('universitymember.user_id', $uid)
                          ->join('users', 'university.author_id', '=', 'users.id')                           
                          ->join('universitymember','university.id', '=', 
                            'universitymember.university_id')                   
                          //->groupBy('university.name')
                          ->orderBy('university.created_at', 'desc')
                          ->paginate(5);                          
                          //->get();
      return $result;
  }

  public function getAll_Univ_list(){

        $result = DB::table('university')
                          ->select('university.id as id','university.name as name','university.status as status', 'users.name as authorby')
                          ->where('status', 'yes')
                          ->join('users', 'university.author_id', '=', 'users.id')
                          ->orderBy('university.created_at', 'desc')                                                    
                          ->get();
      return $result;
  }

  


}
