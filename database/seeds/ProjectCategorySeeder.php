<?php

use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_category')->insert(array(
            array(
                'category_name' => 'Analysis',
             
            ),
            array(
            
                'category_name' => 'Marketing',
            ),
            array(
            
                'category_name' => 'Design',
            ),
            array(
            
                'category_name' => 'Research',
            ),
          ));

     
    }
}
