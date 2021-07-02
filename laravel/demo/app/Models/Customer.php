<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * 与模型关联的表名
     * 定义表customer
     * 
     */
    protected $table = "sakila.customer";
    //定义主键
    protected $primaryKey = "customer_id";
    //取消时间戳
    public $timestamps = false;
    //是否主动递增
    public $incrementing = false;


    //设置属性批量赋值
    protected $fillable = [
       'customer_id','store_id', 'first_name', 'last_name', 'email',
        'address_id', 'active', 'create_date', 'last_update'
    ];

    protected $attributes = [
        'active' => 0
    ];

}
