<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table='suppliers';

    protected $fillable=[
        'name','phone','email','address','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
