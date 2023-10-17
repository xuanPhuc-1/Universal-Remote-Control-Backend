<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Universal IR Remote Control System</h2>

                <p>
                    Đây là Project vô cùng tâm huyết của chúng tôi.
                </p>

                <p>
                    Chúng tôi đã quên ăn, quên ngủ để hoàn thành nó.
                </p>

                <p>
                    Toàn bộ kiến thức để hoàn thiện dự án này đều không thuộc phạm trù ngành học của chúng tôi.
                    Vậy nên dự án còn nhiều điểm thiếu sót.
                </p>

                <p>
                    <small>Mọi sự góp ý xin liên hệ Mr. Phuc: </small>
                    <a href="https://www.google.com/intl/vi/gmail/about/" class="link">20021568@vnu.edu.com</a>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action={{ route('admin.loginPost') }} method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Username" required=""
                                name = "email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required=""
                                name= "password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="admin/register">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
                <small>©2023</small>
            </div>
        </div>
    </div>

</body>

</html>
