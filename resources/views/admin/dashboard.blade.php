@extends('layouts.master')
@section('title') Admin | Dashboard @endsection
@section('content')
<!-- Start Breadcrumbbar -->                    
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.Dashboard'); }}</li>
                    </ol>
                </div>
            </div>
          
        </div>          
    </div>
    <!-- Start Contentbar -->
    <!-- Start Contentbar -->    
    <div class="contentbar">                
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card1">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0">{{ trans('admin.groups'); }}</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                <div class="col-md-4"><h3>{{$groups}}</h3></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End col -->                    
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card2">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0">{{ trans('admin.guides'); }}</h5>
                                    </div>
                                    <div class="col-6 d-none">
                                        <ul class="list-inline-group text-right mb-0 pl-0">
                                            <li class="list-inline-item mr-0 font-12">Referrals</li>
                                            <li class="list-inline-item"><input type="checkbox" class="js-switch-performance" checked /></li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                           <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                    <div class="col-md-4"><h3>{{$guides}}</h3></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card3">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <h5 class="card-title mb-0">{{ trans('admin.users'); }}</h5>
                                    </div>
                                   
                                </div>                                
                            </div>
                            <div class="card-body text-center pb-0 px-0">
                                <div class="row align-items-center">
                                <div class="col-md-4"><p>{{__('admin.total')}}</p></div>
                                    <div class="col-md-4"><h3>{{$companyUsers}}</h3></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                   
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-12 col-xl-7">
                        <div class="card m-b-30" style=" width: 170%;">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Country Wise Performance</h5>
                            </div>
                            <div class="card-body">
                                <div id="world-map" class="vector-world-map"></div>                                
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#6e81dc", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">62%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">USA</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#5fc27e", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>5.5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">83%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">India</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#fcc100", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>4/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">55%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Australia</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>                                    
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#f44455", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>3/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">35%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Argentina</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#72d0fb", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>6.5/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">92%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">Russia</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <p class="piety-data-attributes mb-0 mr-3">
                                                    <span data-peity='{ "fill": ["#718093", "#dcdde1"],   "innerRadius": 20, "radius": 24 }'>2/7</span>
                                                </p>
                                                <div class="media-body">
                                                    <p class="mb-1 text-black f-w-6 font-18">28%</p>
                                                    <h5 class="card-title text-muted font-16 mb-0">South Africa</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
@endsection