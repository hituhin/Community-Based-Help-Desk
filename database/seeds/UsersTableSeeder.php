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
        $user1 = App\User::create([
    		'name' =>'Md. Masud Rana',
    		'email' =>'user1@gmail.com',
            'description'=> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
            'image' => '/img/user.png',
            'gender' => 1,
            'd_birth' => now(),
    		'password' => bcrypt('password'),

    	]);


    	$user2 = App\User::create([
    		'name' =>'Md. Tuhin',
    		'email' =>'user2@gmail.com',
            'description'=> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
            'image' => '/img/user2.png',
            'gender' => 1,
            'd_birth' => now(),
    		'password' => bcrypt('password')
    	]);

    	$user3 = App\User::create([
    		'name' =>'Md. Mustafiz',
    		'email' =>'user3@gmail.com',
            'description'=> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
            'image' => '/img/user3.png',
            'gender' => 1,
            'd_birth' => now(),
    		'password' => bcrypt('password')
    	]);


        $user4 = App\User::create([
            'name' =>'Md. Arman',
            'email' =>'user4@gmail.com',
            'description'=> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
            'image' => '/img/user4.png',
            'gender' => 1,
            'd_birth' => now(),
            'password' => bcrypt('password')
        ]);

        $user5 = App\User::create([
            'name' =>'Md. Arif',
            'email' =>'user5@gmail.com',
            'description'=> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
            'image' => '/img/user5.png',
            'gender' => 1,
            'd_birth' => now(),
            'password' => bcrypt('password')
        ]);


        $data = [
            [
            'request_by'=>$user1->id,
            'request_to'=>$user2->id, 
            'status'=>0
            ],

            [
            'request_by'=>$user1->id,
            'request_to'=>$user3->id,
            'status' => 1
            ],
        ];

        foreach ($data as $key => $value) {
            App\Connect::create($value);
        }

    }
}
