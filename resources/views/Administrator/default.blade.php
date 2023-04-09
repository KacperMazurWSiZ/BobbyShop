<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>{{config("admin.appTitle", "title")}}</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

    <style>
        #loader {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000;
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        .active{
            font-weight: bold;
        }

        @-webkit-keyframes sk-scaleout {
            0% { -webkit-transform: scale(0) }
            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 100% {
                  -webkit-transform: scale(1.0);
                  transform: scale(1.0);
                  opacity: 0;
              }
        }
    </style>
    <script defer="defer" src="{{ asset('js/adminator.js') }}"></script>
    <link href="{{ asset('css/adminator.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themifyicons.css') }}" rel="stylesheet">
</head>
<body class="app">






<div id="loader">
    <div class="spinner"></div>
</div>

<script>
    window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>



<div>
    <!-- #Left Sidebar ==================== -->
    <div class="sidebar">
        <div class="sidebar-inner">
            <!-- ### $Sidebar Header ### -->
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="{{ route('admin.index') }}">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="assets/static/images/logo.png" alt="">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">{{config("admin.appTitle", "title")}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ### $Sidebar Menu ### -->
            <ul class="sidebar-menu scrollable pos-r">
                @include("administrator.navigation")
            </ul>
        </div>
    </div>

    <!-- #Main ============================ -->
    <div class="page-container">
        <!-- ### $Topbar ### -->
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li>
                        <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="notifications dropdown">
                        <span class="counter bgc-red">3</span>
                        <a href="" class="dropdown-toggle no-after" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti-bell"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li class="pX-20 pY-15 bdB">
                                <i class="ti-bell pR-10"></i>
                                <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                            </li>
                            <li>
                                <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                    <li>
                                        <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                            <span>
                              <span class="fw-500">Admin</span>
                              <span class="c-grey-600">liked your <span class="text-dark">post</span>
                              </span>
                            </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">5 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/2.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                            <span>
                              <span class="fw-500">Moo Doe</span>
                              <span class="c-grey-600">liked your <span class="text-dark">cover image</span>
                              </span>
                            </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">7 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15">
                                                <img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                                            </div>
                                            <div class="peer peer-greed">
                            <span>
                              <span class="fw-500">Lee Doe</span>
                              <span class="c-grey-600">commented on your <span class="text-dark">video</span>
                              </span>
                            </span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">10 mins ago</small>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pX-20 pY-15 ta-c bdT">
                    <span>
                      <a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a>
                    </span>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-bs-toggle="dropdown">
                            <div class="peer mR-10">
                                <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
                            </div>
                            <div class="peer">
                                <span class="fsz-sm c-grey-900">Admin</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">
                            <li>
                                <a href="{{route('admin.logout')}}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                    <i class="ti-power-off mR-10"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
            <div id="mainContent">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('danger') }}
                    </div>
                @endif
                @yield("content")
            </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>Copyright © 2023 Kacper Mazur</a>. All rights reserved.</span>
        </footer>
    </div>
</div>
</body>
</html>
