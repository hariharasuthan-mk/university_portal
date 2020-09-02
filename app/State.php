<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = 'state';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['state','author_id'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'author_id',
  ];
}
