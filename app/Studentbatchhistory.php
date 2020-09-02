<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Studentbatchhistory extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $table = 'studentbatchhistory';
    protected $fillable = [
        'name', 'subject', 'body', 'requested', 'responded',
        'depo_id', 'batch_id','status',
    ];
    protected $hidden = [
      'requested', 'responded',
  ];
}
