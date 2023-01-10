@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Media Archive</title>
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

@include('layouts.header', ['headtext' => 'MEDIA ARCHIVE','subheadtext'=> ''])    
<div class="fluid-container foundationContainer">
    <h5 class="ml-3 filterCss mt-4">ADVANCED FILTER</h5>

    <div class="createMediaArchiveSection m-2 mb-3">

        <!--advance filter div-->        
        <section class="advancedFilterDiv">        
            <div class="submissionDiv fullSectionHeight mt-3 mb-3 ml-2 mr-2 pt-5 pb-2">
                <div class="row col-12 justify-content-between">
                    <div class="col-6 col-lg-6 col-md-6 mt-3 pr-0">
                        <?php
                        $year_start = 2000;
                        $year_end = date('Y');
                        echo '<select class="form-control filterPerYearDropdown" id="filterPerYear" name="filterPerYear">';
                        echo '<option value="" disabled selected>Filter Per Year</option>';
                        for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                            echo '<option value="' . $i_year . '">' . $i_year . '</option>';
                        }
                        echo '</select>';
                        ?>
                    </div>

                    <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0 pb-3 mt-3">
                        <select class="form-control filterPerMonthDropdown ml-3" id="filterPerMonth" name="filterPerMonth">
                            <option value="" disabled selected>Filter Per Month</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-12 justify-content-between mb-3">
                    <select class="form-control mediaCategory" id="selectMediaCategory" name="mediaCategory">
                        <option value="" disabled selected>By Category</option>
                        <option value="1">Family Media</option>
                        <option value="2">Business Media</option>
                        <option value="3">Letters</option>                   
                    </select>
                </div>

                <div class="col-12 justify-content-between mb-3">
                    <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="keywords" placeholder="Keywords" />
                </div>
                
                <div class="col-12 justify-content-between mb-3">
                    <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="searchName" placeholder="Search Name" />
                </div>
                
                <div class="col-12 justify-content-between mb-3">
                    <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="location" placeholder="Location" />
                </div>
            </div>
            
        </section>
        <!--advance filter div-->

    </div>
    
    <div class="submittedbtnidv col-7 m-auto mb-5 ">
        <button type="button" class="mt-3 buttonCss button_text col-12 p-2 applyFilter">Apply Filter</button>
    </div>

</div>
@endsection