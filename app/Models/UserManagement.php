<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','email','phone','address','designation_id','company_id','location_id','department_id','role_id','status','profile_image'];

    public function user(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
