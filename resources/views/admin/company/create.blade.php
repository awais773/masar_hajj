@extends('layouts.master')
@section('title') Admin | Company @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.company_addnew') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('admin.company.index')}}" class="btn btn-primary">{{ __('admin.companies') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.company_addnew');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.company.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                <?php 
                                    $NameExt = "name_";
                                    $stringValues = '';
                                ?>

                                    <div class="form-group">
                                    <label>{{ trans('admin.company_name');}}</label>
                                        @include('comman.tab')
                                    </div>
                                    <!-- <div class="form-group">
                                    <label>{{ trans('admin.Username');}}</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    </div> -->
                                    <div class="form-group">
                                    <label>{{ trans('admin.guide_email');}}</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                   
                                    <div class="form-group">
                                    <label>{{ trans('admin.guide_password');}}</label>
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" minlength="8" required>
                                    </div>
                                    <div class="form-group">
                                    <label>{{ trans('admin.country_name');}}</label>
                                        <input type="text" class="form-control" name="country_name" value="" required>
                                    </div>

                                    <div class="form-group">
                                    <label>{{ trans('admin.country_logo');}}</label>
                                        <input type="file" class="form-control" name="country_image" required>
                                      
                                    </div>

                                    <div class="form-group">
                                    <label>{{ trans('admin.company_logo');}}</label>
                                        <input type="file" class="form-control" name="company_logo" required>
                                       
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