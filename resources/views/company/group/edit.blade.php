@extends('layouts.master')
@section('title') Admin | Edit Group @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.groups') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.group')}}" class="btn btn-primary">{{ __('admin.groups') }}</a>
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
                                <form action="{{route('company.group.update',$group->id)}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                     <?php
                                        $NameExt = "name_";
                                        $stringValues = $group->name;
                                    ?>
                                    <div class="row">
                                    <div class="form-group">
                                    <!-- <label>{{ trans('admin.group_name');}}</label> -->
                                        @include('comman.tab')
                                    </div>

                                    <input type="hidden" name="company_id" value="{{Auth::id()}}">

                                    <div class="form-group col-md-6 col-sm-6" style="margin-top: 30px;margin-left: 20px;">
                                        <label>{{ trans('admin.group_guide');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="guide_id" name="guide_id">
                                            <option value="">None</option>
                                                @foreach ($guides as $guide)

                                                <option value="{{$guide->id}}" {{ $guide->id==$group->guide_id ?'selected' : ''}}>{{Helper::get_localizedDefault($guide->firstname)}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label>{{ trans('admin.mecca_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="mecca_id" name="mecca_id">
                                            <option value="">None</option>
                                            @foreach ($mecca_hotels as $mecca_hotel)
                                                <option value="{{$mecca_hotel->id}}" {{ $mecca_hotel->id==$group->mecca_id ?'selected' : ''}} >{{Helper::get_localizedDefault($mecca_hotel->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6">
                                        <label>{{ trans('admin.city_hotel');}}</label>

                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="city_id" name="city_id">
                                            <option value="">None</option>
                                            @foreach ($city_hotels as $city_hotel)
                                                <option value="{{$city_hotel->id}}" {{ $city_hotel->id==$group->city_id ?'selected' : ''}}>{{Helper::get_localizedDefault($city_hotel->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label>{{ trans('admin.mina_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="mina_id" name="mina_id">
                                            <option value="">None</option>
                                            @foreach ($minas as $mina)
                                                <option value="{{$mina->id}}" {{ $mina->id==$group->mina_id ?'selected' : ''}}>{{Helper::get_localizedDefault($mina->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6">
                                       <label>{{ trans('admin.arafat_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="arafat_id" name="arafat_id">
                                            <option value="">None</option>
                                            @foreach ($arafats as $arafat)
                                                <option value="{{$arafat->id}}" {{ $arafat->id==$group->arafat_id ?'selected' : ''}}>{{Helper::get_localizedDefault($arafat->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $group->active==1 ?'checked' : ''}}>
                                        <label class="form-check-label" for="active">{{ trans('admin.user_active');}}</label>
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
