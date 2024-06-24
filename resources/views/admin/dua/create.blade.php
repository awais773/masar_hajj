@extends('layouts.master')
@section('title') Company | Company @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.new_dua') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.dua')}}" class="btn btn-primary">{{ __('admin.dua') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.new_dua');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.dua.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="row">
                                    <?php
                                        $NameExt = "title_";
                                        $stringValues = '';
                                    ?>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                   <!-- <label>{{ trans('admin.info_title');}}</label> -->
                                        @include('comman.tab')
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group" style="margin-top:2rem ;">
                                        <label>{{ trans('admin.info_iconfile');}}</label>
                                            <input type="file" class="form-control" name="image" id="image" required>
                                            <p class="help-block">Please Upload image in jpg, png format.</p>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                        $NameExt = "description_";
                                        $stringValues = '';
                                        $isTextarea = true;
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_description');}}</label>
                                        @include('comman.tab')
                                    </div>




                                   <!-- <button type="submit" class="btn btn-success btn-lg btn-block font-18">Submit</button> -->
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
