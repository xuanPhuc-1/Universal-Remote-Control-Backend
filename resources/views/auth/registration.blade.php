<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/backend/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/backend/css/animate.css" rel="stylesheet">
    <link href="/backend/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <div class="error-message">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <style>
        .error-box {
            position: fixed;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2dede;
            border: 1px solid #a94442;
            color: #a94442;
            padding: 15px;
            border-radius: 4px;
        }

        .error-message {
            margin-bottom: 5px;
        }
    </style>


    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to our system</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action={{ route('admin.registerPost') }} method="POST">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" class="form-control" placeholder="Name" required=""
                        name="name">
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" placeholder="Email" required=""
                        name='email'>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                {{-- submit if user check the check box --}}
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="/admin">Login</a>
            </form>
            <div class="row">
                <div class="col-md-6">
                    IOT
                </div>
                <div class="col-md-6 text-right">
                    <small>©2023</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

</body>

</html>
