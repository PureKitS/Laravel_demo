<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerUpdate;
use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CustomerController extends Controller
{
    /**
     * 显示客户信息
     * 
     * @return 客户信息管理视图显示
     */
    public function show(){
        $customers = CustomerList::all()
        ->sortBy("ID");
        return view('dashboard', ['customers' => $customers]);
    }

    /**
     * 根据姓名查询客户信息
     * 
     * @param Request $request
     * @return 客户信息管理视图
     */
    public function search(Request $request){
        //将输入数据闪存到Session
        $request -> flash();
        //获取表单提交的客户
        $name = $request -> input('name');
        $customers = CustomerList::query()
        ->where('name', 'like', "%$name%")
        ->orderBy('id')
        ->get();

        return view('dashboard', ['customers' => $customers]);
    }


    /**
     * 添加用户信息
     *
     */
    public function add() {
        //获取地址列表
        $address = Address::all('address_id', 'address');
        return view('add', ['address' => $address]);
    }

    /**
     * 插入客户信息
     */
    public function insert(CustomerUpdate $request){
        // 验证数据合法性
        $validated = $request->validated();
        $info = $request->all('store_id', 'first_name', 'last_name', 'email', 'address_id', 'active', 'create_date');
        if (!isset($info['active'])) {
            $info['active'] = 0;
        }
        Customer::query()->insert($info);
        return redirect()->route('dashboard');
    }

    
    /**
     * 在删除客户信息界面显示删除信息
     *
     * @param $customer_id 客户 ID
     */
    public function delete($customer_id) {
          // 获取客户信息
          $customer = Customer::query()->find($customer_id);
          // 获取地址列表
          $address = Address::all();
          return view('delete', [
              'customer' => $customer,
              'address' => $address
            ]);
    }

     /**
     * 删除客户信息
     *
     * @param $customer_id 客户 ID
     */
    public function confirmDelete($customer_id){
        $customer = Customer::query()->find($customer_id);
        $customer->delete();
        return redirect()->route('dashboard');
    }





    /**
     * 编辑客户信息
     *
     * @param
     */
    public function edit($customer_id) {
        // 获取客户信息
        $customer = Customer::query()->find($customer_id);
        // 获取地址列表
        $address = Address::all();
        return view('edit', [
            'customer' => $customer,
            'address' => $address
        ]);
        
    }

    /**
     *  更新客户信息
     *
     * @param Request $request
     */
    public function update(CustomerUpdate $request) {
        // 验证数据合法性
        $validate = $request->validated();
        $info = $request->all();
        if (!isset($info['active'])) {
            $info['active'] = 0;
        }
        DB::update('update sakila.customer set store_id=?,first_name=?,last_name=?,email=?,address_id=?,active=? WHERE customer_id=?',
            [$info['store_id'], $info['first_name'], $info['last_name'], $info['email'], $info['address_id'], $info['active'], $info['id']]);
        return redirect()->route('dashboard', ['customer_id' => $info['id']]);
    }



}

