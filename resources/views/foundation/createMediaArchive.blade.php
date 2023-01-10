@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Create Media Archive</title>
@section('content')
@section('css')
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
<style>
    html,
    body {
        font-family: 'Montserrat';
        font-style: normal;        
        background-image: url(/assests/images/foundation/foundationbg.jpg);
        width: -webkit-fill-available;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        max-width: 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection

@include('layouts.header', ['headtext' => 'THE FOUNDATION','subheadtext'=> ''])    
<div class="fluid-container foundationContainer">

    <div class="createMediaArchiveSection m-2 mb-3">

        <div class="pt-3 pl-4 pr-4 pb-4">
            <div class="titlediv pb-4">
                Add Media
            </div>            

            <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                <span class="inputSpanText">Date of the Media</span>
            </div>
            <div class="col-12 justify-content-between mb-3 pl-0 pr-0 date datePickerofMedia">
                <input type="text" class="inputTextClass form-control" name="dateofMedia" value="" />
                <span class="input-group-addon birthdatepicker"></span>
            </div>
            
            <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                <span class="inputSpanText">Media Description</span>
            </div>
            <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                <input type="text" class="inputTextClass form-control" name="mediaDesc" value="" />
            </div>
            
            <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                <span class="inputSpanText">Media Category</span>
            </div>
            <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                <select class="form-control mediaCategory" id="selectMediaCategory" name="mediaCategory">
                    <option value="" disabled selected>Select Media Category</option>
                    <option value="1">Family Media</option>
                    <option value="2">Business Media</option>
                    <option value="3">Letters</option>                   
                </select>
            </div>
            
            <div class="mb-md-0 inputSpanText" style="font-weight: 600;">
                <img class="c-pointer global-font-color mr-2" src="{{asset('assests/images/announcement/uploadMediaIcon.svg')}}" alt="" style="">
                <label for="mediaArchive" class="uploadMediaLabel mt-auto mb-auto">Upload Media</label>
            </div>
            
            <div class="row col-12 justify-content-between pl-0 pr-0 mr-0 ml-0">
                <div class="col-6 col-lg-6 col-md-6 pl-0">
                    <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus">Publish</button>
                </div>

                <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0">
                    <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus btnDiscard">Discard</button>
                </div>
            </div>
            
        </div>

    </div>

</div>
@endsection
@section('script')
<script type='text/javascript'>
    $(document).ready(function() {
        $('.datePickerofMedia').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        }); 
    });    
</script>
@endsection