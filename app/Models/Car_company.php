<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_company extends Model
{
    use HasFactory;
    protected $table='car_companies';

    protected $fillable=[
       'id','name','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];}
