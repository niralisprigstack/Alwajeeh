<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;

use App\Models\Announcement;
use App\Models\AnnouncementFiles;
use App\Models\AnnouncementView;

class HomeController extends Controller
{
    //
    public function showAllContacts(Request $request)
  {

        $userid = Auth::id();
        $contactCount = User::count();
     
        $allcontacts=User::orderBy('first_name')->orderBy('last_name')->get()->except(Auth::id());
        // $allcontacts= User::orderBy('id','desc')->get()->except(Auth::id());

        return view('allContacts', compact('allcontacts','contactCount'));
    
  }

  public function homepage(Request $request)
  {

        $userid = Auth::id();
        // $contactCount = User::count();
        $annoncementcount=Announcement::count();
        $viewcount=AnnouncementView::where('user_id' , Auth::id())->count();    
        $unreadcount= $annoncementcount-$viewcount;
        // return $co;
        // $allcontacts= User::orderBy('id','desc')->get()->except(Auth::id());

        return view('landing.home', compact('unreadcount'));
    
  }
}
