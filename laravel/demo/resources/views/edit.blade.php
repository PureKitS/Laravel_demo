<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-indigo-800 leading-tight">
          Edit Customer info
        </h2>
    </x-slot>



    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                       
                            <form  action="{{ route('update') }}" method="POST">

                              @csrf
                              {{ csrf_field() }}
                                <div class="px-2 bg-white py-5 sm:p-6">
                                  <div class="grid grid-cols-6 gap-7">

                                    {{-- 会员编号 --}}
                                    <div class="col-span-6  ">
                                      <label for="id" 
                                      class="block text-sm font-medium text-gray-700">
                                      Customer ID</label>
                                      <input readonly type="text"
                                      value="{{ $customer->customer_id }}" name="id" id="id" class="mt-1  focus:ring-indigo-500 focus:border-indigo-500  bg-gray-100 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    {{-- 商店编号 --}}
                                    <div class="col-span-6 ">
                                      <label for="store_id" class="block text-sm font-medium text-gray-700">
                                        Store_ID</label>
                                      <input value="{{ $customer->store_id }}" placeholder="Please input store id" type="text" name="store_id" id="store_id" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    {{-- 姓 --}}
                                    <div class="col-span-6 ">
                                      <label for="first_name" class="block text-sm font-medium text-gray-700">
                                        First name</label>
                                      <input value="{{ $customer->first_name }}" type="text" name="first_name" id="first_name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    {{-- 名 --}}
                                    <div class="col-span-6 ">
                                      <label for="last_name" class="block text-sm font-medium text-gray-700">
                                        Last name</label>
                                      <input value="{{ $customer->last_name }}" type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    {{-- 邮箱 --}}
                                    <div class="col-span-6 ">
                                      <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email</label>
                                      <input value="{{ $customer->email }}" type="text" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    {{-- 地址 --}}
                                    <div class="col-span-6 ">
                                      <label for="address_id" class="block text-sm font-medium text-gray-700">
                                        Address</label>
                                      <select id="address_id" name="address_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($address as $addr)
                                        <option value="{{ $addr->address_id }}"
                                            {{ ($customer->address_id == $addr->address_id) ? 'selected' : '' }}>
                                            {{ $addr->address }}
                                        </option>
                                    @endforeach
                                      </select>
                                    </div>
                      
                                    {{-- 活跃状态复选框 --}}
                                    <div class="col-span-6 flex items-center h-5">
                                      <input  name="active" type="checkbox" {{ ($customer->active) ? 'checked' : ''}}
                                      value="{{ $customer->active }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                      <label for="comments" class="font-medium text-gray-700">&nbsp;&nbsp;Active</label>
                                    </div>
                                    {{-- 创建时间 --}}
                                    <div class="col-span-6 ">
                                      <label for="state" class="block text-sm font-medium text-gray-700">
                                        Create Date</label>
                                      <input type="text" name="state" id="state" 
                                      class="mt-1 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 
                                      block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                      value="{{ $customer->create_date }}" readonly>
                                    </div>
                    
                                  </div>
                                </div>
                                {{-- 保存和取消按钮 --}}
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                  <button type="submit" 
                                  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                  </button>
                                  <button type="button"
                                   class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <a href="{{ route('dashboard') }}">Cancel</a> 
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

        </div>
    </div>

</x-app-layout>