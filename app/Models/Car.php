<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table='cars';

    protected $fillable=[
        'id','company_id','model','plate_num','year','colors','purchase_price','sale_price','discount','status','active','photo','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
