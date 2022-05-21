<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortofilosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portofilos')->delete();
        
        \DB::table('portofilos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'title' => 'Number System & IP Submit',
                'slug' => 'number-system-ip-submit',
                'body' => '<p>Convert Number on Binary, Octal, Decimal, Hexadecimal</p><p>Convert IP on Binary, Octal, Decimal, Hexadecimal</p><p>Submit IP Address - New Netmaska, Getway IP, First IP, Last IP, Broadcast</p>',
                'url' => 'https://github.com/AlpetGexh/SistemetNumerike-SubmitimiIP',
                'data_created' => '2022-05-20',
                'views' => 5,
                'status' => 1,
                'created_at' => '2022-05-21 00:13:32',
                'updated_at' => '2022-05-21 00:19:30',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'title' => 'AlpetG Blog',
                'slug' => 'alpetg-blog',
                'body' => '<p>#</p>',
                'url' => 'https://github.com/AlpetGexh/AlpetGTechBlog',
                'data_created' => '2022-05-20',
                'views' => 1,
                'status' => 1,
                'created_at' => '2022-05-21 00:30:25',
                'updated_at' => '2022-05-21 00:30:52',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'title' => 'Nexhmedin Nixha High School',
                'slug' => 'nexhmedin-nixha-high-school',
                'body' => '<p>Nexhmedin Nixha High School</p>',
                'url' => 'https://github.com/AlpetGexh/Shkolla-Laravel',
                'data_created' => '2022-05-20',
                'views' => 1,
                'status' => 1,
                'created_at' => '2022-05-21 00:36:15',
                'updated_at' => '2022-05-21 00:59:55',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'title' => 'Laravel First Project',
                'slug' => 'laravel-first-project',
                'body' => '<p>##</p>',
                'url' => 'https://github.com/AlpetGexh/Laravel-First-Project',
                'data_created' => '2022-05-20',
                'views' => 1,
                'status' => 1,
                'created_at' => '2022-05-21 00:37:16',
                'updated_at' => '2022-05-21 01:28:02',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'title' => 'Resistance Code 4 and 5 ring',
                'slug' => 'resistance-code-4-and-5-ring',
                'body' => '<p>Resistance Code with 4 ring and 5 ring</p>',
                'url' => 'https://github.com/AlpetGexh/Kodi-i-Resistecave',
                'data_created' => '2022-05-20',
                'views' => 0,
                'status' => 1,
                'created_at' => '2022-05-21 00:43:47',
                'updated_at' => '2022-05-21 00:43:47',
            ),
        ));
        
        
    }
}