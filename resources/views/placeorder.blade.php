<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                        <div class="grid grid-cols-6 gap-6">
                            <!--date-->
                            <div class="col-span-6 sm:col-span-3">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="text" name="date" id="date" value="{{ date('F d, Y') }}" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <!--first name-->
                            <div class="col-span-6 sm:col-span-3 mt-2">
                            <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="{{ Auth::user()->firstname  }}" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <!--last name-->
                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname  }}" readonly class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--Order Type-->
                            <div class="col-span-6 sm:col-span-3 mt-2">
                            <label for="type_of_delivery" class="block text-sm font-medium text-gray-700">Type of Delivery</label>
                                <select id="type" name="type_of_delivery"  onchange="yesnoCheck();" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option id="delivery" value="delivery">Delivery</option>
                                    <option value="pick-up">Pick-Up</option>
                                </select>
                            </div>

                            <!--Delivery Address-->
                            <div class="col-span-6 sm:col-span-4 mt-2" id="delivery_address">
                                <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                                <input type="text" id="delivery_address" name="delivery_address" value="{{ old('delivery_address') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--Food Item-->
                            <div class="col-span-6 sm:col-span-3 mt-2">
                                <label for="food_item" class="block text-sm font-medium text-gray-700">Food Item</label>
                                <select name="food_item"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @forelse($products as $product)
                                        <option value="{{ $product->name }}">{{ $product->name }} - Php {{ $product->price }}</option>
                                    @empty
                                        <option>No Product Available</option>
                                    @endforelse
                                </select>
                            </div>

                            <!--Food quantity-->
                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="food_item" class="block text-sm font-medium text-gray-700">Food Quantity</label>
                                <input type="number" name="food_quantity" id="food_quantity"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                                
                            <!--Button Submit-->
                            <div class="px-4 py-3 bg-gray-50 sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                            </div>
                        </div>
                    </form>

                     <!---->
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script type="text/javascript">
        function yesnoCheck() {
            if (document.getElementById("delivery").selected) {
                document.getElementById("delivery_address").style.display = "block";
            } else {
                document.getElementById("delivery_address").style.display = "none";
            }
        }
    </script>
    @endsection
</x-app-layout>