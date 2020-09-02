<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class File extends Model
{
	protected $table = 'files';
    protected $fillable = [
        'name',
        'file_path',
        'author_by',
        'assigned_to',
        'batch_id',
    ];

    public function get_batch_attachment($id){

        $result = DB::table('studentbatch')
                          ->select('studentbatch.id as id',                        
                            'files.id as file_id',
                            'files.created_at as files_requestedon',
                            'files.updated_at as files_updatedon',
                            'files.file_path as file_path',
                            'users.name as name'
                          )
      	->join('files','files.batch_id','=','studentbatch.id')
      	->join('users','users.id','=','files.author_by')
                      ->where('files.batch_id', $id)
                      ->get();	
        return $result;

        /*
        print 'hello';
        return $id;
        */
	}
}
