<?php

use Illuminate\Database\Seeder;

class newsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_category')->insert(array(
            array(
                'category_name' => 'POLITICS',
             
            ),
            array(
            
                'category_name' => 'ENTERTAINMENT',
            ),
            array(
            
                'category_name' => 'SPORTS',
            ),
            array(
            
                'category_name' => 'BUSINESS',
            ),
            array(
            
                'category_name' => 'TECHNOLOGY',
            ),
            array(
            
                'category_name' => 'CRICKET',
            ),
          ));
    }
}
