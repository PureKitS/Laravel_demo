<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerList extends Model
{
    protected $table = "sakila.customer_list";
    protected $primaryKey = "ID";
    public $timestamps = false;
}
