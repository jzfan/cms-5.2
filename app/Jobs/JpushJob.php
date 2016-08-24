<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JPush\Client as JPush;

class JpushJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = json_encode($data);
    }

    public function handle()
    {
        $client = new JPush(config('services.jpush.key'), config('services.jpush.secret'));
        return $client->push()
            ->setPlatform('all')
            ->addAllAudience()
            ->setNotificationAlert($this->data)
            ->send();
    }
}
