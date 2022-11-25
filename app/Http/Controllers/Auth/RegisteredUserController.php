<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Twilio\Rest\Client;
use Cookie;
use App\Mail\Email;
use Mail;
use App\Models\Country;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    // check if entry password is valid or not , if valid then redirect to register page
    public function create()
    {
        return view('auth.register');
    }


    public function verifyEntryPassword(Request $request)
    {

        // $entry_pass = getenv("APP_Password");
        $entry_pass = "SMBAL1";

        if (!empty($request->entry_password)) {
            if ($request->entry_password === $entry_pass) {
                Cookie::queue('app_pass', $entry_pass, 1440);
                return "success";
            } else {
                return "0";
            }
        }
    }

    // check user name is already exist or not 
    public function verifyUserName(Request $request)
    {
        try {
            if (!empty($request->user_name)) {
                $user = User::where('user_name', '=', $request->user_name)->first();
                if ($user == null) {
                    return   "success";
                } else {
                    return "0";
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    public function saveEmailAnduserName(Request $request)
    {

        //check if username is exist or not 
        // check email is present or not   

        $data = $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $userName = false;
        $email = false;
        if (!empty($request->user_name)) {
            $user = User::where('user_name', '=', $request->user_name)->first();
            if ($user != null) {
                $userName = true;
            }
        }
        if (!empty($request->email)) {
            $user = User::where('email', '=', $request->email)->first();
            if ($user != null) {
                $email = true;
            }
        }
        return response()->json([
            'userName' => $userName,
            'email' => $email
        ]);
    }

    public function checkUsernameEmailDuplicate(Request $request){
        $userName = false;
        $email = false;
        if (!empty($request->user_name)) {
            // $user = User::where(['user_name', '=', $request->user_name],['id','<>',$request->id])->first();
            $user = User::where('user_name', '=', $request->user_name)->where('id','<>',$request->id)->first();
            if ($user != null) {
                $userName = true;
            }
        }
        if (!empty($request->email)) {
            // $user = User::where(['email', '=', $request->email],['id','<>',$request->id])->first();
            $user = User::where('email', '=', $request->email)->where('id','<>',$request->id)->first();
            if ($user != null) {
                $email = true;
            }
        }
        return response()->json([
            'userName' => $userName,
            'email' => $email
        ]);
    }

    public function savePersonalInfo(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'country_code' => ['required'],
            'nationality' => ['required'],
            'birth_date' => ['required'],
           
        ]);
        return response()->json([
            'message' => 'okay',

        ]);
        // check whether phone number exist in the system or not

      
        /* Get credentials from .env */

        // if (!empty($request->first_name)  && !empty($request->last_name)  && !empty($request->email)   && !empty($request->password)  &&  !empty($request->phone_number)) {

          
            

        //     //adding personal det
        //     try {
             
                
        //     }catch (\Throwable $th) {
        //         throw $th;
        //     }

            
        // }
    }

    public function verifyPhone(Request $request)
    {
  

        $data = $request->validate([
            'phone_number' => ['required'],
            'wp_user_number' => ['required']
        ]);

        $full_phone_number=$request->phone_number_code .$data['phone_number'];
        // $full_wp_number=$request->wpphone_number_code .$data['wp_user_number'];
      
        if (str_contains($full_phone_number, '+')) {
            $phone_number=  $full_phone_number;
        }else{
            $phone_number= "+" .$full_phone_number;
        }
      

        //   return response()->json([
        //     'message' =>  $phone_number,

        // ]);
        // check whether phone number exist in the system or not

        if (User::where('phone_number', '=', $request->fullphonenumber)->exists()) {
            return response()->json([
                'message' => 'phoneExist',

            ]);
        }
        if (User::where('whatsapp_number', '=', $request->fullwpphonenumber)->exists()) {
            return response()->json([
                'message' => 'wpphoneExist',

            ]);
        }

//



        /* Get credentials from .env */

      
        // VA7a6cd0db15a89b504fe8c02ef6f0d34f
        // ACdf8314a9e2769a09b75d8ffa95a5affd
        // b939ed58da9be1407bb06576c59042e1

        $token = "695c18d11dbf8b984aa977ea87f618bd";
        $twilio_sid = "AC0ccb78d6f0281a135a79f75b3ae3a4ea";
        $twilio_verify_sid = "VAbeb356ac09d5f4cbc63fedcbc50e316c";
            

            // if phone number is not valid 

            try {
                // $client = new Twilio\Rest\Client($sid, $token);
                $twilio = new Client($twilio_sid, $token);
                // dd( $twilio );
                $twilio->verify->v2->services($twilio_verify_sid)
                    ->verifications
                    ->create($phone_number, "sms");
            } catch (\Exception $e) {
                return response()->json([
                    'message' => $e->getCode(),

                ]);
            }

            return response()->json([
                'message' => 'okay',

            ]);
        }
    

        public function verifyOtp(Request $request)
        {
    
            // $admin = User::where('user_type' , 4)->first();
    
            $data = $request->validate([
                'verification_code' => ['required', 'numeric'],
                'phone_number' => ['required'],
               
            ]);
            /* Get credentials from .env */

       


            // return response()->json([
            //     'message' =>  $phone_number,
            // ]);

            $token = "695c18d11dbf8b984aa977ea87f618bd";
        $twilio_sid = "AC0ccb78d6f0281a135a79f75b3ae3a4ea";
        $twilio_verify_sid = "VAbeb356ac09d5f4cbc63fedcbc50e316c";
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verificationChecks
        ->create(['code' => $data['verification_code'], 'to' => $data['phone_number']]);

           
            if ($verification->valid) {
                // $user = tap(User::where('phone_number', $data['phone_number']))->update(['user_type' => 3]);
    
                /* Authenticate user */
               
                // $country = Country::where('country_code',$data['countryCode'])->get();
                // $countryId = $country[0]->id;
                // $phone_number = str_replace($data['countryCode'], "", $data['phone_number']);
      
               
   
                
                return response()->json([
                    'message' => 'valid',
                ]);
            }
    
            return response()->json([
                'phone_number' => $data['phone_number'],
                'message' => 'Invalid',
            ]);
        }
    public function verifyallDetails(Request $request)
    {

        // $admin = User::where('user_type' , 4)->first();
        // return response()->json([
        //     'message' =>  "here",
        // ]);
        $data = $request->validate([

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'wpphone_number' => ['required'],
            'password' => ['required', 'string', 'min:5'],
            'email' =>['required','string'],
            'user_name'=>['required','string'],
            'countryCode'=>['required'],
            'city' =>['required','string'],
            'company' =>['required','string'],
            'role' =>['required','string'],
            'nationality'=>['required'],
        ]);


        $full_phone_number=$request->phone_number_code . "-" .$request->phone_number;
        $full_wp_number=$request->wpphone_number_code . "-" .$request->wpphone_number;
      
        if (str_contains($full_phone_number, '+')) {
            $phone_number=  $full_phone_number;
        }else{
            $phone_number= "+" .$full_phone_number;
        }
      
        if (str_contains($full_wp_number, '+')) {
            $wpphone_number=  $full_wp_number;
        }else{
            $wpphone_number= "+" .$full_wp_number;
        }

        
        /* Get credentials from .env */
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio = new Client($twilio_sid, $token);
     
       
            // $user = tap(User::where('phone_number', $data['phone_number']))->update(['user_type' => 3]);

            /* Authenticate user */
           
            // $country = Country::where('country_code',$data['countryCode'])->get();
            // $countryId = $country[0]->id;

            // $phone_number = str_replace($data['countryCode'], "", $data['phone_number']);
            // $wpphone_number = str_replace($data['countryCode'], "", $data['wpphone_number']);
 
 
  $user = new User();
 $user->first_name = $data['first_name'];
           if(!empty($request->middle_name)  && isset($request->middle_name) ){
            $user->middle_name = $request->middle_name;
           }
            $user->last_name = $data['last_name'];
            $user->phone_number = $phone_number;   
            $user->whatsapp_number =$wpphone_number;   
            $user->email =$data['email'];   
            $user->user_name =$data['user_name'];   
            $user->country_id =$data['countryCode'];  
            
            //adding bday
            $var =  $request->birth_date;
            if($var == '' || $var== 'undefined'){
              $user->birth_date = NULL;
            }
            else{
              $birthdate=implode("-", array_reverse(explode("/", $var))); 
              $user->birth_date = $birthdate;
            }
            $birthdate=implode("-", array_reverse(explode("/", $var))); 
            //end

            $user->nationality=$data['nationality'];
            $user->password =  Hash::make($data['password']);

            //business info
            $user->city = $data['city'];
            $user->company =$data['company'];
            $user->designation = $data['role'];
            //end

            $user->user_type = 3;
            $user->messenger_color="#AA8840";
            // if(isset($admin) && !empty($admin)){
            //     $user->rm_id = $admin->id;
            // }

         
            $user->save();
   //create contact in addresstwo
            Auth::login($user);

            try {
                $middle_name='';
                if (isset($user->middle_name) && !empty($user->middle_name)){
$middle_name = $user->middle_name;
                }
                $client = new \GuzzleHttp\Client();
$response = $client->request('POST', 'https://app.addresstwo.com/ContactForm', [
    'form_params' => [
        'userID' => 14252,
    'targetUserID' => 14252,
    'FormID' => 13,
    'FirstName' => $user->first_name,
    'MiddleName' => $middle_name,
    'LastName' => $user->last_name,
    'ContactEmailAddress' => $user->email,
    'ContactMobileNumber' => $data['phone_number'],
    'CustomType~1003' => $user->id
    ]
]);
            } catch (\Throwable $th) {
                // throw $th;
            }

            $data = [
                'user_name' => $user->user_name ,
                'user_email' => $user->email,
               
            ];
      
            
            return response()->json([
                'message' => 'valid',
            ]);
        

        return response()->json([
            'phone_number' => $data['phone_number'],
            'message' => 'Invalid',
        ]);
    }

    public function resendOtp(Request $request)
    {


        /* Get credentials from .env */
        $token = "b939ed58da9be1407bb06576c59042e1";
        $twilio_sid = "ACdf8314a9e2769a09b75d8ffa95a5affd";
        $twilio_verify_sid = "VA7a6cd0db15a89b504fe8c02ef6f0d34f";
        $twilio = new Client($twilio_sid, $token);

        try {
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($request->phone_number, "sms");

            return 'success';
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect('verify-email');
        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
