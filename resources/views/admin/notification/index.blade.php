@extends('layouts.master')
@section('title') Admin | Notification @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
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
                        <div class="card m-b-30 mx-auto">

                             <div class="card-body col-sm-12 col-md-18 col-xl-30">
                                <form action="{{route('admin.notification.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <?php
                                        $NameExt = "title_";
                                        $stringValues = '';
                                    ?>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">
                                        <label>{{ trans('admin.notification_title');}}</label>
                                            @include('comman.tab')
                                        </div>

                                        <?php
                                            $NameExt = "message_";
                                            $stringValues = '';
                                        ?>
                                        <div class="form-group col-md-6 col-sm-6">
                                        <label>{{ trans('admin.notification_message');}}</label>
                                            @include('comman.tab')
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="form-guide col-md-6 col-sm-6" style="margin-left: 20px;">
                                    <label>{{ trans('admin.notification_guides');}}</label>
                                    <?php $selectedUsersString = '';
                                    $crtlName='selectedguides[]';
                                    $crtlId='selectedguides';
                                    $placeHolder= trans('admin.notification_selectguides');
                                    $isMuliple = true;
                                    ?>
                                    <div class="nice-select default_sel mb_30 w-100">
                                    @include('comman.get-guides')
                                    </div>
                                </div>

                                    <div class="form-group col-md-5 col-sm-6"  >
                                    <label>{{ trans('admin.notification_groups');}} </label>
                                    <?php $selectedGroupsString = '';
                                        $crtlName='selectedgroups[]';
                                        $crtlId='selectedgroups';
                                        $placeHolder=trans('admin.notification_selectgroups');
                                        $isMuliple = true;
                                    ?>
                                        @include('comman.get-comapny-groups')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6" style="margin-left: 20px;">
                                        <label>{{ trans('admin.notification_users');}}</label>
                                        <?php $selectedUsersString ='';
                                        $crtlName='selectedusers[]';
                                        $crtlId='selectedusers';
                                        $placeHolder=trans('admin.notification_selectusers');
                                        $isMuliple = true;
                                        ?>

                                        @include('comman.get-group-users')

                                    </div>

                                    <div class="form-companies col-md-5 col-sm-6"  >
                                        <label>{{ trans('admin.notification_companies');}}
                                        </label>
                                        <?php $selectedUsersString = '';
                                        $crtlName='selectedcompany[]';
                                        $crtlId='selectedcompany';
                                        $placeHolder= trans('admin.notification_selectCompanies');
                                        $isMuliple = true;
                                        ?>

                                        <div>
                                        @include('comman.get-company')
                                        </div>
                                    </div>
                                </div>
                                    <br>
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
