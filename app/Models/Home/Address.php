<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package App\Models\Home
 */
class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'address';
    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname','company', 'address', 'postcode', 'email', 'telephone', 'userid'];
}
