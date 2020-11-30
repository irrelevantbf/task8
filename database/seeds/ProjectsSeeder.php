<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    	for ($i=1; $i < 10; $i++){
		    	DB::table('projects')->insert([
		            'name' => "Projects".$i,
		        ]);
    		}
        	// Projects::create([
        	// 	"name"=>"Projects",rand(4, 10);
        	// ])    
    }
    
}
