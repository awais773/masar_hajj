<!DOCTYPE html>
<html lang="{{session()->get('locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
    <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <!-- Fevicon -->
    <link href="{{asset('frontend/image/sliders/favoicon.png')}}" rel="shortcut icon">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- jvectormap css -->
    <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <!-- Datepicker css -->

    <!-- DataTables css -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('frontend/css/bootstrap-ltr.min.css')}}" rel="stylesheet"> -->

    <link href="{{asset('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <!-- <link rel="stylesheet" href="{{asset('assets/plugins/chartist-js/chartist.min.css')}}"> -->
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- End css -->
</head>
<body class="vertical-layout">

    <div class="infobar-settings-sidebar-overlay"></div>
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                @if(Auth::user()->type==1)
                <div class="logobar">
                    <a href="#" class="logo logo-large">{{ Helper::get_localizedDefault(Auth::user()->name) }}</a>
                    <!-- <a href="index.html" class="logo logo-small"><img src="{{asset('assets/images/small_logo.svg')}}" class="img-fluid" alt="logo"></a> -->
                </div>
                @endif
                <!-- End Logobar -->
                <!-- Start Profilebar -->
                <div class="profilebar text-center">
                    
                    <!-- <img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"> -->
                    @if(Auth::user()->type==0)
                    <div class="profilename">
                      <h5> <img src="{{Auth::user()->company_logo}}" class="img-fluid companyLogo"></h5>
                    </div>
                    @endif
                    <div class="userbox">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ url('profileCompany') }}" class="profile-icon" ><img src="{{asset('assets/images/svg-icon/user.svg')}}"></a></li>
                            <!--<li class="list-inline-item"><a href="#" class="profile-icon"><img src="{{asset('assets/images/svg-icon/email.svg')}}" class="img-fluid" alt="email"></a></li>-->
                               <li class="list-inline-item">
    <a href="mailto:example@example.com" class="profile-icon">
        <img src="{{ asset('assets/images/svg-icon/email.svg') }}" class="img-fluid" alt="email">
    </a>
