<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_bill extends Model
{
    use HasFactory;
    protected $table='purchase_bills';

    protected $fillable=[
        'date','car_id','supplier_id','total_price','discount','tax','net_amount','comments','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
