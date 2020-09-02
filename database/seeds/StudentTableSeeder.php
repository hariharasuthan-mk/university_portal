<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=1;$i<=300;$i++){
	        $user = Student::create([
	        	'name' => Str::random(10), 
	        	'sex' => 'female',        	
	        ]);
	    }
    }
}
