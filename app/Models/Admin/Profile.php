<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['id','truename','age','sex','birthday','nickname','company','userid','created_at','updated_at','status','phone','website', 'detailaddress', 'province', 'city', 'postcode', 'mark'];
}
