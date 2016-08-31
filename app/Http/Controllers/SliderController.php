<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateSlider;
use App\Http\Requests\UpdateSlider;
use Cms\Category;
use Cms\Slider;
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
        if ($request->hasFile('file')){
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

    public function getJsonByCategory($category_id)
    {
        $sliders = Slider::where('category_id', $category_id)->orderBy('id', 'desc')->get();
        if ($sliders->count() === 0) {
            return response()->json(['code'=>1404, 'message'=>'not found']);            
        }
        return response()->json(['data'=>$sliders, 'code'=>200, 'message'=>'ok']);
    }

    private function uploadImageHandle($request)
    {
        $img = $request->file('file');
        $name = str_random(12) . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('uploads'), $name);
        // $img = Image::make($img)->resize(config('image.slider.width'), config('image.slider.height'))->save(public_path(). $imgPath. $name);
        return $name;
    }
}
