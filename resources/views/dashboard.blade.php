<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Info Update--->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Info form  --> 
                    <form method="POST" action="{{ route('infoUpdate') }}">
                        @csrf

                        <!-- Username -->
                        <div class="mt-4">
                            <x-label for="username" :value="__('Username')" />

                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', Auth::user()->username)" required />
                        </div>

                        <!-- First Name -->
                        <div class="mt-4">
                            <x-label for="firstname" :value="__('Firstname')" />

                            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname', Auth::user()->firstname)" required />
                        </div>

                         <!-- Last Name -->
                         <div class="mt-4">
                            <x-label for="lastname" :value="__('Lastname')" />

                            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname', Auth::user()->lastname)" required />
                        </div>

                        <!-- Contact Number -->
                        <div class="mt-4">
                            <x-label for="contactnumber" :value="__('Contact Number')" />

                            <x-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber" :value="old('contactnumber', Auth::user()->contactnumber)" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                          
                            <x-button class="ml-4">
                                {{ __('Update Info') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Email and Password Update--->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Email form  --> 
                    <form method="POST" action="{{ route('emailUpdate') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', Auth::user()->email)" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                          
                            <x-button class="ml-4">
                                {{ __('Update Email') }}
                            </x-button>
                        </div>
                    </form>

                    <!-- Password form -->
                    <form method="POST" action="{{ route('passwordUpdate') }}" class="mt-4">
                            @csrf

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('New Password')" />

                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm New Password')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                            
                                <x-button class="ml-4">
                                    {{ __('Update Password') }}
                                </x-button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @hasrole('Admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Table for User Management-->
                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Status </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user) 
                                <tr>
                                    <td>{{ $user->firstname}}</td>
                                    <td>{{ $user->lastname}}</td>
                                    <td>{{ $user->status}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('acceptUser',$user) }}"> Accept </a>
                                        <a class="btn btn-danger" href="{{ route('rejectUser',$user) }}"> Reject </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endhasrole

</x-app-layout>
