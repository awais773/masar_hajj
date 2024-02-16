@extends('layouts.master')
@section('title') Company | User @endsection
@section('content')
            <!-- Start Breadcrumbbar -->              
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.user_addnew');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.user')}}" class="btn btn-primary">{{ __('admin.users') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.user_addnew');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.user.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_username')}} <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_email')}} <span style="color: red;">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_password')}} <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_phone')}} <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                            $NameExt = "firstname_";
                                            $stringValues = '';
                                        ?>
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.guide_firstname');}}</label>
                                            @include('comman.tab')
                                        </div>
                                    
                                        <?php 
                                            $NameExt = "lastname_";
                                            $stringValues = '';
                                        ?>
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.guide_lastname');}}</label>
                                            @include('comman.tab')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                        <label>{{ trans('admin.notification_groups');}} <span style="color: red;">*</span></label>
                                        <?php $selectedGroupsString = '';
                                            $crtlName='selectedgroups[]';
                                            $crtlId='selectedgroups';
                                            $placeHolder=trans('admin.notification_selectgroups');
                                            $isMuliple = true;
                                        
                                        ?>
                                    
                                            @include('comman.get-company-group-byid')
                                        </div>
                                        <div class="form-group col-6">
                                        <label>{{ trans('admin.passport_num')}}  <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="passport_num" name="passport_num" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.passport_date');}}  <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" id="passport_date" name="passport_date" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.visa_num');}}  <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="visa_num" name="visa_num" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.visa_date');}}  <span style="color: red;">*</span></label>
                                            <input type="date" class="form-control" id="visa_date" name="visa_date" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.visa_period');}}</label>
                                            <input type="text" class="form-control" id="visa_period" name="visa_period">
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline pb-3">
                                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1">
                                        <label class="form-check-label" for="active">{{ trans('admin.user_active');}}</label>
                                    </div>
                                           
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{ trans('admin.user_save');}}</button>
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