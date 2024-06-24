@extends('layouts.master')
@section('title') Company | Guide @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.guide_addnew') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.guide')}}" class="btn btn-primary">{{ __('admin.guide') }}</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->
            <div class="contentbar">
                <!-- Start row -->
                <div class="row">

                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">{{ trans('admin.guide_addnew');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.guide.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <?php
                                     $NameExt = "firstname_";
                                     $stringValues = '';
                                 ?>
                            <div class="row">
                                 <div class="form-group col-md-6">
                                     <label style="margin-left: 1.2rem;">{{ trans('admin.guide_firstname');}}</label>
                                     @include('comman.tab')
                                 </div>

                                 <?php
                                     $NameExt = "lastname_";
                                     $stringValues = '';
                                 ?>
                                 <div class="form-group col-md-6">
                                     <label style="margin-left: 1.2rem;">{{ trans('admin.guide_lastname');}}</label>
                                     @include('comman.tab')
                                 </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6"style="margin-left: 20px; width: 90%;">
                                    <label>{{ trans('admin.guide_username');}}</label>
                                    <input type="text" class="form-control guide-input" id="username" name="username" required >
                                </div>
                            <div class="form-group col-md-6 col-sm-6" style="margin-right: -20px;">
                                <label>{{ trans('admin.guide_email');}}</label>
                                <input type="email" class="form-control guide-input" id="email" name="email" required >
                            </div>
                        </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6"  style="margin-left: 20px;">
                                    <label>{{ trans('admin.guide_password');}}</label>
                                    <input type="text" class="form-control guide-input" id="password" name="password" minlength="8" required >
                                </div>
                                </div>
                                 <!--   <button type="submit" class="btn btn-success btn-lg btn-block font-18">Submit</button> -->
                                 <div class="form-container" style="text-align: right;">
                                    <button type="submit" class="beautiful-button">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
@endsection
