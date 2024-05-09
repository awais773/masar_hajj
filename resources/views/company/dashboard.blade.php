@extends('layouts.master')
@section('title') {{__('admin.companies')}} | {{__('admin.Dashboard')}} @endsection
@section('content')
 <!-- Start Breadcrumbbar -->                    
 <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title"  style="text-align: center; padding-left: 300px" >{{__('admin.company_dashboard')}}</h4>
                    </div>
                </div>          
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->    
            <div class="contentbar">                
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card m-b-30 card1">
                            <div class="card-header" style="text-align: right;
                            padding-left: 50px ">                                
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
                            <div class="card-header" style="text-align: right;
                            padding-left: 50px ">                                
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <h5 class="card-title mb-0">{{ trans('admin.guides'); }}</h5>
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
                            <div class="card-header" style="text-align: right;
                            padding-left: 50px ">                                
                                <div class="row align-items-center">
                                    <div class="col-7">
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
                 
                </div>
                   <div>
                    <canvas id="myChart"></canvas>
                </div>
                <!-- End row -->
            </div>
            
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'User Count',
                            data: @json($values),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
@endsection