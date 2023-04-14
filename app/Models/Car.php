<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table='cars';

    protected $fillable=[
        'make','model','year','color_id','supplier_id ','price','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
