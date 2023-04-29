<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_bill extends Model
{
    use HasFactory;
    protected $table='purchase_bills';

    protected $fillable=[
        'date','bill_number','car_id','supplier_id','bill_type','total_price','discount','tax','net_amount','comments','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];

}
