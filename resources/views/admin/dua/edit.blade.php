@extends('layouts.master')
@section('title') Company | Dua Edit @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('admin.dua') }}</li>
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
                                <h5 class="card-title">{{ trans('admin.company_edit');}}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('company.dua.update',$dua->id)}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                     <?php 
                                        $NameExt = "title_";
                                        $stringValues = $dua->title;
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_title');}}</label>
                                        @include('comman.tab')
                                    </div>  
                                    <?php 
                                        $NameExt = "description_";
                                        $stringValues = $dua->description;
                                        $isTextarea = true;
                                    ?>
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_description');}}</label>
                                        @include('comman.tab')
                                    </div>    
                                    
                                    <div class="form-group">
                                    <label>{{ trans('admin.info_iconfile');}}</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        @if($dua->image)
                                            <img src="{{$dua->image}}" width="100" height="50" class="mb-3">
                                            <input type="hidden" class="form-control" name="image_old" value="{{$dua->image}}">
                                        @endif
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