<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
             [
	            'nama_user' => 'Admin',
		        'email' => 'admin@admin.com',
		        'password' => bcrypt('password'), // password
		        'role' => 'admin',
		        'foto' => 'example2.jpg'
        	],
        	[
	            'nama_user' => 'Bagas Fatchur Afnan',
		        'email' => 'bagasfa@gmail.com',
		        'password' => bcrypt('password'), // password
		        'role' => 'staff',
		        'foto' => 'example.jpg'
        	]
        ];

        foreach ($user as $u) {
            User::create($u);
        }

    }
}
