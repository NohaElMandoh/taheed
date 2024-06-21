<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Taheed admin panel</title>
    <meta name="description" content="nozha admin panel fully support rtl with complete dark mode css to use. ">
    <meta name=”robots” content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('admin/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('admin/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css')}}">
    <link href="{{ asset('admin/css/fontawsome/all.min.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/main.css')}}">
    <!-- Include DataTables CSS and JS -->
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

</head>
<body class="rtl persianumber">

    <div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
        <header class="bmd-layout-header ">
            <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
                <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
                    data-toggle="drawer" data-target="#dw-s1">
                    <span class="navbar-toggler-icon"></span>
                    <!-- <i class="material-Animation">menu</i> -->
                </button>
                <ul class="nav navbar-nav p-0">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle  m-0" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-envelope fa-lg"></i><span
                                    class="badge badge-pill badge-danger animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                            </button>
                            <div aria-labelledby="dropdownMenu2"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                                <span class="dropdown-item dropdown-header">15 رسائل</span>
                                <div class="dropdown-divider"></div>
                               
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell  fa-lg "></i><span
                                    class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                            </button>
                            <div aria-labelledby="dropdownMenu2"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                                <span class="dropdown-item dropdown-header persianumber">15 منشورات</span>
                               
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"> <img src="{{ asset('admin/img/user-profile.jpg')}}" alt="..."
                            class="rounded-circle screen-user-profile"></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </button>
                            <div aria-labelledby="dropdownMenu4"
                                class="dropdown-menu  pl-3 dropdown-menu-right dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenu2">
                              
                            
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i
                                     class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              
                            </div>
                        </div>
                    </li>




                </ul>
            </div>
        </header>
        <div id="dw-s1" class="bmd-layout-drawer bg-faded ">

            <div class="container-fluid side-bar-container ">
                <header class="pb-0">
                    <a class="navbar-brand ">
                       {{-- <object class="side-logo" data="{{ asset('admin/svg/logo-8.svg')}}" type="image/svg+xml">
                        </object>--}}
                        <h1>Taheed</h1>
                    </a>
                </header>
                <p class="side-comment  fnt-mxs"></p>
                <li class="side a-collapse short m-2 pr-1 pl-1">
                    <a href="{{route('admin.dashboard')}}" class="side-item selected c-dark "><i class="fas fa-language  mr-1"></i>الرئيسية </a>
                </li>
                <li class="side a-collapse short m-2 pr-1 pl-1">
                    <a href="{{route('users.index')}}" class="side-item selected c-dark "><i class="fas fa-language  mr-1"></i>العملاء </a>
                </li>
                <li class="side a-collapse short m-2 pr-1 pl-1">
                    <a href="{{route('motorcycles.index')}}" class="side-item selected c-dark "><i class="fas fa-language  mr-1"></i>الدراجات النارية </a>
                </li>    
                 <li class="side a-collapse short m-2 pr-1 pl-1">
                    <a href="{{route('admin.dashboard')}}" class="side-item selected c-dark "><i class="fas fa-language  mr-1"></i>اعدادات </a>
                </li>
            </div>

        </div>
        <main class="bmd-layout-content">
            <div class="container-fluid ">

                <!-- content -->
              
               
                <!-- widget -->
                @yield('content')
       
            </div>
        </main>
    </div>

    </div>



    <script src="{{ asset('admin/js/vendor/modernizr.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')
    </script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{ asset('admin/js/persianumber.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('body').bootstrapMaterialDesign();
            $('.persianumber').persiaNumber();

        });
    </script>
    <script>
        ! function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>