@extends('layouts.master')
@section('title') Company | Group @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.group_addnew') }}</li>
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
                                <form action="{{route('company.group.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <?php
                                        $NameExt = "name_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.group_name');}}</label> <span style="color: red;">*</span>
                                        @include('comman.tab')

                                    </div>

                                    <input type="hidden" name="company_id" value="{{Auth::id()}}">
                                    
                                    <div class="form-group">
                                        <label>{{ trans('admin.group_guide');}}</label> <span style="color: red;">*</span>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="guide_id" name="guide_id">
                                            <option value="">None</option> 
                                                @foreach ($guides as $guide)
                                                <option value="{{$guide->id}}">{{Helper::get_localizedDefault($guide->firstname)}}</option>       		  
                                                @endforeach      		
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ trans('admin.mecca_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="mecca_id" name="mecca_id">
                                            <option value="">None</option>  
                                            @foreach ($mecca_hotels as $mecca_hotel)
                                                <option value="{{$mecca_hotel->id}}">{{Helper::get_localizedDefault($mecca_hotel->name)}}</option>       		  
                                            @endforeach   		
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ trans('admin.city_hotel');}}</label>
                                    
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="city_id" name="city_id">
                                            <option value="">None</option>       		
                                            @foreach ($city_hotels as $city_hotel)
                                                <option value="{{$city_hotel->id}}">{{Helper::get_localizedDefault($city_hotel->name)}}</option>       		  
                                            @endforeach 
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ trans('admin.mina_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="mina_id" name="mina_id">
                                            <option value="">None</option>       		
                                            @foreach ($minas as $mina)
                                                <option value="{{$mina->id}}">{{Helper::get_localizedDefault($mina->name)}}</option>       		  
                                            @endforeach 
                                        </select>
                                    </div>

                                    <div class="form-group">
                                       <label>{{ trans('admin.arafat_hotel');}}</label>
                                        <select class="form-control input-lg chosen" data-placeholder="Choose" tabindex="1" id="arafat_id" name="arafat_id">
                                            <option value="">None</option>       		
                                            @foreach ($arafats as $arafat)
                                                <option value="{{$arafat->id}}">{{Helper::get_localizedDefault($arafat->name)}}</option>       		  
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1">
                                        <label class="form-check-label" for="active">{{ trans('admin.user_active');}}</label>
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