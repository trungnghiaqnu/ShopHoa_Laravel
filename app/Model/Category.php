<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey ='cate_id';
    protected $guarded = [];// phai tuong tac voi tat ca truong du lieu
    
}
