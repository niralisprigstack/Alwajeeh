<!-- <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                        <textarea style="height: auto !important;" placeholder="Comments" class="w-100 inputTextAreaClass form-control blogCommentInput" name="annDetail"></textarea>
                    </div>                                        
                                        
               

                <div class="row">
                    <div class="col-6 col-lg-6">
                        <button style="height: 40px;" type="button"  data-check='parent'  onclick='addComment(this)'class="mt-4 buttonCss buttonCss button_text col-12 p-0">Post</button>
                    </div>
                    <div class="col-6 col-lg-6">
                    </div>
                </div> -->




                
@if($announcementdetail)
<!-- defaultChildComment Div for clone  -->
<div class="defaultChildComment card-body d-none">
    <div class="user_info d-flex  mb-2 ">
    @if(!empty(Auth::user()->profile_pic))
      <img src="{{Storage::disk('s3')->url(Auth::user()->profile_pic)}}" class='comment_profile mr-2' alt="profile" >
      @else
      <img src="{{asset('assests/images/profile/avatar_default.jpg') }}" class='comment_profile mr-2' alt="profile" >
      @endif
     <div class="published_by">
     <span class='paraFont font-weight-bold'>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
     <span class='d-block published_date'></span>
     </div>
    </div>
      <p class='mb-0 comment'></p>
    
</div>
<!-- end of defaultChildComment Div for clone  -->


   <!-- comment code starts from here  -->
<!-- input parent is used for checking value of input  -->
 <!-- hjash -->
    <!-- all comment container -->
    <div class="commentContainer">  
        <!-- default commentBox -->
<div class="defaultComment inputparent mb-2 d-none">
  <div class="card commentCard">
    <div class="card-body p-0">
    <div class="user_info d-flex  mb-2 ">
    @if(!empty(Auth::user()->profile_pic))
      <img src="{{Storage::disk('s3')->url(Auth::user()->profile_pic)}}" class='comment_profile mr-2' alt="profile" >
      @else
      <img src="{{asset('assests/images/profile/avatar_default.jpg') }}" class='comment_profile mr-2' alt="profile" >
      @endif
     <div class="published_by">
     <span class='paraFont font-weight-bold'>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
     <span class='d-block published_date'></span>
     </div>
    </div>
      <p class='mb-0 comment'></p>
       <div class='mt-1'>
      <span class=" c-gold text-underline replyBtn c-pointer" onclick='openReplyEditor(this)' data-id="" style=""> Reply</span>
      <span class=" c-pointer ml-3 d-none showreplies"  onclick="togglecomment(this)" style=""> <i class="far fa-comment"></i> <span class="showHide">Show</span> replies </span>
      </div> 
    </div>

     <div class="childCommentDiv p-2">
    <div class="card-body  replyEditor pt-0 pr-0 pb-0 d-none">
<textarea type="text" class="form-control shadow-none blogCommentInput inputTextClass" rows="2" col="4" placeholder="Reply"></textarea>
<div class="btn-group mt-3">
<button class="btn sPrimary-btn shadow-none respondcomment" data-check='child' onclick="addComment(this)">Respond</button><button class="buttonCss shadow-none respondcomment button_text btn-sm ml-3 w-50" onclick='removeReplyEditor(this)'>Cancel</button>
</div>
    </div>
</div> 

  </div>
</div>

<!-- already added comment  -->
@foreach($announcementdetail->comments->whereNull('parent_comment_id') as $comment)

<?php
 $showRepliesClass= "d-none";
if($comment->children->count()){
  $showRepliesClass= "";
}

?>
<div class="commentbox inputparent" data-id="{{$comment->id}}">
  <div class="card commentCard">
    <div class="card-body p-2 p-0">
    <div class="user_info d-flex  mb-2 ">
    @if(!empty($comment->user->profile_pic))
      <img src="{{Storage::disk('s3')->url($comment->user->profile_pic)}}" class='comment_profile mr-2' alt="profile" >
      @else
      <img src="{{asset('assests/images/profile/avatar_default.jpg') }}" class='comment_profile mr-2' alt="profile" >
      @endif
     <div class="published_by">
     <span class='paraFont font-weight-bold'>{{$comment->user->first_name}} {{$comment->user->last_name}}</span>
     <span class='d-block published_date'> 
     
     <!-- convert utc to dubai time zone  -->
     <?php
     $carbon_date = \Carbon\Carbon::parse($comment->created_at);
     $carbon_date = $carbon_date->addHours(4);
     $carbon_date =  $carbon_date->isoFormat('MMMM Do YYYY');
     ?>
     {{$carbon_date}} </span>
     </div>
    </div>
      <p class='mb-0 comment'>{{$comment->comment}}</p>
       <div class="mt-1">
      <span class="mt-3 c-gold text-underline replyBtn  c-pointer" onclick='openReplyEditor(this)' data-id="{{$comment->id}}" style=""> Reply</span>
      <span class=" c-pointer ml-3 showreplies {{$showRepliesClass}}" onclick="togglecomment(this)"  style=""> <i class="far fa-comment"></i> <span class="showHide">Show</span> replies </span>
      </div> 
    </div>

    <!-- if child is present then all child comments  -->
     <div class="childCommentDiv p-2">
    <div class="card-body  replyEditor pt-0 pr-0 pb-0 d-none">
<textarea type="text" class="form-control shadow-none blogCommentInput inputTextClass" rows="2" col="4" placeholder="Reply"></textarea>
<p class='commenterror text-danger mb-0'></p>
<div class="btn-group mt-2">
        <button class="buttonCss shadow-none respondcomment button_text btn-sm" data-check='child'  onclick="addComment(this)">Respond</button><button class="buttonCss shadow-none respondcomment button_text btn-sm ml-3 w-50" onclick='removeReplyEditor(this)'>Cancel</button>
</div>
    </div>

  
    @if($comment->children->count())
    @foreach($comment->children as $childComment)
    <div class="card-body p-2 pl-5  d-none">
    <div class="user_info d-flex align-items-center mb-2 ">
    @if(!empty($childComment->user->profile_pic))
      <img src="{{Storage::disk('s3')->url($childComment->user->profile_pic)}}" class='comment_profile mr-2' alt="profile" >
      @else
      <img src="{{asset('assests/images/profile/avatar_default.jpg') }}" class='comment_profile mr-2' alt="profile" >
      @endif
     <div class="published_by">
     <span class='paraFont font-weight-bold'>{{$childComment->user->first_name}} {{$childComment->user->last_name}}</span>
     <span class='d-block published_date'> 
     
     <!-- convert utc to dubai time zone  -->
     <?php
     $carbon_date = \Carbon\Carbon::parse($childComment->created_at);
     $carbon_date = $carbon_date->addHours(4);
     $carbon_date =  $carbon_date->isoFormat('MMMM Do YYYY');
     ?>
     {{$carbon_date}} </span>
     
     </div>
    </div>
      <p class='mb-0 comment'>{{$childComment->comment}}</p>
    </div>
@endforeach
@endif
</div> 
<!-- child comment div ends here  -->
  </div>
</div>
@endforeach
    </div>

    @endif