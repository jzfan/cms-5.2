<?php

use Illuminate\Database\Seeder;
use App\ReportImage;

class ReportImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ReportImage::truncate();
    	
        factory(ReportImage::class, 5)->create();
    }
}
