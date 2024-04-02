<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                'site_name' => 'College Compass CMS',
                'site_email' => 'aashishpandit726@gmail.com',
                'site_phone' => '9861745217',
                'site_mobile' => '9861745217',
                'site_first_address' => 'Kathmandu',
                'site_second_address' => 'Mid Baneshor KTM',
                'site_description' => 'College Compass CMS Content Management System ',
                'site_url' => 'http://127.0.0.1:8000/',
                'logo' => NULL
            ]
        );
    }
}
