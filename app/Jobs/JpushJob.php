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
        $this->data = $data;
    }

    public function handle()
    {
        $client = new JPush(config('services.jpush.key'), config('services.jpush.secret'));
        return $client->push()
            ->setPlatform('all')
            ->setOptions($sendno=null, $time_to_live=null, $override_msg_id=null, $apns_production=false, $big_push_duration=null)
            ->addAllAudience()
            // ->setNotificationAlert($this->data->title)
            ->addIosNotification($alert=$this->data->title, $sound='default', $badge="+1", $content_available=null, $category=null, $extras=['id' => $this->data->id])
            ->addAndroidNotification($alert=$this->data->title, $title=$this->data->content, $builderId=null, $extras=['id' => $this->data->id])
            ->send();
    }
}