<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "sakila.address";
    protected $primaryKey = "address_id";
    public $timestamps = false;
}
