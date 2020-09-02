<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Studentbatch extends Model
{
    protected $table = 'studentbatch';
    protected $fillable = [
        'batchname', 'status', 'requested', 'list', 'course_id',
    ];
    protected $casts = [
         'list' => 'json',
     ];
    
  public function course()
  {
        return $this->belongsTo('App\Course', 'course_id', 'id');
  }

 	public function getmy_studentbatch_summary($id){

        $result = DB::table('studentbatch')
                          ->select('studentbatch.id as id',
                            'studentbatch.batchname as batchname',
                            'studentbatch.status as batchstatus',
                            'studentbatch.status as batchstatus',
                            'studentbatch.created_at as requestedon',
                            'studentbatch.updated_at as updatedon',
                            'studentbatchhistory.requested as owner',
                          )
      ->join('studentbatchhistory','studentbatchhistory.batch_id','=','studentbatch.id')
                      ->where('studentbatch.requested', $id)
                      ->groupBy('studentbatch.batchname')
                      ->orderBy('studentbatch.created_at', 'desc')
                      ->get();

        return $result;
	}

  public function get_student_batch_all_summary_SNO($id){

        $result = DB::table('studentbatch')
                          ->select('studentbatch.id as id',
                            'studentbatch.batchname as batchname',
                            'studentbatch.status as batchstatus',
                            'studentbatch.created_at as requestedon',
                            'studentbatch.updated_at as updatedon',
                            'studentbatchhistory.requested as owner',
                          )
->where('studentbatchhistory.responded', $id)
->join('studentbatchhistory','studentbatchhistory.batch_id','=','studentbatch.id')
->groupBy('studentbatch.batchname')
->orderBy('studentbatch.created_at'  )
                          ->get();
        return $result;
  }

	public function get_student_batch_all_summary_SA(){

        $result = DB::table('studentbatch')
                          ->select('studentbatch.id as id',
                          	'studentbatch.batchname as batchname',
                          	'studentbatch.status as batchstatus',
                            'studentbatch.created_at as requestedon',
                            'studentbatch.updated_at as updatedon',
                            'studentbatchhistory.requested as owner',
                          )
->join('studentbatchhistory','studentbatchhistory.batch_id','=','studentbatch.id')
->groupBy('studentbatch.batchname')
->orderBy('studentbatch.created_at'  )
                          ->get();
        return $result;
	}


  public function get_batchhistory_all_full($batch_id){

        $result = DB::table('studentbatch')
              ->select('studentbatch.id as id',
  'studentbatch.batchname as batchname',
  'studentbatchhistory.subject as comment',
  'studentbatchhistory.body as body',
  'studentbatchhistory.requested as requested',
  'studentbatchhistory.responded as responded',  
  'studentbatchhistory.batch_status as detail_status',
  'studentbatchhistory.created_at as detail_requestedon',
  'studentbatchhistory.updated_at as detail_updatedon',
  )
->where('studentbatchhistory.batch_id', $batch_id)
->join('studentbatchhistory','studentbatchhistory.batch_id','=','studentbatch.id')
->orderBy('studentbatchhistory.created_at')
->get();
        return $result;
  }

  public static function get_user_detail($id){
      $result = DB::table('users')
                          ->select('users.id as id','users.name as name','users.email as email')
                          ->where('users.id', $id)                  
                          ->get();    
      return $result;
    } 


  public function get_depart_by_batch($batch_id){
      $result =  DB::table('studentbatchhistory')
              ->select('studentbatchhistory.id as id',
              'studentbatchhistory.depo_id as depo_id',
              'department.id as department_id',
              'department.name as depo_name'
              )
        ->where('studentbatchhistory.batch_id', $batch_id)
        ->join('department','studentbatchhistory.depo_id','=','department.id')
        ->first();
      return $result ;
  }
  
 

  

}
