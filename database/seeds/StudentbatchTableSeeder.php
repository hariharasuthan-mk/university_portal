<?php

use Illuminate\Database\Seeder;
use App\Studentbatch;


class StudentbatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
	        $user = Studentbatch::create([
            'batchname'  =>"Mongo DB Batch1-".Str::random(3),
            'batchcode'  => 'Mongo-b-21-22'.Str::random(2),
            'start_date' => '2021-10-10',
            'end_date'   => '2022-10-10',
    	     'status'    => 'no',
	        ]);
	    }
    }
}
