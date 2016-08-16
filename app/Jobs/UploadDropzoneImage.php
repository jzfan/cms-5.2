<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadDropzoneImage extends Job
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(\Request $request)
    {
        $img = $this->request->file('file');
        $name = $img->getClientOriginalName();
        $imgPath = '/img/avatar/';
        $img = \Image::make($img)->resize(config('image.avatar.width'), null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path(). $imgPath. $name);
        return env("APP_URL") . $imgPath . $name;       
    }
}
