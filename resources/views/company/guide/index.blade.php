@extends('layouts.master')
@section('title') Admin | Hajj Procedure @endsection
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.guides');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.guide.add')}}" class="btn btn-primary">{{ trans('admin.guide_addnew');}}</a>
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
                                <h5 class="card-title">Guide List</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('admin.guide_id');}}</th>
                                            <th>{{ trans('admin.guide_name');}}</th>
                                            <!--<th>Company</th>-->
                                            <th>{{ trans('admin.guide_email');}}</th>
                                            <th>{{ trans('admin.guide_action');}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($guides) && count($guides)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($guides as $guide)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ Helper::get_localizedDefault($guide->firstname)}}</td>
                                                <td>{{ $guide->email}}</td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                {{--  <a href="{{route('company.guide.edit',$guide->id)}}" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.guide.delete',$guide->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>  --}}
                                                                <a href="{{route('company.guide.edit',$guide->id)}}" class="amazing-edit-btn" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.guide.delete',$guide->id)}}" class="amazing-delete-btn" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
                                                    </div>

                                                </div>
                                                </td>
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
