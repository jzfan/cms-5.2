<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateSlider;
use App\Http\Requests\UpdateSlider;
use App\Slider;
use Image;
use Cache;

class SliderController extends Controller
{

    public function index()
    {
    	$sliders = Slider::all();

    	return view('backend.slider.index', compact('sliders'));
    }

    public function create()
    {
    	return view('backend.slider.create');
    }

    public function store(CreateSlider $request)
    {
    	Slider::create( $request->input() + ['img' => $this->uploadImageHandle($request)]);
        alert()->success('创建成功！');
    	return redirect('/backend/slider');
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Slider $slider, UpdateSlider $request)
    {
        if ($request->hasFile('img')){
            $img = $this->uploadImageHandle($request);
            $slider->update( $request->input() + ['img'=>$img] );
        }else{
            $slider->update( $request->input());
        }
        alert()->success('更新成功！');
        return redirect('/backend/slider');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        alert()->success('删除成功！');
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
