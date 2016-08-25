<?php

use Illuminate\Database\Seeder;
use App\Report;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Report::truncate();
    	
        factory(Report::class, 11)->create();
    }
}
