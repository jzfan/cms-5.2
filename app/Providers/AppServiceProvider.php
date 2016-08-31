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
            \Cms\Article::class,
            \Cms\User::class,
            \Cms\Slider::class,
            \Cms\Video::class,
            \Cms\Category::class,
            \Cms\Admin::class,
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
