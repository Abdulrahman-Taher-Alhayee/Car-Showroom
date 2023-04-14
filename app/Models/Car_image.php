<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_image extends Model
{
    use HasFactory;
    protected $table='car_images';

    protected $fillable=[
       'car_id','image_url','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
