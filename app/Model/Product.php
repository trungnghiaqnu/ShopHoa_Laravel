<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey ='prod_id';
    protected $guarded = [];// phai tuong tac voi tat ca truong du lieu
}
