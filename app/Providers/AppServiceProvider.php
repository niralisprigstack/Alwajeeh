<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\AnnouncementFiles;
use App\Models\AnnouncementView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer('layouts.app', function($view) {
            $annoncementcount=Announcement::count();
            $viewcount=AnnouncementView::where('user_id' , Auth::id())->count();    
            $unreadcount= $annoncementcount-$viewcount;
            $view->with('unreadcount', $unreadcount);                  
        });
    }
}
