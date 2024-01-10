@extends('layouts.master')
@section('title') Company | Survey @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.new_survey'); }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.survey')}}" class="btn btn-primary">{{ __('admin.survey') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.new_survey');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.survey.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <?php 
                                        $NameExt = "question_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.question');}}</label>
                                        @include('comman.tab')
                                    </div>
                                    
                                    <?php 
                                        $NameExt = "choose_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.choose');}}</label>
                                        @include('comman.tab')
                                    </div>
                                   
                                    <div class="form-group">
                                    <label>{{ trans('admin.notification_groups');}}</label>
                                    <?php $selectedGroupsString = '';
                                        $crtlName='selectedgroups[]';
                                        $crtlId='selectedgroups';
                                        $placeHolder=trans('admin.notification_selectgroups');
                                        $isMuliple = true;
                                    ?>
                                        @include('comman.get-comapny-groups')
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