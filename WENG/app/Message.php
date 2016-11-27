<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $table = 'messages';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   //需要寫入時自動對應到資料庫的欄位，需要跟創建的migration檔案資料欄位做對應

  protected $fillable = [
      'title', 'article', 'author','status','master','name',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];

  public function author() {

    return $this->hasOne('App\User','id','author');
  }

  // public function user() {
  //       return $this->belongsTo('App\User');
  // }
}
