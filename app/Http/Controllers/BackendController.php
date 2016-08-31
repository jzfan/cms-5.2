<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Cms\User;
use Cms\Article;
use Cms\Video;

class BackendController extends Controller
{
    public function index()
    {
    	$user    = $this->getData(new User);
    	$article = $this->getData(new Article);
    	$video   = $this->getData(new Video, 4);

    	return view('backend.index', compact('user', 'video', 'article'));
    }

    protected function getData($model, $take = 10)
    {
    	$total = $model->all()->count();
    	$last30Days = $model::where('created_at', '>', Carbon::now()->subDays(30))->count();
    	$list = $model::orderBy('id', 'desc')->take($take)->get();
    	return ['total' => $total, 'last30Days' => $last30Days, 'list' => $list];    	
    }
}
