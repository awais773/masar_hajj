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
            <div class="card m-b-30 mx-auto">
                <div class="card-header">
                    <h5 class="card-title">{{ trans('admin.company_addnew');}}</h5>
                </div>
                <div class="card-body col-sm-12 col-md-18 col-xl-30">
                    <form action="{{route('admin.company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <?php
                                    $NameExt = "name_";
                                    $stringValues = '';
                                ?>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6">
                                <!-- <label>{{ trans('admin.company_name');}}</label> -->
                                @include('comman.tab')
                            </div>
                            <div class="form-group col-md-5 col-sm-6" style="margin-top: 25px;">
                                <label>{{ trans('admin.country_name') }}</label>
                                <select class="form-control" name="country_name" id="country_name" required>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                    <label>{{ trans('admin.Username');}}</label>
                                        <input type="text" class="default_sel mb_30 w-100" name="username" id="username" placeholder="Username" required>
                                    </div> -->
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6" style="margin-left: 20px;">
                                <label>{{ trans('admin.guide_email') }}</label>
                                <input type="email" class="form-control col-md-11 col-sm-16" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-5 col-sm-6" style="margin-left: -15px;">
                                <label>{{ trans('admin.guide_password') }}</label>
                                <input type="password" class="form-control col-md-30 col-sm-16" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                                    <label>{{ trans('admin.country_logo');}}</label>
                                        <input type="file" class="form-control" name="country_image" required>
                                    </div> -->
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6" style="margin-left: 20px;">
                                <label>{{ trans('admin.company_logo');}}</label>
                                <input type="file" class="form-control col-md-11 col-sm-16" name="company_logo" required>
                            </div>
                        </div>
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
