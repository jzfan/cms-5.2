<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->modelEvents();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function modelEvents()
    {
        $models = [
            \App\Article::class,
            \App\User::class,
            \App\Slider::class,
            \App\Video::class,
            \App\Category::class,
            \App\Admin::class,
        ];

        foreach ($models as $m) {
            $m::created(function () {
                alert()->success('创建成功！');
            });
            $m::updated(function () {
                alert()->success('更新成功！');
            });
            $m::deleted(function () {
                alert()->success('删除成功！');
            });
        }
    }
}
