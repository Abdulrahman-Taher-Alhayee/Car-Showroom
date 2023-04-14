<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_bill extends Model
{
    use HasFactory;
    protected $table='sale_bills';

    protected $fillable=[
        'date','car_id','customer_id','total_price','discount','tax','net_amount','comments','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
