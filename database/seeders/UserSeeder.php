<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
            $admin = User::create([
                'username'      => 'Admin Account',
                'firstname'     => 'chrissa',
                'lastname'      => 'agujar',
                'contactnumber' => '09055572356',
                'email'         => 'chrissa@admin.com',
                'password'      => Hash::make('password'),
                'status'        => 'Accepted',
            ]);

            $admin->assignRole('admin');
        }
    }
