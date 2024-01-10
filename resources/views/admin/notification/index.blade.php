@extends('layouts.master')
@section('title') Admin | Notification @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.Notification'); }}</li>
                            </ol>
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
                          
                            <div class="card-body">
                                <form action="{{route('admin.notification.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <?php 
                                        $NameExt = "title_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.notification_title');}}</label>
                                        @include('comman.tab')
                                    </div>
                                    
                                    <?php 
                                        $NameExt = "message_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.notification_message');}}</label>
                                        @include('comman.tab')
                                    </div>
                                   
                                    <div class="form-guide">
                                    <label>{{ trans('admin.notification_guides');}}</label>
                                    <?php $selectedUsersString = '';
                                    $crtlName='selectedguides[]';
                                    $crtlId='selectedguides';
                                    $placeHolder= trans('admin.notification_selectguides'); 
                                    $isMuliple = true;
                                    ?>
                        
                                    <div>
                                    @include('comman.get-guides')
                                    </div>
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

                                    <div class="form-group">
                                        <label>{{ trans('admin.notification_users');}}</label>
                                        <?php $selectedUsersString ='';
                                        $crtlName='selectedusers[]';
                                        $crtlId='selectedusers';
                                        $placeHolder=trans('admin.notification_selectusers');
                                        $isMuliple = true;
                                        ?>

                                        @include('comman.get-group-users')
                                        
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