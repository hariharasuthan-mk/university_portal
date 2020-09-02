<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=5;$i++){
	        $user = Student::create([
            'name'       =>"IIT-".Str::random(3),
            'sex'        => 'female',
            'fullname'   => 'Fullname-'.Str::random(4),
	        ]);
	    }
    }
}
