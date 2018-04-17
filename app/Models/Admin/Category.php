<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table  = 'category';
    protected $fillable = ['cateid', 'title', 'parent_id'];
}
