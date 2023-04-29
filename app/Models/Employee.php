<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employees';

    protected $fillable=[
        'name','phone','email','address','position','salary','hire_date','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
