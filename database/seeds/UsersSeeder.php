<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10; $i++){
		    	DB::table('users')->insert([
		            'name' => "mariami".$i,
		            'surname'=>"antsupova".$i,
		            'email'=>"mariam.antsupova.".$i."btu.edu.ge",
		            'password'=>"mariami123",
		        ]);
    		}    }
}
