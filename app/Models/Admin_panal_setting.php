<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_panal_setting extends Model
{
    use HasFactory;
    protected $table='admin_panal_settings';

    protected $fillable=[
        'system_name','photo','active','general_alert','address','phone','created_at','updated_at','added_by',
        'updated_by','com_code'

    ];
}
