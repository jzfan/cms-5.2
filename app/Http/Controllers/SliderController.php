<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateSlider;
use App\Http\Requests\UpdateSlider;
use App\Category;
use App\Slider;
use Image;
use Cache;

class SliderController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function index()
    {
    	$sliders = Slider::orderBy('category_id')->get();

    	return view('backend.slider.index', compact('sliders'));
    }

    public function create()
    {
    	return view('backend.slider.create', ['categories' => $this->categories]);
    }

    public function store(CreateSlider $request)
    {
    	Slider::create( $request->input() + ['img' => $this->uploadImageHandle($request)]);
    	return redirect('/backend/slider');
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', ['slider'=>$slider, 'categories'=>$this->categories]);
    }

    public function update(Slider $slider, UpdateSlider $request)
    {
        if ($request->hasFile('img')){
            $img = $this->uploadImageHandle($request);
            $slider->update( $request->input() + ['img'=>$img] );
        }else{
            $slider->update( $request->input());
        }
        return redirect('/backend/slider');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back();
    }

    public function getJson(){
        $sliders = Cache::remember('slider-cache-last', 1, function(){
            return Slider::select('id', 'title', 'img', 'link')->get()->toArray();
        });
        return response()->json(['data'=>$sliders, 'code'=>200, 'message'=>'ok']);
    }

    private function uploadImageHandle($request)
    {
    	$img = $request->file('img');
    	$name = $img->getClientOriginalName();
        $imgPath = '/img/slider/';

        $img = Image::make($img)->resize(config('image.slider.width'), config('image.slider.height'))->save(public_path(). $imgPath. $name);
        return env("APP_URL") . $imgPath . $name;  
    }
}
