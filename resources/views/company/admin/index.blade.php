@extends('layouts.master')
@section('title') Company | Admin @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.admins');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.admin.add')}}" class="btn btn-primary">{{ trans('admin.add_admin');}}</a>
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
                                <h5 class="card-title">{{__('admin.admin_list')}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">{{__('admin.export_data')}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('admin.user_id');}}</th>
                                            <th>{{ trans('admin.user_name');}}</th>
                                            <th>{{ trans('admin.user_email');}}</th>
                                            <th>{{ trans('admin.user_phone');}}</th>
                                            <th>{{ trans('admin.user_action');}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($companies) && count($companies)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$company->username}}</td>
                                                <td>{{$company->email}}</td>
                                                <td>{{$company->phone}}</td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                
                                                    <a href="{{route('company.admin.edit',$company->id)}}" class="rounded tabledit-edit-button btn btn-sm btn-info mr-2 px-3" style="float: none;"><span class="ti-pencil align-middle"></span></a>
                                                                <!-- <a href="{{route('admin.company.delete',$company->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;">
                                                                
                                                                
                                                               
                                                            </a> -->
                                                            <button type="button" class="tabledit-delete-button btn btn-sm btn-danger deleteDataBtn" data-href="{{route('company.admin.delete',$company->id)}}" data-toggle="modal" data-target="#deleteData"> <span class="ti-trash align-middle"></span></button>
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