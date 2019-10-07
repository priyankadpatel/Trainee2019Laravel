<?php

use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(array(
            array(
                'category_name' => 'PHP',
             
            ),
            array(
            
                'category_name' => 'ANGULAR',
            ),
            array(
            
                'category_name' => 'NODE JS',
            ),
            array(
            
                'category_name' => 'JAVA',
            ),
            array(
            
                'category_name' => 'laravel',
            ),
          ));

     
    }
}
