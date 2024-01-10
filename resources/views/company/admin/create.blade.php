@extends('layouts.master')
@section('title') Company | Admin @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.add_admin') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.admin')}}" class="btn btn-primary">{{ __('admin.admins') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.add_admin');}}</h5>
                            </div>
                            <div class="card-body">
                               
                                <form action="{{route('company.admin.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_name')}}</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_email')}}</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_password')}}</label>
                                            <input type="text" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>{{ trans('admin.user_phone')}}</label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
<!--                                    
                                    <div class="form-check form-check-inline pb-3">
                                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1">
                                        <label class="form-check-label" for="active">{{ trans('admin.user_active');}}</label>
                                    </div>
                                            -->
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