<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Article;

class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('article_category')->truncate();
    	
        $categories_id = Category::lists('id')->toArray();
        $articles_id = Article::lists('id')->toArray();
        foreach($articles_id as $aid){
        	// $arr = $perms_id;
        	shuffle($categories_id);
        	$offset = mt_rand(1, 2);
        	$arr = array_slice($categories_id, 0, $offset);
        	Article::find($aid)->categories()->sync($arr);
        }
    }
}
