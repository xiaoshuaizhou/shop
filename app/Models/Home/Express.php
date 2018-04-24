<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
    protected $table = 'express';
    protected $fillable = ['expressname', 'expressprice'];
}
