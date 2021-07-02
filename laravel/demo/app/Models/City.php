<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "sakila.city";
    protected $primaryKey = "city_id";
    public $timestamps = false;
}
