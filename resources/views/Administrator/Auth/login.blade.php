<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body class="d-flex justify-content-center align-items-center">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Sign in</h3>
                    <form method="post">
                        @csrf
                    <div class="form-outline mb-4">
                        <input type="text" name="form[admin_login]" class="form-control form-control-lg" />
                        <label class="form-label">Login</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="form[admin_password]" class="form-control form-control-lg" />
                        <label class="form-label">Password</label>
                    </div>

                        <div class="form-outline mb-4">
                            <input type="checkbox" name="form[admin_remember_me" class="form-control form-control-lg" />
                            <label class="form-label">Remember me</label>
                        </div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
