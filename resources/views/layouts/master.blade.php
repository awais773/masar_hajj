<!DOCTYPE html>
<html lang="{{session()->get('locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
    <meta name="keywords"
        content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
    <meta name="author" content="Themesbox17">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0,  shrink-to-fit=no user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <!-- Fevicon -->
    <link href="{{ asset('frontend/image/sliders/favoicon.png') }}" rel="shortcut icon">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <!-- jvectormap css -->
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <!-- Datepicker css -->

    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- <link href="{{ asset('frontend/css/bootstrap-ltr.min.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/plugins/chartist-js/chartist.min.css') }}"> -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include Chart.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


    <!-- End css -->
</head>
<body class="vertical-layout">

    {{--  <div class="infobar-settings-sidebar-overlay"></div>  --}}
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <div class="leftbar" style="background-color: #ffffff;">

            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                @if (Auth::user()->type == 1)
                    <div class="logobar">
                        <a href="#"
                            class="logo logo-large">{{ Helper::get_localizedDefault(Auth::user()->name) }}</a>
                        <!-- <a href="index.html" class="logo logo-small"><img src="{{ asset('assets/images/small_logo.svg') }}" class="img-fluid" alt="logo"></a> -->
                    </div>
                @endif
                <!-- End Logobar -->
                <!-- Start Profilebar -->
                <div class="profilebar text-center">
                    @if (Auth::user()->type == 0)
                    <div class="profilename">
                        <h5><img src="{{ Auth::user()->company_logo }}" class="img-fluid companyLogo"></h5>
                    </div>
                    @else
                        <img src="{{ asset('assets/images/users/profile.svg') }}" class="img-fluid" alt="profile">
                    @endif
                    <div class="userbox">
                        <ul class="list-inline mb-0">
                            <!--   <li class="list-inline-item"><a href="{{ url('profileCompany') }}" class="profile-icon" ><img src="{{ asset('assets/images/svg-icon/user.svg') }}"></a></li> -->
                            <!--<li class="list-inline-item"><a href="#" class="profile-icon"><img src="{{ asset('assets/images/svg-icon/email.svg') }}" class="img-fluid" alt="email"></a></li>-->
                            <!--  <li class="list-inline-item">
            <a href="mailto:example@example.com" class="profile-icon">
        <img src="{{ asset('assets/images/svg-icon/email.svg') }}" class="img-fluid" alt="email">
        </a>
     </li>  -->
                            <!--  <li class="list-inline-item"><a href="{{ route('logout.perform') }}" class="profile-icon"><img src="{{ asset('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout"></a></li> -->
                            <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> -->
                        </ul>
                    </div>
                </div>
                <!-- End Profilebar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar" style="background-color: #fcf6f6be;">
                    <ul class="vertical-menu" style="background-color: #ffffff;">
                        {{--  <li class="vertical-header">{{__('admin.main')}}</li>  --}}

                        @if (Auth::check() && Auth::user()->type == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}">
                                    <img src="{{ asset('assets/images/svg-icon/dashboard.svg') }}" class="img-fluid"
                                        alt="dashboard">  &nbsp;
                                    <span>{{ __('admin.Dashboard') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.map') }}">
                                    <img src="{{ asset('assets/images/svg-icon/map.svg') }}" class="img-fluid"
                                        alt="widgets"> &nbsp;<span>{{ __('admin.map_view') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.company.index') }}">
                                    <img src="{{ asset('assets/images/svg-icon/company.svg') }}" class="img-fluid"
                                        alt="widgets"> &nbsp;<span>{{ __('admin.companies') }}</span>
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{ route('admin.hajjprocedure.index') }}">-->
                            <!--        <img src="{{ asset('assets/images/svg-icon/widgets.svg') }}" class="img-fluid" alt="widgets"><span>{{ trans('admin.Information') }}</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{ route('admin.notification') }}">
                                    <img src="{{ asset('assets/images/svg-icon/widgets.svg') }}" class="img-fluid"
                                        alt="widgets"> &nbsp; <span
                                         >{{ trans('admin.Notification') }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="javaScript:void();">
                                    <img src="{{ asset('assets/images/svg-icon/request.svg') }}" class="img-fluid"
                                        alt="layouts">  &nbsp; <span
                                         >{{ trans('admin.registration_requests') }}</span><i
                                        class="feather icon-chevron-right pull-right"  ></i>
                                </a>
                                <ul class="vertical-submenu" style="list-style: none; padding: 3px;">
                                    <li style="font-size: 15px; display: flex; align-items: center; justify-content: center; padding: 4px;">
                                        <div>
                                            <a href="{{ route('admin.registrationRequest') }}" style="display: flex; align-items: center;">
                                                <i class="fas fa-paper-plane  text-primary hp-text-color-dark-primary-2" style="margin-right: 4px;"></i>
                                                &nbsp; <span style="color: black;">{{ trans('admin.registration_requests') }}</span>
                                            </a>
                                        </div>
                                    </li>

                                    <li style="font-size: 15px; display: flex; align-items: center; justify-content: center; padding: 4px;">
                                        <div>
                                            <a href="{{ route('admin.registrationRequest.approved') }}" style="display: flex; align-items: center;">
                                                <i class="fas fa-envelope-open text-primary hp-text-color-dark-primary-2" style="margin-right: 4px;"></i>
                                                &nbsp; <span style="color: black;">{{ trans('admin.registration_requests_approved') }}</span>
                                            </a>
                                        </div>
                                    </li>

                                    <li style="font-size: 15px; display: flex; justify-content: center; padding: 4px;">
                                        <div>
                                            <a href="{{ route('admin.registrationRequest.reject') }}" style="display: flex; align-items: center;">
                                                <i class="fas fa-comment-slash text-primary hp-text-color-dark-primary-2" style="margin-right: 4px;"></i>
                                                &nbsp;  <span style="color: black;">
                                                    {{ trans('admin.registration_requests_reject') }}
                                                </span>
                                            </a>
                                        </div>
                                    </li>

                                </ul>
                            </li>

                            <!-- <li>
                            <a href="{{ route('admin.map') }}">
                                <img src="{{ asset('assets/images/svg-icon/widgets.svg') }}" class="img-fluid" alt="widgets"><span>{{ trans('admin.clear_data') }}</span>
                            </a>
                        </li> -->
                        @elseif(Auth::check() && Auth::user()->type == 0)
                            <li>
                                <a href="{{ route('company.home') }}">
                                    <img src="{{ asset('assets/images/svg-icon/dashboard.svg') }}" class="img-fluid"
                                        alt="dashboard"><span>{{ trans('admin.Dashboard') }}</span>
                                </a>

                            </li>

                            <li>
                                <a href="{{ route('company.residence') }}">
                                    <img src="{{ asset('assets/images/svg-icon/residence.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.location') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('company.group') }}">
                                    <img src="{{ asset('assets/images/svg-icon/groups.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.groups') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('company.guide') }}">
                                    <img src="{{ asset('assets/images/svg-icon/guide.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.guides') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('company.user') }}">
                                    <img src="{{ asset('assets/images/svg-icon/users.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.users') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.hajjprocedure.index') }}">
                                    <img src="{{ asset('assets/images/svg-icon/hajj.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.Information') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('company.dua') }}">
                                    <img src="{{ asset('assets/images/svg-icon/dua.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.dua') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('company.survey') }}">
                                    <img src="{{ asset('assets/images/svg-icon/survey.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.survey') }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('company.notification') }}">
                                    <img src="{{ asset('assets/images/svg-icon/widgets.svg') }}" class="img-fluid"
                                        alt="widgets"><span>{{ trans('admin.Notification') }}</span>
                                </a>
                            </li>



                            <!--<li>-->
                            <!--    <a href="{{ route('company.admin') }}">-->
                            <!--        <img src="{{ asset('assets/images/svg-icon/user.svg') }}" class="img-fluid" alt="widgets"><span>{{ trans('admin.admins') }}</span>-->
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
         <div class="rightbar" style="background-color: #f0f3f5;">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="#" class="mobile-logo">
                                {{ __('admin.masar') }}
                                <!-- <img src="{{ asset('assets/images/logo.svg') }}" class="img-fluid" alt="logo"> -->
                            </a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="{{ asset('assets/images/svg-icon/horizontal.svg') }}"
                                                class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="{{ asset('assets/images/svg-icon/verticle.svg') }}"
                                                class="img-fluid menu-hamburger-vertical" alt="verticle">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{ asset('assets/images/svg-icon/collapse.svg') }}"
                                                class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="{{ asset('assets/images/svg-icon/close.svg') }}"
                                                class="img-fluid menu-hamburger-close" alt="close">
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
                                    @if (app()->getLocale() === 'en')
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{ asset('assets/images/svg-icon/collapse.svg') }}"
                                                class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="{{ asset('assets/images/svg-icon/close.svg') }}"
                                                class="img-fluid menu-hamburger-close" alt="close">
                                        </a>
                                    </div>
                                    @endif
                                </li>
                                <li class="list-inline-item">
                                    <div class="searchbar">
                                        <form id="search-form" action="#" method="GET">
                                            <div class="input-group">
                                                <input type="search" class="form-control" style="width: 500px;"
                                                    placeholder="{{ trans('admin.Search') }}"
                                                    aria-label="{{ trans('admin.Search') }}"
                                                    aria-describedby="button-addon2" name="query"
                                                    id="search-input">
                                                <div class="input-group-append">
                                                    {{--  <button class="btn" type="submit" id="button-addon2" style="height: 40px;">
                                                        <img src="{{ asset('assets/images/svg-icon/search.svg') }}" class="img-fluid" alt="search">
                                                    </button>  --}}
                                                </div>
                                            </div>
                                            <div class="autocomplete-suggestions"></div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                @if (Auth::check() && Auth::user()->type == 0)
                                    @php
                                        $notifications = \App\Models\Notification::where('to_id', Auth::id())
                                            ->where('viewed', 0) // Filter by viewed = 0
                                            ->latest('date_created')
                                            ->get();
                                        $totalNotifications = $notifications->count();
                                    @endphp
                                    <li class="list-inline-item">
                                        <div class="notifybar">
                                            <a href="{{ route('company.showNotification') }}"class="infobar-icon">
                                                <img src="{{ asset('assets/images/svg-icon/notifications.svg') }}"
                                                    class="img-fluid" alt="notifications">
                                                <span>{{ $totalNotifications }}</span>
                                                <!-- Display total number of notifications -->
                                            </a>
                                        </div>
                                    </li>
                                @endif
                                <li class="list-inline-item">
                                    <!--   <div class="settingbar">
                                           <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                            {{--  <img src="{{asset('assets/images/svg-icon/settings.svg')}}" class="img-fluid" alt="settings">  --}}
                                            {{--  <a href="{{ route('logout.perform') }}" class="infobar-icon">  --}}
                                            <img src="{{ asset('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout"></a>
                                            </a>
                                      </div> -->
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-secondary dropdown-toggle bg-transparent border-0 p-0"
                                                type="button" id="profileDropdown" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <svg fill="none" height="28" viewBox="0 0 24 24"
                                                    width="30" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8"
                                                        stroke="#374151" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"></path>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="profileDropdown">
                                                <!-- Profile options here -->
                                                <a class="dropdown-item" href="{{ url('profileCompany') }}">View
                                                    Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    href="{{ route('logout.perform') }}">Logout</a>
                                            </div>
                                        </div>

                                </li>

                                <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="languagelink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i
                                                    class="flag flag-icon-{{ session()->get('locale') ? (session()->get('locale') == 'en' ? 'us' : (session()->get('locale') == 'ar' ? 'sa' : session()->get('locale'))) : 'us' }} flag-icon-squared"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right changeLang"
                                                aria-labelledby="languagelink">
                                                @if (count(Helper::getLanguages()) > 0)
                                                    @foreach (Helper::getLanguages() as $language)
                                                        <a class="dropdown-item" href="#"
                                                            data-id="{{ $language->code }}">
                                                            <i
                                                                class="flag flag-icon-{{ $language->code ? ($language->code == 'en' ? 'us' : ($language->code == 'ar' ? 'sa' : $language->code)) : 'us' }} flag-icon-squared"></i>
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
                                <input type="text" class="form-control deleteInput" name="delete"
                                    placeholder="DELETE">
                                <span class="text-danger showError"></span>
                            </div>
                            <button type="button"
                                class="btn btn-success btn-lg btn-block font-18 deleteBtn">Submit</button>
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/vertical-menu.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/chart-bundle.min.js') }}"></script>
    <!-- Piety Chart js -->
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Vector Maps js -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Custom Dashboard Social js -->
    <script src="{{ asset('assets/js/custom/custom-dashboard-social.js') }}"></script>
    <!-- Core js -->
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!-- <script src="{{ asset('assets/js/custom/custom-chart-chartistjs.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom/custom-form-select.js') }}"></script>


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
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ asset('assets/images/dashboard/country.json') }}",
                dataType: 'json',
                success: function(response) {
                    var data = response.country;
                    if (Array.isArray(data)) {
                        var countries = data.map(function(country) {
                            return {
                                id: country.name,
                                text: country.name
                            };
                        });
                        $('#country_name').select2({
                            placeholder: "Select a country",
                            allowClear: true,
                            data: [{
                                id: '',
                                text: ''
                            }].concat(countries)
                        });
                    } else {
                        console.error("Unexpected JSON structure:", data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Could not load country data:", status, error);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (Auth::check() && Auth::user()->type == 1)
            var routeDisplayNames = {
                "/admin/dashboard": "{{ trans('admin.Dashboard') }}",
                "/admin/map/view": "{{ trans('admin.Map View') }}",
                "/admin/company": "{{ trans('admin.Companies List') }}",
                "/admin/company/add": "{{ trans('admin.Add Company') }}",
                "/admin/notification": "{{ trans('admin.Notifications') }}",
                "/admin/registrationRequest": "{{ trans('admin.Registration Requests') }}",
                "/admin/registrationRequest/approved": "{{ trans('admin.Approved Requests') }}",
                "/admin/registrationRequest/reject": "{{ trans('admin.Rejected Requests') }}",
            };
            @elseif(Auth::check() && Auth::user()->type == 0)
            var routeDisplayNames = {
                "/company/dashboard": "{{ trans('admin.Dashboard') }}",
                "/company/residence": "{{ trans('admin.Residence List') }}",
                "company/residence/add": "{{ trans('admin.Residence Add') }}",
                "/company/group": "{{ trans('admin.Group List') }}",
                "/company/group/add" : "{{ trans('admin.Group Add') }}",
                "/company/guide": "{{ trans('admin.Guide List') }}",
                "/company/guide/add": "{{ trans('admin.Guide Add') }}",
                "/company/users": "{{ trans('admin.User List') }}",
                "/company/user/add": "{{ trans('admin.User Add') }}",
                "/company/hajjprocedure": "{{ trans('admin.Hajj Procedure List') }}",
                "/company/hajjprocedure/add": "{{ trans('admin.Hajj Procedure Add') }}",
                "/company/dua": "{{ trans('admin.Dua List') }}",
                "/company/dua/add": "{{ trans('admin.Dua Add') }}",
                "/company/survey": "{{ trans('admin.Survey List') }}",
                "/company/survey/add": "{{ trans('admin.Survey Add') }}",
                "/company/notification": "{{ trans('admin.Notification') }}",
            };
            @endif

            function updateRouteSuggestions(inputValue) {
                var suggestionsList = $(".autocomplete-suggestions");
                suggestionsList.empty();

                Object.keys(routeDisplayNames).forEach(function(route) {
                    if (route.toLowerCase().includes(inputValue.toLowerCase())) {
                        var routeLink = $("<a>", {
                            href: route,
                            class: "autocomplete-suggestion text-black-100 d-block",
                            style: "color: #848487;",
                            target: "_self",
                            text: routeDisplayNames[route]
                        });

                        suggestionsList.append(routeLink);
                    }
                });
            }

            $("#search-form").submit(function(event) {
                event.preventDefault();
                var inputValue = $("#search-input").val();
                updateRouteSuggestions(inputValue);
            });

            $("#search-input").on("input", function() {
                var inputValue = $(this).val();
                updateRouteSuggestions(inputValue);
            });

            $(document).click(function(event) {
                if (!$(event.target).closest('.searchbar').length) {
                    $(".autocomplete-suggestions").empty();
                }
            });
        });
    </script>
    <style>
        .autocomplete-suggestions {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
    <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var selectedLanguage = "{{ session()->get('locale') }}";
                    var topbars = document.getElementsByClassName("topbar");
                    var rightbars = document.getElementsByClassName("rightbar");

                    function setBodyDirection() {
                        var body = document.querySelector('body');
                        if (selectedLanguage === 'ar') {
                            body.classList.remove('ltr');
                            body.classList.add('rtl');
                        } else {
                            body.classList.remove('rtl');
                            body.classList.add('ltr');
                        }
                    }
                     function styleRightbars() {
                        if (selectedLanguage === 'ar') {
                            for (var i = 0; i < rightbars.length; i++) {
                                rightbars[i].style.margin = "0 15.5rem 0 2rem";
                                rightbars[i].style.marginLeft = "0";
                            }
                        }
                    }
                     function styleTopbars() {
                        if (selectedLanguage === 'ar') {
                            for (var i = 0; i < topbars.length; i++) {
                                topbars[i].style.margin = "0 0rem 0 2rem";
                            }
                        }
                    }

                    setBodyDirection();
                    styleRightbars();
                    styleTopbars();
                    });
    </script>
    @include('layouts.notification')
    <!-- End js -->
</body>
</html>
