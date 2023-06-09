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
    <script defer="defer" src="main.js"></script><link href="{{ asset('css/adminator.css') }}" rel="stylesheet"></head>
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
<div class="peers ai-s fxw-nw h-100vh">

    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("{{ asset('images/background_image.jpg') }}")'>
        <div class="pos-a centerXY">
            <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
                <img class="pos-a centerXY" src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width: 320px;">
        @if ($errors->any())
            <div class="alert-danger alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
        @endif
        <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label class="text-normal text-dark form-label">Login</label>
                <input type="text" class="form-control" name="form[admin_login]" placeholder="Login">
            </div>
            <div class="mb-3">
                <label class="text-normal text-dark form-label">Password</label>
                <input type="password" class="form-control" name="form[admin_password]" placeholder="Password">
            </div>
            <div class="">
                    <div class="peer">
                        <button class="btn btn-primary btn-color">Login</button>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>
