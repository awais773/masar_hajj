@extends('layouts.master')
@section('title') Admin | Edit Guide @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.guides') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.guide')}}" class="btn btn-primary">{{ __('admin.guides') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.guide_edit');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.guide.update',$guide->id)}}" method="POST"  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>{{ trans('admin.guide_username');}}</label>
                                    <input type="text" class="form-control" id="username" name="username" required value="{{$guide->username}}">
                                </div>

                                <div class="form-group">
                                    <label>{{ trans('admin.guide_email');}}</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="{{$guide->email}}">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('admin.guide_password');}}</label>
                                    <input type="text" class="form-control" id="password" name="password" required value="{{$guide->password}}">
                                </div>

                                <?php
                                    $NameExt = "firstname_";
                                    $stringValues = $guide->firstname;
                                ?>
                                <div class="form-group">
                                    <label>{{ trans('admin.guide_firstname');}}</label>
                                    @include('comman.tab')
                                </div>

                                <?php 
                                    $NameExt = "lastname_";
                                    $stringValues = $guide->lastname;
                                ?>
                                <div class="form-group">
                                    <label>{{ trans('admin.guide_lastname');}}</label>
                                    @include('comman.tab')
                                </div>


                                <button type="submit" class="btn btn-success btn-lg btn-block font-18">Submit</button>
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