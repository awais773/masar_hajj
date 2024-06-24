@extends('layouts.master')
@section('title') Admin | Requests @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.registration_requests');}}</li>
                            </ol>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('admin.company.add')}}" class="btn btn-primary">{{ trans('admin.company_addnew');}}</a>
                        </div>
                    </div> -->

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
                            <h5 class="card-title">{{__('admin.requests_list')}}</h5>
                            </div>
                            <div class="card-body">
                            <h6 class="card-subtitle">{{__('admin.export_data')}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin.sr_no')}}</th>
                                            <th>{{__('admin.comp_name')}}</th>
                                            <th>{{__('admin.comp_email')}}</th>
                                            <th>{{__('admin.comp_phone')}}</th>
                                            <th>{{__('admin.registration_date')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($registrationRequests) && count($registrationRequests)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($registrationRequests as $registrationRequest)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ $registrationRequest->comp_name }}</td>
                                                <td>{{$registrationRequest->comp_email}}</td>
                                                <td>{{$registrationRequest->comp_phone}}</td>
                                                <td>{{$registrationRequest->registration_date}}</td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
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