</li>
                            <li class="list-inline-item"><a href="{{ route('logout.perform') }}" class="profile-icon"><img src="{{asset('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout"></a></li>
                            <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> -->
                        </ul>
                      </div>
                </div>
                <!-- End Profilebar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li class="vertical-header">{{__('admin.main')}}</li>
                    
                        @if(Auth::check() && Auth::user()->type==1)
                        
                        <li>
                            <a href="{{route('admin.home')}}">
                              <img src="{{asset('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{ __('admin.Dashboard') }}</span>
                            </a>
                         
                        </li>
                        <li>
                            <a href="{{route('admin.map')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ __('admin.map_view') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.company.index')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{__('admin.companies') }}</span>
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="{{route('admin.hajjprocedure.index')}}">-->
                        <!--        <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.Information'); }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li>
                            <a href="{{route('admin.notification')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.Notification'); }}</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javaScript:void();">
                                <img src="{{asset('assets/images/svg-icon/apps.svg')}}" class="img-fluid" alt="layouts"><span>{{ trans('admin.registration_requests'); }}</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                            
                                <li><a href="{{route('admin.registrationRequest')}}"><i class="mdi mdi-circle"></i>{{ trans('admin.registration_requests'); }}</a></li>
                                <li><a href="{{route('admin.registrationRequest.approved')}}"><i class="mdi mdi-circle"></i>{{ trans('admin.registration_requests_approved'); }}</a></li> 
                                <li><a href="{{route('admin.registrationRequest.reject')}}"><i class="mdi mdi-circle"></i>{{ trans('admin.registration_requests_reject'); }}</a></li>
                            </ul>
                        </li>

                        <!-- <li>
                            <a href="{{route('admin.map')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.clear_data'); }}</span>
                            </a>
                        </li> -->


                       @elseif(Auth::check() && Auth::user()->type==0)
                       <li>
                            <a href="{{route('company.home')}}">
                              <img src="{{asset('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>{{ trans('admin.Dashboard'); }}</span>
                            </a>
                         
                        </li>
                        
                        <li>
                            <a href="{{route('company.residence')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.location'); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.group')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.groups'); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.guide')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.guides'); }}</span>
                            </a>
                        </li>
                          <li>
                            <a href="{{route('company.user')}}">
                                <img src="{{asset('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.users'); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.hajjprocedure.index')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.Information'); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.dua')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.dua'); }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.survey')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.survey'); }}</span>
                            </a>
                        </li>
                        
                           <li>
                            <a href="{{route('company.notification')}}">
                                <img src="{{asset('assets/images/svg-icon/widgets.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.Notification'); }}</span>
                            </a>
                        </li>

                      

                        <!--<li>-->
                        <!--    <a href="{{route('company.admin')}}">-->
                        <!--        <img src="{{asset('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="widgets"><span>{{ trans('admin.admins'); }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                       @endif                                               
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="#" class="mobile-logo">
                            {{__('admin.masar')}}
                                <!-- <img src="{{asset('assets/images/logo.svg')}}" class="img-fluid" alt="logo"> -->
                            </a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="{{asset('assets/images/svg-icon/horizontal.svg')}}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="{{asset('assets/images/svg-icon/verticle.svg')}}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{asset('assets/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                           <img src="{{asset('assets/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                           <img src="{{asset('assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>
                                <!-- <li class="list-inline-item">
                                    <div class="searchbar">
                                        <form>
                                            <div class="input-group">
                                              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                              <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><img src="{{asset('assets/images/svg-icon/search.svg')}}" class="img-fluid" alt="search"></button>
                                              </div>
                                            </div>
                                        </form>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                   @if(Auth::check() && Auth::user()->type==0)
                                      @php
                                $notifications = \App\Models\Notification::where('to_id', Auth::id())
                                                                          ->where('viewed', 0) // Filter by viewed = 0
                                                                          ->latest('date_created')
                                                                          ->get();
                                $totalNotifications = $notifications->count();
                            @endphp
                                <li class="list-inline-item">
                                    <div class="notifybar">
                                        <a href="{{route('company.showNotification') }}"class="infobar-icon">
                                            <img src="{{asset('assets/images/svg-icon/notifications.svg')}}" class="img-fluid" alt="notifications">
                                                <span>{{ $totalNotifications }}</span> <!-- Display total number of notifications -->
                                        </a>
                                    </div>
                                </li>
                                @endif
                                <!-- <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                            <img src="{{asset('assets/images/svg-icon/settings.svg')}}" class="img-fluid" alt="settings">
                                        </a>
                                    </div>
                                </li> -->
                            <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="flag flag-icon-{{ session()->get('locale') ? session()->get('locale') == 'en' ? 'us' : (session()->get('locale') == 'ar' ? 'sa' : session()->get('locale')) : 'us' }} flag-icon-squared"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-right changeLang" aria-labelledby="languagelink">
                                            @if(count(Helper::getLanguages()) > 0)
                                                @foreach(Helper::getLanguages() as $language)
                                                    <a class="dropdown-item" href="#" data-id="{{ $language->code }}">
                                                        <i class="flag flag-icon-{{ $language->code ? $language->code == 'en' ? 'us' : ($language->code == 'ar' ? 'sa' : $language->code) : 'us' }} flag-icon-squared"></i>
                                                        {{ $language->name }}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div> 
                <!-- End row -->
            </div>
            <!-- End Topbar -->
           @yield('content')
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2024 Masarhajj - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->

         <!-- Modal -->
        <div class="modal fade" id="deleteData" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                </div>
                <div class="modal-body">
                    <p>Enter the <b>DELETE</b> if you want to delete this data </p>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" id="actionUrl" value="">
                        <div class="form-group">
                            <input type="text" class="form-control deleteInput" name="delete" placeholder="DELETE">
                            <span class="text-danger showError"></span>
                        </div>
                        <button type="button" class="btn btn-success btn-lg btn-block font-18 deleteBtn">Submit</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> -->
            </div>
            
            </div>
        </div>

    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/detect.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/vertical-menu.js')}}"></script>
    <!-- Switchery js -->
    <script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
    <!-- Chart js -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chart.js/chart-bundle.min.js')}}"></script>
    <!-- Piety Chart js -->
    <script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script> 
    <!-- Vector Maps js -->
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Custom Dashboard Social js -->   
    <script src="{{asset('assets/js/custom/custom-dashboard-social.js')}}"></script>
    <!-- Core js -->
     <!-- Datatable js -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/custom/custom-table-datatable.js')}}"></script>
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
    <!-- Select2 js -->
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script> 
    <!-- Switchery js -->
    <script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
    
    <!-- <script src="{{asset('assets/js/custom/custom-chart-chartistjs.js')}}"></script> -->
    <script src="{{asset('assets/js/custom/custom-form-select.js')}}"></script>
     

    <script src="{{asset('assets/js/core.js')}}"></script>
    <script src="{{asset('assets/js/custom/custom-form-editor.js')}}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">  
    <script type="text/javascript">
       
        var url = "{{ route('changeLang') }}";
    
        $(".changeLang >a").click(function(){
            var langcode=$(this).data('id');
            window.location.href = url + "?lang="+langcode;
            
        });

        $(document).ready(function(){

            $('.deleteDataBtn').click(function(){
                $('#actionUrl').val($(this).data('href'))
            });
           $('.deleteBtn').click(function(){
            var checkInputValue=$('.deleteInput').val();
            if(checkInputValue=='DELETE'){
                var actionUrl=$('#actionUrl').val();
                $.ajax({
                    type: "GET",
                    url: actionUrl,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(response){
                        toastr.success(response.message); 
                        $('#deleteData').hide();
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    },
                    error: function(response){
                        toastr.error(response.error); 
                        $('#deleteData').hide();
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    }

                });
            }else{
                
                $('.showError').text('Enter the DELETE if you want to delete.')
            
            }
           });
            
        });
      
    </script>
    @include('layouts.notification')
    <!-- End js -->
</body>
</html>