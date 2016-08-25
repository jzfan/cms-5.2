<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Report;
// use App\Http\Requests\Request\CreateReport;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('id', 'desc')->paginate(10);
        return view('backend.report.index', compact('reports'));
    }

    public function show(Report $report)
    {
        return response()->json($report);
    }

    public function receive(Request $request)
    {
		$validator = $this->validator($request);
		if ($validator->fails()) {
			return response()->json(['code' => '3400', 'message' => $validator->errors()->first()]);
		}

		$input = $request->input();

    	if ($request->hasFile('file'))
    	{

    		$file_name = $this->upload_file($request);
    		$input += ['image' => $file_name];

    	}

    	Report::create($input);
    	return response()->json(['code' => 200, 'message' => 'ok']);

    }

    private function validator($request)
    {
    	$validator = \Validator::make($request->all(), [
		    'qq_or_phone' => 'required|numeric',
            'name' => 'required|max:255',
		    'title' => 'required|unique:reports|max:255',
            'content' => 'required',
        ]);
    	return $validator;
    }

    private function upload_file($request)
    {
    	$file = $request->file('file');
    	$file_name = $file->getClientOriginalName();
    	if ($file->isValid()){
    		$file->move(public_path('img/report', $file_name));
    	}
    	return $file_name;
    }
}
