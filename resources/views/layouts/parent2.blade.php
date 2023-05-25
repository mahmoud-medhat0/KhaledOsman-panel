<html lang="en" ml-update="aware">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="icon" href="{{ asset('img/mini_logo1.png')}}') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/themefy_icon/themify-icons.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/niceselect/css/nice-select.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/gijgo/gijgo.min.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/font_awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/tagsinput.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/datepicker/date-picker.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/vectormap-home/vectormap-2.0.2.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/scroll/scrollable.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/buttons.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/text_editor/summernote-bs4.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/morris/morris.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/material_icon/material-icons.css')}}">

    <link rel="stylesheet" href="{{ asset('css/metisMenu.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/colors/default.css')}}" id="colorSkinCSS">
</head>

<body class="crm_body_bg"
    bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJkaXNhYmxlZCIsIkZBQ0VCT09LIjoiZGlzYWJsZWQiLCJUV0lUVEVSIjoiZGlzYWJsZWQiLCJSRURESVQiOiJkaXNhYmxlZCJ9LCJ2ZXJzaW9uIjoiMS45LjAiLCJzY29yZSI6MTA5MDB9XQ==">

    <nav class="@if (session()->has('theme'))
        {{ session()->get('theme') }}
        @else
        sidebar
    @endif">
        <div class="logo d-flex justify-content-between" bis_skin_checked="1">
            <a class="large_logo" href="{{ route('home') }}"><img src="{{ asset('img/logo1.png')}}" alt=""></a>
            <a class="small_logo" href="{{ route('home') }}"><img src="{{ asset('img/mini_logo1.png')}}" alt=""></a>
            <div class="sidebar_close_icon d-lg-none" bis_skin_checked="1">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu" class="metismenu">
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small" bis_skin_checked="1">
                        <img src="{{ asset('img/menu-icon/4.svg') }}" alt="">
                    </div>
                    <div class="nav_title" bis_skin_checked="1">
                        <span>Admins</span>
                    </div>
                </a>
                <ul class="mm-collapse">
                    <li><a href="{{ route('adminlist') }}">Admin List</a></li>
                    <li><a href="{{ route('adminadd') }}">Add New Admin</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small" bis_skin_checked="1">
                        <img src="{{ asset('img/menu-icon/dashboard.svg')}}" alt="">
                    </div>
                    <div class="nav_title" bis_skin_checked="1">
                        <span>User Management </span>
                    </div>
                </a>
                <ul class="mm-collapse" style="height: 5px;">
                    <li><a href="{{ route('themelight') }}" class="active">Default</a></li>
                    <li><a href="{{ route('themedark') }}">Dark Sidebar</a></li>
                    <li><a href="{{ route('themelight') }}">Light Sidebar</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small" bis_skin_checked="1">
                        <img src="{{ asset('img/menu-icon/5.svg')}}" alt="">
                    </div>
                    <div class="nav_title" bis_skin_checked="1">
                        <span>students</span>
                    </div>
                </a>
                <ul class="mm-collapse">
                    <li><a href="{{ route('student.index') }}">students List</a></li>
                    <li><a href="{{ route('student.create') }}">Add New student</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small" bis_skin_checked="1">
                        <img src="{{ asset('img/attendance-icon.svg')}}" alt="">
                    </div>
                    <div class="nav_title" bis_skin_checked="1">
                        <span>lessons</span>
                    </div>
                </a>
                <ul class="mm-collapse">
                    <li><a href="{{ route('lesson.show') }}">all lessons</a></li>
                    <li><a href="{{ route('lesson.create') }}"> New lesson</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small" bis_skin_checked="1">
                        <img src="{{ asset('img/documents-svgrepo-com.svg')}}" alt="">
                    </div>
                    <div class="nav_title" bis_skin_checked="1">
                        <span>codes</span>
                    </div>
                </a>
                <ul class="mm-collapse">
                    <li><a href="{{ route('codes.index') }}">all codes</a></li>
                    <li><a href="{{ route('codes.create') }}">create New code</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-lg-12 p-0 " bis_skin_checked="1">
                    <div class="header_iner d-flex justify-content-between align-items-center" bis_skin_checked="1">
                        <div class="sidebar_icon d-lg-none" bis_skin_checked="1">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="line_icon open_miniSide d-none d-lg-block" bis_skin_checked="1">
                            <img src="{{ asset('img/line_img.png')}}" alt="">
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center"
                            bis_skin_checked="1">
                            <div class="profile_info" bis_skin_checked="1">
                                <img src="{{ asset('img/client_img1.png')}}" alt="">
                                <div class="profile_info_iner" bis_skin_checked="1">
                                    <div class="profile_author_name" bis_skin_checked="1">
                                        <h5>{{ Auth::guard('web')->user()->name }} </h5>
                                    </div>
                                    <div class="profile_info_details" bis_skin_checked="1">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="form-control" type="submit">Logout</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner overly_inner " bis_skin_checked="1">
            <div class="container-fluid p-0 " bis_skin_checked="1">

                <div class="row" bis_skin_checked="1">
                    <div class="col-12" bis_skin_checked="1">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between"
                            bis_skin_checked="1">
                            <div class="page_title_left d-flex align-items-center" bis_skin_checked="1">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                            <div class="page_title_right" bis_skin_checked="1">
                                <div class="page_date_button d-flex align-items-center" bis_skin_checked="1">
                                    <img src="{{ asset('img/icon/calender_icon.svg')}}" alt=""> {{ date('Y-m-d') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row " bis_skin_checked="1">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="footer_part" bis_skin_checked="1">
            <div class="container-fluid" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-lg-12" bis_skin_checked="1">
                        <div class="footer_iner text-center" bis_skin_checked="1">
                            <p>{{ date('Y') }} © Influence - Designed by
                                <a href="https://www.fb.com/7akemel3alam"> Mahmoud Medhat</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="back-top" style="display: none;" bis_skin_checked="1">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
    <script src="{{ asset('js/jquery1-3.4.1.min.js')}}"></script>

    <script src="{{ asset('js/popper1.min.js')}}"></script>

    <script src="{{ asset('js/bootstrap1.min.js')}}"></script>

    <script src="{{ asset('js/metisMenu.js')}}"></script>

    <script src="{{ asset('vendors/count_up/jquery.waypoints.min.js')}}"></script>

    <script src="{{ asset('vendors/chartlist/Chart.min.js')}}"></script>

    <script src="{{ asset('vendors/count_up/jquery.counterup.min.js')}}"></script>

    <script src="{{ asset('vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

    {{-- <script src="{{ asset('vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datepicker/datepicker.js')}}"></script>
    <script src="{{ asset('vendors/datepicker/datepicker.en.js')}}"></script>
    <script src="{{ asset('vendors/datepicker/datepicker.custom.js')}}"></script> --}}
    <script src="{{ asset('js/chart.min.js')}}"></script>
    <script src="{{ asset('vendors/chartjs/roundedBar.min.js')}}"></script>

    <script src="{{ asset('vendors/progressbar/jquery.barfiller.js')}}"></script>

    <script src="{{ asset('vendors/tagsinput/tagsinput.js')}}"></script>

    <script src="{{ asset('vendors/text_editor/summernote-bs4.js')}}"></script>
    <script src="{{ asset('vendors/am_chart/amcharts.js')}}"></script>

    <script src="{{ asset('vendors/scroll/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('vendors/scroll/scrollable-custom.js')}}"></script>

    {{-- <script src="{{ asset('vendors/apex_chart/apex-chart2.js')}}"></script> --}}
    {{-- <script src="{{ asset('vendors/apex_chart/apex_dashboard.js')}}"></script> --}}

    <script src="{{ asset('vendors/chart_am/core.js')}}"></script>
    <script src="{{ asset('vendors/chart_am/charts.js')}}"></script>
    <script src="{{ asset('vendors/chart_am/animated.js')}}"></script>
    <script src="{{ asset('vendors/chart_am/kelly.js')}}"></script>
    <script src="{{ asset('vendors/chart_am/chart-custom.js')}}"></script>

    {{-- <script src="{{ asset('js/dashboard_init.js')}}"></script> --}}
    <script src="{{ asset('js/custom.js')}}"></script>
    @yield('js')
    <svg id="SvgjsSvg1148" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1149"></defs>
        <polyline id="SvgjsPolyline1150" points="0,0"></polyline>
        <path id="SvgjsPath1151"
            d="M-1 270L-1 270C-1 270 57.199999999999996 270 57.199999999999996 270C57.199999999999996 270 114.39999999999999 270 114.39999999999999 270C114.39999999999999 270 171.6 270 171.6 270C171.6 270 228.79999999999998 270 228.79999999999998 270C228.79999999999998 270 286 270 286 270C286 270 286 270 286 270 ">
        </path>
    </svg>
</body>

</html>
