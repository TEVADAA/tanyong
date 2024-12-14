<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="btn btn-primary justify-end">
        <a href="{{route('product.create')}}"
            class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Add Product</a>
    </div>
    <div class="flex flex-col my-5">
        <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Product ID</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Product Name</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Price</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Product Detial</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Product Photo</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Categories Type</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Created_At</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 text-left tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Action</th>
                        </tr>
                    </thead>

                    @foreach ($pro as $item)
                    <tbody class="bg-white">

                        <tr>
                            <td scope="row" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    {{$item->id}}
                                 </div></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    {{$item->pro_name}}
                                 </div></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    {{$item->price}}
                                 </div></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                               <div class="flex items-center">
                                   {{$item->pro_detail}}
                                </div></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">
                                    <img src="{{ asset('uploads/product/'.$item->pro_photo) }}" width="100px" height="100px" alt="">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center" >
                                    {{$item->categories->cat_name ?? 'No Category'}}
                                 </div></td>
                            <td
                                 class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                 <span> {{$item->created_at}}</span>
                             </td>
                             <td
                             class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                             <a href=""
                                 class="text-indigo-600 hover:text-indigo-900">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg>
                             </a>

                         </td>

                         <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                            <form action="" method="POST">
                                {{-- @csrf
                                @method('DELETE') --}}
                                <button type="submit" class="flex items-center" onclick="return confirm('Do you want to delete?')">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
