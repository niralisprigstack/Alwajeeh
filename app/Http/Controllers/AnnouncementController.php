<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementFiles;
use App\Models\AnnouncementView;
use App\Models\AnnouncementComments;
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

  public function createAnnouncement( Request $request,$id = NULL)
  {

    // return "here";
    $userId = Auth::id();
    $userType = Auth::User()->user_type;
    // return "here".$id;
    if (!empty($id)) {
    
      $announcement = Announcement::findOrFail($id);
    } else {
      $announcement = new Announcement();
    }




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
        $announcement->closing_date = $closedate." "."00:00:00";
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

    date_default_timezone_set('Asia/Dubai');
    $edStamp = strtotime(now());
    $ed = date("Y-m-d H:i:s", $edStamp);
    $announcement->created_at = $ed;
    $announcement->updated_at = $ed;
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





    if (!empty($id)) {
      $announcement = Announcement::findOrFail($id);
      if (isset($request->removedImageIds) && !empty($request->removedImageIds)) {
        // return "here";
        $imageids = substr($request->removedImageIds, 0, -1);
        $removeImageArray = explode(',',  $imageids);
        foreach ($removeImageArray as $imageId) {
          try {
            $announcementfiles = AnnouncementFiles::findOrFail($imageId);
            if (Storage::disk('s3')->exists($announcementfiles->media_location)) {
              Storage::disk('s3')->delete($announcementfiles->media_location);
            }

            AnnouncementFiles::where('id', $imageId)->delete();
          } catch (\Throwable $th) {
            //throw $th;
          }
        }
      }

      // if (Storage::disk('s3')->exists($announcement->media_location)) {
      //   Storage::disk('s3')->delete($announcement->media_location);
      // }
    }

    if (isset($request->addedimageArr) && !empty($request->addedimageArr)) {
      $addedimageArr = explode(',', $request->addedimageArr);

      // var_dump($_FILES['marketplace_image'. $addedImageId]); 
      // return ; 
// echo $request;
      foreach ($addedimageArr as $addedImageId) {   
        // var_dump($_FILES['marketplace_image'.$addedImageId]); 
            
        $announcement_media = "marketplace_image" .  $addedImageId;
        
        // return $announcement_media;
        // return $request->$announcement_media;
  // echo "inforeach";
  // echo $request->hasfile($announcement_media);
        if ($request->hasfile($announcement_media)) {      
          // echo "inif";    
          // return $request->hasfile($announcement_media);
          $product_pic = $request->file($announcement_media);
          $name = time() . $product_pic->getClientOriginalName();
          $firstname = substr($product_pic->getClientOriginalName(), 0, strpos($product_pic->getClientOriginalName(), '.'));
         
        //  return $firstname;
          $ext = pathinfo($product_pic->getClientOriginalName(), PATHINFO_EXTENSION);
          // $name = str_replace(" ", "-", $name);
          $filePath ='announcement/' . $announcement->id . '/' . $name;
          Storage::disk('s3')->put($filePath, file_get_contents($product_pic), 'public');

          // echo $filePath;   
          $announcementfiles = new AnnouncementFiles;
          $announcementfiles->announcement_id = $announcement->id;
          $announcementfiles->media_location =  $filePath;
          // $announcementfiles->attachment_name = $firstname;
          if ($ext == "jpeg" ||  $ext == "JPEG" || $ext == "jpg" || $ext == "JPG" || $ext == "bmp" || $ext == "svg" || $ext == "SVG" || $ext == "png" || $ext == "PNG" || $ext == "gif" || $ext == "GIF" || $ext == "avif" ||  $ext == "svg+xml" || $ext == "webp" || $ext == "tiff" || $ext == "bmp" || $ext == "x-icon") {
                  $announcementfiles->media_type = '1';
                } else if ($ext == "mp4" || $ext == "MP4" || $ext == "mpeg2" || $ext == "mpeg" || $ext == "mpeg4") {
                  $announcementfiles->media_type = '2';
                } else {
                  $announcementfiles->media_type = '3';
                }
                // echo $announcementfiles->media_type;  
                // return;
                $announcementfiles->save();
        }
        
      }
      // return ;
    }



    //delete announcement
if($request->status=='3'){
  try {
        
    $announcement = Announcement::findOrFail($id);
   
 $filePath = 'announcement/'.$id;
       if(Storage::disk('s3')->exists($filePath) > 0){
        Storage::disk('s3')->delete($filePath);
       }
       AnnouncementFiles::where('announcement_id',$id)->delete();
        Announcement::where('id',$id )->delete();

} catch (\Throwable $th) {
    throw $th;
}

}
    
    // multiple attribute chng
    // $images = array();

    // if ($files = $request->file('announcementmedia')) {

    //   foreach ($files as $file) {
    //     // return "here";
    //     // return $file;
    //     $name=time().$file->getClientOriginalName();
    //     $name = str_replace(" ","-",$name);
    //     // $file->move('image', $name);
    //     $images[] = $name;
    //     $ext = pathinfo($name, PATHINFO_EXTENSION);
    //     // return $ext;
    //     $filePath = 'announcement/' . $announcement->id . '/' . $name;
    //     // return file_get_contents($file);    
    //     // return $filePath;
    //     Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

    //     $announcementfiles = new AnnouncementFiles;
    //     $announcementfiles->announcement_id = $announcement->id;
    //     $announcementfiles->media_location =  $filePath;
    //     if ($ext == "jpeg" ||  $ext == "JPEG" || $ext == "jpg" || $ext == "JPG" || $ext == "bmp" || $ext == "svg" || $ext == "SVG" || $ext == "png" || $ext == "PNG" || $ext == "gif" || $ext == "GIF" || $ext == "avif" ||  $ext == "svg+xml" || $ext == "webp" || $ext == "tiff" || $ext == "bmp" || $ext == "x-icon") {
    //       $announcementfiles->media_type = '1';
    //     } else if ($ext == "mp4" || $ext == "MP4" || $ext == "mpeg2" || $ext == "mpeg" || $ext == "mpeg4") {
    //       $announcementfiles->media_type = '2';
    //     } else {
    //       $announcementfiles->media_type = '3';
    //     }
    //     $announcementfiles->save();
    //   }

    //   // return $images;
    // }


// return 'hereee';

    return redirect('announcementList');
  }

  public function addoreditAnnouncement(Request $request, $id = NULL)
  {
    if (!empty($id)) {
      $announcement =  Announcement::where('id', $id)->with('announcementfiles')->first();

      $announcementfiles = AnnouncementFiles::where("announcement_id", $id)->get();
      // return $announcementfiles;
      // $announcement =  Announcement::where('id', $id)->leftJoin('announe', 'users.id', '=', 'notifications.from_id')
      // ->select('notifications.*', 'users.profile_pic')->orderBy('id', 'DESC')->first();
      return view('announcements.announcement', compact('announcement', 'announcementfiles'));
    } else {
      return view('announcements.announcement');
    }
  }


  public function announcementDetail(Request $request, $id = NULL)
  {
    $announcementdetail = Announcement::where('id', $id)->with('comments')->first();
    $announcementImages = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 1)->get();
    $announcementVideos = AnnouncementFiles::where('announcement_id', $id)->where('media_type', 2)->get();


    if ($announcementdetail->created_by == 3) { //Family
      return view('announcements.announcementDetail', compact('announcementdetail', 'announcementImages', 'announcementVideos'));
    } else { //Business
      return view('announcements.announcementBusinessDetail', compact('announcementdetail', 'announcementImages', 'announcementVideos'));
    }
  }

  public function showAnnouncement()
  {
    $announcementlistsQuery = Announcement::with('announcement_views')
      ->where("status", '2');

    if (isset($_GET['k']) && $_GET['k'] != '') {
      $getTitle = $_GET['k'];
      $announcementlistsQuery->where("title", "LIKE", '%' . $getTitle . '%');
    }
    if (isset($_GET['m']) && $_GET['m'] != '') {
      $getMonth = $_GET['m'];
      $announcementlistsQuery->whereMonth("created_at", $getMonth);
    }
    if (isset($_GET['y']) && $_GET['y'] != '') {
      $getYear = $_GET['y'];
      $announcementlistsQuery->whereYear("created_at", $getYear);
    }

    $announcementlists = $announcementlistsQuery->orderBy('id', 'DESC')->get();
    return view('announcements.announcementList', compact('announcementlists'));
  }

  public function myAnnouncement()
  {
    $userid = Auth::id();
    $announcementlists = Announcement::with('announcement_views')
      ->where("user_id", $userid)->orderBy('id', 'DESC')->get();

    //  dd($announcementlists);
    //  return;
    return view('announcements.myannouncementList', compact('announcementlists'));
  }

  public function addAnnouncementInterest(Request $request)
  {
    $userid = Auth::id();
    Announcement::where('id', $request->entity_id)->where('user_id', $userid)->update(['interested' => '1']);
  }

  public function announcementViewed(Request $request)
  {
    $userid = Auth::id();
    $user = AnnouncementView::where('user_id', '=', $userid)->where('announcement_id', '=', $request->entity_id)->first();
    if ($user === null) {
      // user doesn't exist
      $viewedannouncement = new AnnouncementView;
      $viewedannouncement->announcement_id = $request->entity_id;
      $viewedannouncement->user_id = $userid;
      $viewedannouncement->save();
    }
  }

  public function checkAnnouncementViewers(Request $request)
  {

    $showList = "";
    $userId = Auth::id();
    $viewers = AnnouncementView::where('announcement_id', '=', $request->entity_id)->where("user_id","!=",$userId)->get();
    // return $viewers;
    foreach ($viewers as $viewer) {

      $showList .= '<span class="announcementDesc pb-1">' .  $viewer->user->first_name . ' ' . $viewer->user->last_name . '</span>';
    }
    return $showList;
  }


  public function announcementComment(Request $request)
  {
    $authId = Auth::id();
    if (!empty($request->comment) && !empty($request->announcement_id)) {
      $announcementComment = new AnnouncementComments;
      $announcementComment->announcement_id = $request->announcement_id;
      $announcementComment->comment = $request->comment;
      $announcementComment->user_id = $authId;
      if (isset($request->parent_id) && !empty($request->parent_id) && $request->parent_id != 0) {
        $announcementComment->parent_comment_id =  $request->parent_id;
      }
      $announcementComment->save();

      $carbon_date = \Carbon\Carbon::parse($announcementComment->created_at);
      $carbon_date = $carbon_date->addHours(4);
      $carbon_date =  $carbon_date->isoFormat('MMMM Do YYYY');
      $announcementComment->date = $carbon_date;
      return  $announcementComment;
    }
  }


  public function publishUnpublishAnnouncement(Request $request)
  {
    $status = $request->status;
    $announcementId = $request->announcement_id;



    try {
      if ($status == "1") {
        //approve means published
        Announcement::where('id', $announcementId)->update(['status' => 2]);
      } else if ($status == "0") {
        //reject
        Announcement::where('id', $announcementId)->update(['status' => 3]);
      }
    } catch (\Throwable $th) {
      throw $th;
    }

   
  }





  
  public function reviewAnnouncements()
  {
    $announcementlistsQuery = Announcement::with('announcement_views')
      ->where("status", '4');

    if (isset($_GET['k']) && $_GET['k'] != '') {
      $getTitle = $_GET['k'];
      $announcementlistsQuery->where("title", "LIKE", '%' . $getTitle . '%');
    }
    if (isset($_GET['m']) && $_GET['m'] != '') {
      $getMonth = $_GET['m'];
      $announcementlistsQuery->whereMonth("created_at", $getMonth);
    }
    if (isset($_GET['y']) && $_GET['y'] != '') {
      $getYear = $_GET['y'];
      $announcementlistsQuery->whereYear("created_at", $getYear);
    }

    $announcementlists = $announcementlistsQuery->orderBy('id', 'DESC')->get();
    return view('announcements.reviewMemberAnnouncements', compact('announcementlists'));
  }
  
}
