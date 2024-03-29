<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(ArticleCategoryTableSeeder::class);
        $this->call(ReportsSeeder::class);
        $this->call(ReportImageSeeder::class);
    }
}
