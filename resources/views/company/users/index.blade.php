@extends('layouts.master')
@section('title') Company | User @endsection
@section('content')
            <!-- Start Breadcrumbbar -->                    
            <<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('company.home')}}">{{ __('admin.Dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.users');}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <a href="{{route('company.user.add')}}" class="btn btn-primary">{{ trans('admin.user_addnew');}}</a>
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
                                <h5 class="card-title">User List</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('admin.user_id');}}</th>
                                                <th>{{ trans('admin.user_name');}}</th>
                                                <th>{{ trans('admin.user_email');}}</th>
                                                <th>{{ trans('admin.user_phone');}}</th>
                                                <th>{{ trans('admin.user_passport_num');}}</th>
                                                <th>{{ trans('admin.visa_num');}}</th>
                                                <th>{{ trans('admin.user_group');}}</th> 
                                                <th>{{ trans('admin.user_action');}}</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @if(isset($companyUsers) && count($companyUsers)>0)
                                       @php
                                       $i=1;
                                       @endphp
                                        @foreach ($companyUsers as $companyUser)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ Helper::get_localizedDefault($companyUser->firstname).' '.Helper::get_localizedDefault($companyUser->lastname)}}</td>
                                                <td>{{ $companyUser->email}}</td>
                                                <td>{{ $companyUser->phone}}</td>
                                                <td>{{ $companyUser->passport_num}}</td>
                                                <td>{{ $companyUser->visa_num}}</td>
                                                @php
                                               
                                                if($companyUser->group_id){
                                                            $groupName=$companyUser->group_id;
                                                            $tempArray=[];
                                                            $groups =\App\Models\Group::whereIn('id',json_decode($groupName))->get();
                                                            if(count($groups)>0){
                                                                $groups_by_company_array = Helper::group_array_by(@$groups, "company_name");
                                                                $keys = array_keys($groups_by_company_array); 
                                                                for ($i = 0; $i < count($keys); $i++) {
                                                                    foreach ($groups_by_company_array[$keys[$i]] as $group) {
                                                                        $tempArray[]=Helper::get_localizedDefault($group["name"])."@";
                                                                    } 
                                                                            
                                                                }
                                                                $groupName=str_replace("@","",json_encode($tempArray));
                                                            }else{
                                                                $groupName='';
                                                            }
                                                           
                                                    }else{
                                                            $groupName='';
                                                    }
                                                    unset($tempArray);
                            
                                                @endphp
                                                <td>{{ $groupName}}</td>
                                                <td style="white-space: nowrap; width: 15%;">
                                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                    <div class="btn-group btn-group-sm" style="float: none;">
                                                                <a href="{{route('company.user.edit',$companyUser->id)}}" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="ti-pencil"></span></a>
                                                                <a href="{{route('company.user.delete',$companyUser->id)}}" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-trash"></span></a>
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