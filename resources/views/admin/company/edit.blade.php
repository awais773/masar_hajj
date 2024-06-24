@extends('layouts.master')
@section('title') Admin | Company @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.companies') }}</li>
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
                        <div class="card m-b-30 mx-auto">
                            <div class="card-header">
                                <h5 class="card-title">{{ trans('admin.company_edit');}}</h5>
                            </div>
                            <div class="card-body col-sm-12 col-md-18 col-xl-30">
                                <form action="{{route('admin.company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                <?php
                                    $NameExt = "name_";
                                    $stringValues = $company->name;
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6">
                                    <!-- <label>{{ trans('admin.company_name');}}</label> -->
                                        @include('comman.tab')
                                    </div>
                                    <div class="form-group col-md-5 col-sm-6" style="margin-top: 25px;">
                                        <label>{{ trans('admin.country_name') }}</label>
                                        <select class="form-control" name="country_name" id="country_name" required>
                                                 <option value="{{ $company->country_name}}" {{ $company->country_name == $company->country_name ? 'selected' : '' }}>
                                                    {{ $company->country_name }}
                                                </option>
                                         </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6" style="margin-left: 20px;">
                                    <label>{{ trans('admin.guide_email');}}</label>
                                        <input type="email" class="form-control col-md-11 col-sm-16" name="email" id="email" value="{{$company->email}}" required readonly>
                                    </div>

                                    <div class="form-group col-md-5 col-sm-6" style="margin-left: -15px;">
                                    <label>{{ trans('admin.guide_password');}}</label>
                                        <input type="text" class="form-control" name="password" id="password" value="{{$company->temp_password}}" required>
                                    </div>
                                </div>
                                   <!-- <div class="form-group">
                                    <label>{{ trans('admin.country_name');}}</label>
                                        <input type="text" class="form-control" name="country_name" value="{{$company->country_name}}" required>
                                    </div> -->

                                    <!-- <div class="form-group" >
                                    <label>{{ trans('admin.country_logo');}}</label>
                                        <input type="file" class="form-control" name="country_image">
                                        @if($company->country_image)
                                            <img src="{{$company->country_image}}" width="100" height="50" class="mb-3">
                                            <input type="hidden" class="form-control" name="country_image_old" value="{{$company->country_image}}">
                                        @endif
                                    </div> -->
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6" style="margin-left: 20px;">
                                    <label>{{ trans('admin.company_logo');}}</label>
                                        <input type="file" class="form-control col-md-11 col-sm-16" name="company_logo">
                                        @if($company->company_logo)
                                            <img src="{{$company->company_logo}}" width="100" height="50" class="mb-3">
                                            <input type="hidden" class="form-control" name="company_logo_old" value="{{$company->company_logo}}">
                                        @endif
                                    </div>
                                </div>
                                    <div class="form-container" style="text-align: right;">
                                        <button type="submit" class="beautiful-button">Submit</button>
                                    </div>
                                   <!-- <button type="submit" class="btn btn-success btn-lg btn-block font-18">Submit</button> -->
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
