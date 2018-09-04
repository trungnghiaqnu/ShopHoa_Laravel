<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey ='com_id';
    protected $guarded = [];// phai tuong tac voi tat ca truong du lieu
}
