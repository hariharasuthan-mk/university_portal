<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'finallist', 'author_id', 'requested_to', 'publish', 'batch_id', 'body','course_id',
    ];
    protected $casts = [
         'finallist' => 'json',
    ];

    public function course()
	  {
	    return $this->belongsTo('App\Course', 'course_id', 'id');
	  }

	  /**/
    public function batch()
    {
      return $this->belongsTo('App\Studentbatch', 'batch_id', 'id');
    }
    
    public function request()
    {
      return $this->belongsTo('App\User', 'requested', 'id');
    }


	 public function getmy_student_result($batch_id){
      
      //return $batch_id ;

      $result = DB::table('results')
                          ->select('results.finallist as finallist',
                            'results.body as body',
                            'users.name as name',
                          )
      ->Leftjoin('users','results.author_id','=','users.id')
                      ->where('results.batch_id', $batch_id)
                      //->groupBy('studentbatch.batchname')
                      //->orderBy('studentbatch.created_at', 'desc')                      
                      ->get();

        return $result;
    }

	



}
