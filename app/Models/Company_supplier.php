<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_supplier extends Model
{
    use HasFactory;
    protected $table='company_suppliers';

    protected $fillable=[
        'company_name','contact_information','created_at','updated_at','added_by',
        'updated_by','com_code'
    ];
}
