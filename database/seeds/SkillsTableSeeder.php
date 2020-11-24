<?php

use App\User;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	




        $problems = App\Skill::create([
        	'name' =>'Problem Solving',
            'image' =>'/img/ps.jpg'
        ]);

        $java = App\Skill::create([
            'name' =>'Java',
            'image' =>'/img/java.jpg'
        ]);


        $python = App\Skill::create([
            'name' =>'Python',
            'image' =>'/img/python.jpg'
        ]);


        $oop = App\Skill::create([
            'name' =>'OOP',
            'image' =>'/img/oop.jpg'
        ]);


        $laravel = App\Skill::create([

	       	'name' =>'Laravel',
            'image' =>'/img/laravel.jpg'
        ]);

        $cn = App\Skill::create([

            'name' =>'Computer network',
            'image' =>'/img/cn.jpg'
        ]);

        $computing = App\Skill::create([

            'name' =>'Computing',
            'image' =>'/img/computing.jpg'
        ]);


        $ai = App\Skill::create([
	       	'name' =>'Artificial intelligence',
            'image' =>'/img/ai.jpg'
 
        ]);


        $webdesign = App\Skill::create([
	       	'name' =>'Web Design',
            // 'image' =>'png.png'
 
        ]);

        $webdev = App\Skill::create([
	       	'name' =>'Web Development',
            // 'image' =>'png.png'
 
        ]);

        $android = App\Skill::create([
	       	'name' =>'Android Application',
            // 'image' =>'png.png'
 
        ]);


// add data in the privot table-->>
        $user1 = User::findOrFail(1);
		$user1->skills()->sync([1,2,3,4]);


		$user2 = User::findOrFail(2);
		$user2->skills()->sync([2,3,4,5]);


		$user3 = User::findOrFail(3);
        $user4 = User::findOrFail(4);
		$user4->skills()->sync([3]);



    }
}
