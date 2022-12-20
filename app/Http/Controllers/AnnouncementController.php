<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementFiles;
use App\Models\AnnouncementView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;


class AnnouncementController extends Controller
{
  //

  public function createAnnouncement(Request $request, $id = NULL)
  {
    $announcement = new Announcement();
    $userId = Auth::id();
    $userType = Auth::User()->user_type;


    if ($userType == 4) {
      $announcement->user_id = $userId;
      $announcement->created_by = '4';
      $announcement->title = $request->annTitle;
      $announcement->description = $request->annDetail;
      $announcement->project_value = $request->projectVal;
      $announcement->announcement_location = $request->location;

      $var =  $request->closingDate;
      if ($var == '' || $var == 'undefined') {
        $announcement->closing_date = NULL;
      } else {
        $closedate = implode("-", array_reverse(explode("/", $var)));
        $announcement->closing_date = $closedate;
      }
      $closedate = implode("-", array_reverse(explode("/", $var)));

      $announcement->status = $request->status;
    } else {
      // return $announcement;
      $announcement->user_id = $userId;
      $announcement->created_by = '3';
      $announcement->title = $request->annTitle;
      $announcement->description = $request->annDetail;
      $announcement->status = $request->status;
    }
    $announcement->save();   

    // $targetDir = "uploads/"; 
    // $fileNames = array_filter($_FILES['announcementmedia']['name']); 
    // if(!empty($fileNames)){ 
    //     foreach($_FILES['announcementmedia']['name'] as $key=>$val){ 
    //         // File upload path 
    //         echo "here";
    //         return $fileNames;
    //         $fileName = basename($_FILES['files']['name'][$key]); 
    //         $targetFilePath = $targetDir . $fileName; 

    //         // Check whether file type is valid 
    //         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          
    //     } 
    // }

    $images = array();
 
    if ($files = $request->file('announcementmedia')) {
     
      foreach ($files as $file) {
        // return "here";
        // return $file;
        $name=time().$file->getClientOriginalName();
        $name = str_replace(" ","-",$name);
        // $file->move('image', $name);
        $images[] = $name;
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        // return $ext;
        $filePath = 'announcement/' . $announcement->id . '/' . $name;
        // return file_get_contents($file);    
        // return $filePath;
        Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

        $announcementfiles = new AnnouncementFiles;
        $announcementfiles->announcement_id = $announcement->id;
        $announcementfiles->media_location =  $filePath;
        if ($ext == "jpeg" ||  $ext == "JPEG" || $ext == "jpg" || $ext == "JPG" || $ext == "bmp" || $ext == "svg" || $ext == "SVG" || $ext == "png" || $ext == "PNG" || $ext == "gif" || $ext == "GIF" || $ext == "avif" ||  $ext == "svg+xml" || $ext == "webp" || $ext == "tiff" || $ext == "bmp" || $ext == "x-icon") {
          $announcementfiles->media_type = '1';
        } else if ($ext == "mp4" || $ext == "MP4" || $ext == "mpeg2" || $ext == "mpeg" || $ext == "mpeg4") {
          $announcementfiles->media_type = '2';
        } else {
          $announcementfiles->media_type = '3';
        }
        $announcementfiles->save();
      }
      
      // return $images;
    }

    // if ($request->hasFile('announcementmedia')) {

    //   // return $request->file('announcementmedia');

    //   $files = array_filter($request->file('announcementmedia'));
    //   foreach ($files as $file) {
    //     $filename = $file->getClientOriginalName();
    //     echo "here";
    //     return $file;
    //   }
    // }

    //media save
    //      if(isset($request->addedimageArr) && !empty($request->addedimageArr)){
    //         $addedimageArr = explode(',', $request->addedimageArr);
    //      foreach($addedimageArr as $addedImageId){   
    //         $product_image = "announcement_files" .  $addedImageId;
    //         if($request->hasfile($product_image))
    //         {
    //             $product_pic = $request->file($product_image);
    //             $name=time().$product_pic->getClientOriginalName();
    //             $firstname = substr($product_pic->getClientOriginalName(), 0, strpos($product_pic->getClientOriginalName(), '.'));
    //             $ext=pathinfo($product_pic->getClientOriginalName(), PATHINFO_EXTENSION);  
    //             $name = str_replace(" ","-",$name);
    //             $filePath = 'announcement/' . $announcement->id . '/' . $name;
    //             Storage::disk('s3')->put($filePath, file_get_contents($product_pic) , 'public');

    //             $announcementfiles = new AnnouncementFiles;
    //             $announcementfiles->announcement_id = $announcement->id;
    //             $announcementfiles->media_location =  $filePath;   
    //             if($ext=="jpeg" || $ext== "jpg" || $ext=="bmp" || $ext=="svg" || $ext=="png" || $ext=="gif" || $ext=="avif" ||  $ext=="svg+xml" || $ext=="webp" || $ext=="tiff" || $ext=="bmp" || $ext=="x-icon"){
    //                 $announcementfiles->media_type ='1';
    //             }else if($ext=="mp4" || $ext== "mpeg2" || $ext=="mpeg" || $ext=="mpeg4"){
    //                 $announcementfiles->media_type ='2';
    //             }else{
    //                 $announcementfiles->media_type_type ='3';
    //             }
    //             $announcementfiles->save();
    //         }

    //     }
    // }




    return Redirect::back();
  }

  public function addAnnouncement(Request $request, $id = NULL)
  {
    return view('announcements.announcement');
  }


  public function announcementDetail(Request $request, $id = NULL)
  {
    $announcementdetail = Announcement::where('id', $id)->first();
    $announcementImages = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 1)->get();
    $announcementVideos = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 2)->get();
    
    return view('announcements.announcementDetail', compact('announcementdetail', 'announcementImages', 'announcementVideos'));
  }
  
   public function announcementBusinessDetail(Request $request, $id = NULL)
  {
    $announcementdetail = Announcement::where('id', $id)->first();
    $announcementImages = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 1)->get();
    $announcementVideos = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 2)->get();
    
    return view('announcements.announcementBusinessDetail', compact('announcementdetail', 'announcementImages', 'announcementVideos'));
  }


  public function showAnnouncement()
  {
    $announcementlists = Announcement::where("status",'2')->orderBy('id', 'DESC')->get();
    return view('announcements.announcementList', compact('announcementlists'));
  }

  public function announcementViewed(Request $request){
    $userid=Auth::id();
    $user = AnnouncementView::where('user_id', '=', $userid)->where('announcement_id', '=', $request->entity_id)->first();
    if ($user === null) {
      // user doesn't exist
      $viewedannouncement = new AnnouncementView;
      $viewedannouncement->announcement_id = $request->entity_id;
      $viewedannouncement->user_id = $userid;
      $viewedannouncement->save();
    }
   
  }

  public function checkAnnouncementViewers(Request $request){

    $showList="";
    $viewers=AnnouncementView::where('announcement_id', '=', $request->entity_id)->get();
    // return $viewers;
    foreach($viewers as $viewer){
      
      $showList .='<span class="announcementDesc pb-1">'.  $viewer->user->first_name . ' ' . $viewer->user->last_name .'</span>';
    }
    return $showList;

  }
}
