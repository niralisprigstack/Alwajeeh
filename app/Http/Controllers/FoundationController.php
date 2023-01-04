<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;

class FoundationController extends Controller
{
    //
    public function foundationpage(Request $request)
    {

        return view('foundation.foundation');
      
    }
}
