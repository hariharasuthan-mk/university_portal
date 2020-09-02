<?php

use Illuminate\Database\Seeder;
use App\Category;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
	        Category::create([
            'name'  => Str::random(3),
            'description'  => Str::random(2),
            'publish'      => 'no',
            'created_at'   => '2021-10-10',
            'updated_at'   => '2022-10-10',    	    
	        ]);
	    }
    }
}
