<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Admin SST',
            'email' => 'admin@sst.test',
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User SST',
            'email' => 'user@sst.test',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('user');
    }
}
