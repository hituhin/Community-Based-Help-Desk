<?php

use Illuminate\Database\Seeder;


use App\Meeting;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'seeker_id'=>1,
            'provider_id'=>2, 

            'description'=>'I need Help in Php',
            'start_time'=>'2019-08-04 14:14:34',
            'end_time'=>'2019-08-04 16:14:34',
            'place'=>'Ashulia'
            ],

            [
            'seeker_id'=>2,
            'provider_id'=>1, 

            'description'=>'I need Help in Js',
            'start_time'=>'2019-08-04 14:14:34',
            'end_time'=>'2019-08-04 16:14:34',
            'place'=>'Ashulia'
            ],

            [
            'seeker_id'=>1,
            'provider_id'=>2, 

            'description'=>'I need Help in Php',
            'start_time'=>'2019-08-04 14:14:34',
            'end_time'=>'2019-08-04 16:14:34',
            'place'=>'Ashulia'
            ],


            [
            'seeker_id'=>1,
            'provider_id'=>3, 

            'description'=>'I need Help in Php',
            'start_time'=>'2019-08-04 14:14:34',
            'end_time'=>'2019-08-04 16:14:34',
            'place'=>'Ashulia'
            ],

        ];

        foreach ($data as $key => $value) {
        	Meeting::create($value);
        }
    }
}
