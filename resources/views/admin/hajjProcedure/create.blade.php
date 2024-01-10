@extends('layouts.master')
@section('title') Admin | Company @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.add_Hajj_procedure') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('admin.hajjprocedure.index')}}" class="btn btn-primary">{{ __('admin.Information') }}</a>
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
                                <h5 class="card-title">{{ trans('admin.add_Hajj_procedure');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.hajjprocedure.store')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <?php 
                                        $NameExt = "title_";
                                        $stringValues = '';
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_title');}}</label>
                                        @include('comman.tab')
                                    </div>
                                    
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_iconfile');}}</label>
                                        <input type="file" class="form-control" name="icon" id="icon" required>
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