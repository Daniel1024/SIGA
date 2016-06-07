<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIGA\User::create([
            'first_name'    => 'Daniel',
            'last_name'  => 'López',
            'user'   => 'daniel1024',
            'email'     => 'd.lopez.1740@gmail.com',
            'password'     => bcrypt('admin'),
            'role'      => 'admin'
        ]);
        SIGA\User::create([
            'first_name'    => 'Jorge',
            'last_name'  => 'Cornejo',
            'user'   => 'admin',
            'email'     => 'admin@siga.com',
            'password'     => bcrypt('admin'),
            'role'      => 'admin'
        ]);
        SIGA\User::create([
            'first_name'    => 'Jorge',
            'last_name'  => 'Cornejo',
            'user'   => 'jcornejo',
            'email'     => 'jcornejocoel@gmail.com',
            'password'     => bcrypt('admin'),
            'role'      => 'docente'
        ]);
    }
}
