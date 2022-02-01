<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  <!-- Validation Errors -->
                  <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <!--Form -->
                    <form action="{{ route('form-data') }}" method="POST">

                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <!--date-->
                                    <div class="col-span-6 sm:col-span-3">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="text" value="{{ $form->created_at}}" readonly class id="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <!--first name-->
                                    <div class="col-span-6 sm:col-span-3">
                                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" value="{{ $form->firstname }}" readonly class id="firstname"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    
                                    <!--last name-->
                                    <div class="col-span-6 sm:col-span-4">
                                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" value="{{ $form->lastname}}" readonly class id="lastname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <!--Order Type-->
                                    <div class="col-span-6 sm:col-span-3">
                                    <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Type of Delivery</label>
                                    <input type="text" value="{{ $form->type_of_delivery }}" readonly class id="lastname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>


                                     <!--Delivery Address-->
                                     @if ($form->delivery_address != null)
                                     <div class="col-span-6 sm:col-span-3">
                                        <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                                        <input type="text" value="{{ $form->delivery_address}}" readonly class id="delivery_address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @endif

                                    <!--Delivery Status-->
                                    @if($form->delivery_status != null)

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Delivery Status</label>
                                        <input type="text" value="{{ $form->delivery_status }}" readonly class id="delivery_status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @endif

                                    <div class="col-span-6 sm:col-span-3 mt-2">
                                        <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Item</label>
                                        <input type="text" value="{{ $form->food_item }}" readonly class id="delivery_status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 mt-2">
                                        <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Quantity</label>
                                        <input type="text" value="{{ $form->food_quantity }}" readonly class id="delivery_status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 mt-2">
                                        <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Total Price</label>
                                        <input type="text" value="{{ $form->food_price }}" readonly class id="delivery_status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <!--Done-->
                                   <a href=" {{ route('acceptOrder',$form) }} " class="button_delivered">Done and Delivered</a>

                                </div>
                            </div>
                        </div>
                    </form>

                     <!---->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
