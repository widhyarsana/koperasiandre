<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = [
            'name' => 'andre',
            'username' => 'andre',
            'phone' => '082349142532',
            'address' => 'kesiman',
            'email' => 'andre@gmail.com',
            'gender' => 1,
            'password' => bcrypt('123456')
        ];

        $staff = [
            'name' => 'widi',
            'username' => 'widi',
            'phone' => '082349142531',
            'address' => 'surabi',
            'email' => 'widi@gmail.com',
            'gender' => 1,
            'password' => bcrypt('123456')
        ];

        $sa =  \App\User::create($manager);
        $sa->assignRole('manager');

        $a =  \App\User::create($staff);
        $a->assignRole('staff');
    }
}
