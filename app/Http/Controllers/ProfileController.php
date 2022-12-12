<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
      
    }
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function editProfile()
    {
        $countries = Country::all();
        return view('profile.profilepage', compact('countries'));
    }

    public function updateProfile()
    {
        $managers=User::where("user_type", 4)->get();
        $countries = Country::all();
        return view('myProfile', compact('countries','managers'));
    }

    public function saveProfile(Request $request)
    {
     
        // $this->validate($request, ['image' => 'required|image']);

      try {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country_id = $request->country;
       if(!empty($request->email)){
        $user->email =$request->email;
       }
        $user->company =$request->company;
        $user->designation =$request->designation;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;

       
        if($request->hasfile('profile_pic'))
         {
            $file = $request->file('profile_pic');
            $name=time().$file->getClientOriginalName();
            $name = str_replace(" ","-",$name);
            $filePath = 'profile_/' . $user->id . '/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file) , 'public');
            $user->profile_pic = $filePath;
         }
     
        $user->save();
        return response()->json([
            'message' => 'success',
    ]);
      } catch (\Throwable $th) {
          throw $th;
      }
    }

    public function saveProfilePic(Request $request){
    
      $user = Auth::user();
      if($request->hasfile('profilepic'))
         {
            $file = $request->file('profilepic');
            $name=time().$file->getClientOriginalName();
            $name = str_replace(" ","-",$name);
            $filePath = 'profile_/' . $user->id . '/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file) , 'public');
            $user->profile_pic = $filePath;
         }
     
      // if(isset($request->profile_pic_base64) && !empty($request->profile_pic_base64))
      //    {
      //     $image_64 = $request->profile_pic_base64;

        

      //     $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];

      //       $name=time().$extension;
      //       $name = str_replace(" ","-",$name);

      //       $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
      //       $image = str_replace($replace, '', $image_64); 
      //       $image = str_replace(' ', '+', $image);

      //       $filePath = 'profile_/' . $user->id . '/' . $name;
      //       Storage::disk('s3')->put($filePath,  base64_decode($image) , 'public');
      //       $user->profile_pic = $filePath;
      //    }
        //  return $user->profile_pic;

         $user->save();         
        return redirect('profile');

    }


    public function storePersonaldet(Request $request){
      // $dateStr =  str_replace('/', '-', $request->birth_date);
      // $dateStr = date("Y-m-d", strtotime($dateStr));
      //  $birthdate= date('Y-m-d', strtotime($request->birth_date));
        $var =  $request->birth_date;
        $user = Auth::user();
        if($var == '' || $var== 'undefined'){
          $user->birth_date = NULL;
        }
        else{
          $birthdate=implode("-", array_reverse(explode("/", $var))); 
          $user->birth_date = $birthdate;
        }
        $birthdate=implode("-", array_reverse(explode("/", $var))); 
       
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        // $user->birth_date = $birthdate;
      
        $user->country_id = $request->country_code;
        $user->nationality = $request->nationality;
        // $user->postal_address = $request->postal_address;
      
       
          // return  $request->nationality;
          try {
            $user->save(); 
          } catch (\Throwable $th) {
            // $user->birth_date = '2000-01-01';
            $user->birth_date = NULL;
            $user->save(); 
          }
          
          return redirect('profile');
        }

        public function storeProfessionaldet(Request $request){
          $user = Auth::user();

          $full_business_number=$request->business_number_code . "-" .$request->business_user_number;   
          if (str_contains($full_business_number, '+')) {
              $business_number=  $full_business_number;
          }else{
              $business_number= "+" .$full_business_number;
          }
          $user->company = $request->company;
          $user->designation = $request->role;
          $user->city = $request->city;
          $user->business_number=$business_number;
          $user->business_country_id = $request->business_country_code;
          $user->save(); 
          // try {
          //   if($request->email != $user->email){
          //     $client = new \GuzzleHttp\Client();
          //     $response = $client->request('POST', 'http://net.addresstwo.com/api/SmbalHelp', [
          //         'form_params' => [
          //         'ContactEmail' => $request->email,
          //         'ContactID' => $user->id,
          //         'UserOrVendor' => 'User',
          //         ]
          //     ]);
          //   }
          // } catch (\Throwable $th) {
          //   throw $th;
          // }
         
          return redirect('profile');        
        }


        public function storeContactdet(Request $request){
          $user = Auth::user();

          $full_phone_number=$request->phone_number_code .'-'.$request->user_number;
          $full_wp_number=$request->wpuser_number .'-'.$request->wp_user_number;
        
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
          $user->email = $request->email;
          $user->phone_number = $phone_number;
          $user->whatsapp_number =$wpphone_number;
          $user->save(); 
          return redirect('profile');   
        }

        public function deleteProfilePic(Request $request){
          $userId = Auth::id(); 
            if(isset($request->getImg) && !empty($request->getImg)){        
                 try {
                    $user = User::findOrFail($userId);
                    if(Storage::disk('s3')->exists($user->profile_pic)){
                        Storage::disk('s3')->delete($user->profile_pic);
                       }

                    User::where('id',$userId)->update(['profile_pic' => null]);
                 } catch (\Throwable $th) {
                     //throw $th;
                 } 
            }    
          // return "Success";   
        }

}
