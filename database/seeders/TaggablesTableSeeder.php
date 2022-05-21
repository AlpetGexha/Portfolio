<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaggablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taggables')->delete();
        
        \DB::table('taggables')->insert(array (
            0 => 
            array (
                'tag_id' => 1,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 1,
            ),
            1 => 
            array (
                'tag_id' => 2,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 1,
            ),
            2 => 
            array (
                'tag_id' => 3,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 1,
            ),
            3 => 
            array (
                'tag_id' => 4,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 2,
            ),
            4 => 
            array (
                'tag_id' => 5,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 2,
            ),
            5 => 
            array (
                'tag_id' => 6,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 3,
            ),
            6 => 
            array (
                'tag_id' => 6,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 4,
            ),
            7 => 
            array (
                'tag_id' => 7,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 3,
            ),
            8 => 
            array (
                'tag_id' => 8,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 5,
            ),
            9 => 
            array (
                'tag_id' => 9,
                'taggable_type' => 'App\\Models\\Portofilo',
                'taggable_id' => 5,
            ),
            10 => 
            array (
                'tag_id' => 10,
                'taggable_type' => 'App\\Models\\Posts',
                'taggable_id' => 1,
            ),
            11 => 
            array (
                'tag_id' => 11,
                'taggable_type' => 'App\\Models\\Posts',
                'taggable_id' => 2,
            ),
            12 => 
            array (
                'tag_id' => 12,
                'taggable_type' => 'App\\Models\\Posts',
                'taggable_id' => 2,
            ),
            13 => 
            array (
                'tag_id' => 13,
                'taggable_type' => 'App\\Models\\Posts',
                'taggable_id' => 3,
            ),
        ));
        
        
    }
}