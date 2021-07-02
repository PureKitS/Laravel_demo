<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = "sakila.country";
    protected $primaryKey = "country_id";
    public $timestamps = false;
}
