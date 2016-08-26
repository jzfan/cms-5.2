<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Report;
use App\ReportImage;
use App\Helper\Upload;
// use App\Http\Requests\Request\CreateReport;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('images')->orderBy('id', 'desc')->paginate(10);
        return view('backend.report.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::with('images')->find($id);
        return response()->json($report);
    }

    public function receive(Request $request)
    {
		$validator = $this->validator($request);
		if ($validator->fails()) {
			return response()->json(['code' => '3400', 'message' => $validator->errors()->first()]);
		}

		$input = $request->except('file');

        $report = Report::create($input);

        if ($request->has('file')){

            $files = Upload::multiple_upload_base64($request);
            $this->saveImageRecord($files, $report->id);

        }
        elseif ($request->hasFile('file'))
        {
            $files = Upload::multiple_upload($request);
            $this->saveImageRecord($files, $report->id);
        }

    	return response()->json(['code' => 200, 'message' => 'ok']);

    }

    private function validator($request)
    {
    	$validator = \Validator::make($request->all(), [
		    'phone' => 'required|numeric',
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
    		$file->move(public_path('uploads', $file_name));
    	}
    	return $file_name;
    }

    private function saveImageRecord($files, $report_id)
    {
        foreach ($files as  $file) {
            ReportImage::create([
                'name' => $file,
                'report_id' => $report_id
            ]);
        }
    }
}
