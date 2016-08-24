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
        $android = [
                    "alert" => $data->title,
                    "title" => $data->summary,
                    "builder_id" => \Auth::user()->id,
                    "extras" => [
                        "newsid" => $data->id
                    ]
                ];
        $ios = [
                    "alert" => $data->title,
                    "sound" => 'default',
                    "badge" => "+1",
                    "extras" => [
                        "newsid" => $data->id
                    ]
                ];

        $this->data = json_encode([
                "platform" => "all",
                "audience" => "all",
                "notification" => [
                    "android" => $android,
                    'ios' => $ios,
                ]
            ]);
        dd($this->data);
    }

    public function handle()
    {
        $client = new JPush(config('services.jpush.key'), config('services.jpush.secret'));
        return $client->push()
            ->setPlatform('all')
            ->setOptions($sendno=null, $time_to_live=null, $override_msg_id=null, $apns_production=false, $big_push_duration=null)
            ->addAllAudience()
            ->setNotificationAlert($this->data)
            ->send();
    }
}