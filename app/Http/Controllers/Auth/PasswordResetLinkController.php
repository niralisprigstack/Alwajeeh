<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordReset;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status=Password::INVALID_USER;
        try{
         
         $resetTokenUser= User::where('email',$request->email)->first();
         
         if(!isset($resetTokenUser) || $resetTokenUser==null){
            $status=Password::INVALID_USER;
         }else{
            PasswordReset::where('email',$request->email)->forceDelete();
            $resetTokenForUser= new PasswordReset;
            $resetTokenForUser->email=$request->email;

            $plainToken= Str::random(64);;
            // $appUrl="http://127.0.0.1:8000/";
            $appUrl=env("APP_URL", "https://alwajeeh.link/");
            $resetUrl=$appUrl."reset-password/".$plainToken."?email=".$request->email;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'http://netdev.addresstwo.com/api/SmbalHelp', [
                'form_params' => [
                'Subject' => 'Reset Password Notification',
                'IsForgotPassword' => 'true',
                'Reset_Password_Link'=> $resetUrl,
                'TemplateID' => 9,
                'IsForgotPasswordTest' => "true",
                'ContactID' => $resetTokenUser->id,
                ]
            ]);

            $token= bcrypt($plainToken);
           
            $resetTokenForUser->token=$token;
            
            $resetTokenForUser->save();
           
            $status=Password::RESET_LINK_SENT;
         }
         
        }catch(\Exception $er){
            return $er;
            $status=Password::INVALID_USER;
        }
      
 

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
