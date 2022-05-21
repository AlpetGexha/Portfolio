<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"java"}',
                'slug' => '{"en":"java"}',
                'type' => 'protofilo_categories',
                'order_column' => 1,
                'created_at' => '2022-05-21 00:13:32',
                'updated_at' => '2022-05-21 00:13:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"IP"}',
                'slug' => '{"en":"ip"}',
                'type' => 'protofilo_categories',
                'order_column' => 2,
                'created_at' => '2022-05-21 00:13:32',
                'updated_at' => '2022-05-21 00:13:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Binary System"}',
                'slug' => '{"en":"binary-system"}',
                'type' => 'protofilo_categories',
                'order_column' => 3,
                'created_at' => '2022-05-21 00:13:32',
                'updated_at' => '2022-05-21 00:13:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"Web Developer"}',
                'slug' => '{"en":"web-developer"}',
                'type' => 'protofilo_categories',
                'order_column' => 4,
                'created_at' => '2022-05-21 00:30:25',
                'updated_at' => '2022-05-21 00:30:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en":"Blog"}',
                'slug' => '{"en":"blog"}',
                'type' => 'protofilo_categories',
                'order_column' => 5,
                'created_at' => '2022-05-21 00:30:25',
                'updated_at' => '2022-05-21 00:30:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '{"en":"Laravel"}',
                'slug' => '{"en":"laravel"}',
                'type' => 'protofilo_categories',
                'order_column' => 6,
                'created_at' => '2022-05-21 00:36:15',
                'updated_at' => '2022-05-21 00:36:15',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '{"en":"School System"}',
                'slug' => '{"en":"school-system"}',
                'type' => 'protofilo_categories',
                'order_column' => 7,
                'created_at' => '2022-05-21 00:36:15',
                'updated_at' => '2022-05-21 00:36:15',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '{"en":"Resistance Code"}',
                'slug' => '{"en":"resistance-code"}',
                'type' => 'protofilo_categories',
                'order_column' => 8,
                'created_at' => '2022-05-21 00:43:47',
                'updated_at' => '2022-05-21 00:43:47',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '{"en":"JavaScript"}',
                'slug' => '{"en":"javascript"}',
                'type' => 'protofilo_categories',
                'order_column' => 9,
                'created_at' => '2022-05-21 00:43:47',
                'updated_at' => '2022-05-21 00:43:47',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '{"en":"Laravel  9"}',
                'slug' => '{"en":"laravel-9"}',
                'type' => 'categories',
                'order_column' => 10,
                'created_at' => '2022-05-21 01:32:35',
                'updated_at' => '2022-05-21 01:32:35',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '{"en":"Laravel"}',
                'slug' => '{"en":"laravel"}',
                'type' => 'categories',
                'order_column' => 11,
                'created_at' => '2022-05-21 01:40:18',
                'updated_at' => '2022-05-21 01:40:18',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '{"en":"API"}',
                'slug' => '{"en":"api"}',
                'type' => 'categories',
                'order_column' => 12,
                'created_at' => '2022-05-21 01:40:18',
                'updated_at' => '2022-05-21 01:40:18',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '{"en":"larvel"}',
                'slug' => '{"en":"larvel"}',
                'type' => 'categories',
                'order_column' => 13,
                'created_at' => '2022-05-21 01:49:55',
                'updated_at' => '2022-05-21 01:49:55',
            ),
        ));
        
        
    }
}