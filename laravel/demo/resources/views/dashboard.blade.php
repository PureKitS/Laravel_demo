<x-app-layout>
    <x-slot name="header">
        <div>
            <form  action="{{  route('customer.search') }}" method="POST">
              @csrf
                <label for="name" class="text-indigo-700 text-sm font-bold ">Customer Name：</label>
                <input type="text"  id="name" name="name" class="rounded-md text-sm px-1 py-2"
                       value="{{ old('name') }}" placeholder="Enter name search">
                <button type="submit" class="rounded-md text-sm px-2 font-bold
                text-indigo-700 hover:text-indigo-900" 
                style="outline: none">SEARCH</button>
                {{-- 使用count函数计数统计记录 --}}
                <span class="info text-sm">TO<span class="text-indigo-700 font-bold"> {{ count($customers) }} </span>RECORDS</span>
            </form>
        </div>
    </x-slot>


    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                  {{-- 会员客户编号 --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  ID
                                </th>
                                {{-- 客户姓名 --}}
                                <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  NAME
                                </th>
                                {{-- 地址 --}}
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ADDRESS
                                  </th>
                                  {{-- 邮箱编号 --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    POSTCODE
                                  </th>
                                  {{-- 电话 --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  PHONE
                                </th>
                                 {{-- 会员状态 --}}
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  STATUS
                                </th>

                                    {{-- 商店号 --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      STORE_ID
                                    </th>

                               
                            
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                          
                                  <a href="{{ route('add') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">ADD USER</a>
                                  </th>
                            
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                         
                              @foreach ($customers as $customer)
                             
                              <tr>

                                {{-- 会员客户编号 --}}
                                <td class="px-6 py-2 whitespace-nowrap text-sm">
                                  {{$customer->ID}}
                                </td>

                                {{-- 姓名 --}}
                                <td class="px-5 py-2 whitespace-nowrap  text-sm">
                                  {{$customer->name}}
                                </td>

                                {{-- 地址 --}}
                                <td class="px-4 py-2 whitespace-nowrap  text-sm">
                                  {{$customer->address}}
                                  </td>

                                  {{-- 邮编 --}}
                                  <td class="px-6 py-2 whitespace-nowrap  text-sm">
                                    {{$customer-> {'zip code'} }}
                                  </td>

                                  {{-- 电话 --}}
                                  <td class="px-6 py-2 whitespace-nowrap text-sm">
                                    {{$customer->phone}}
                                  </td>

                                   {{-- 会员状态 --}}
                                <td class="px-6 py-2 whitespace-nowrap  text-sm">
                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{($customer->notes) ? "active" : "inactive"}}
                                  </span>
                                </td>


                                   {{-- 商店号 --}}
                                <td class="px-6 py-2 whitespace-nowrap  text-sm">
                                  {{$customer->SID}}
                                </td>



                                {{-- 编辑-删除 --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('edit', ["customer_id" => $customer->ID]) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-bold">EDIT&nbsp;</a>
                                <a href="{{ route('delete', ["customer_id" => $customer->ID]) }}"  class="text-indigo-600 hover:text-indigo-900 text-sm font-bold">DELETE</a>
                                  </td>

                              </tr>
                              @endforeach
                              <!-- More people... -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    

    



    

</x-app-layout>





