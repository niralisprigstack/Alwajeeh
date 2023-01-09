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
            $annoncementcount=Announcement::where("status",'2')->count();
            $viewcount=AnnouncementView::where('user_id' , Auth::id())->count();    
            $unreadcount= $annoncementcount-$viewcount;
            if($unreadcount<0){
                $unreadcount=0;
            }
            $view->with('unreadcount', $unreadcount);                  
        });
    }
}
