<!DOCTYPE html>
<html>

<head>
    <!--title-->
    <title>EMS</title>
    <!--meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap css-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--font awesome-->
    <link rel="stylesheet" href="FAIcon/css/all.css">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="css/admin(mcustom).css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 plane_side text-white text-center">
                <img src="images/icon-admin.jpg" alt="admin logo" />
                <h3>Login</h3>
                <h4></h4>
            </div>

            <div class="col-sm-6 m-auto">
                <form class="form_admin_login mt-4" id="form_admin_login" action="/loginMatch" method="POST">
                    @csrf
                    <!--User ID-->
                    <div>
                        <label for="email" class="font-weight-bold mb-1">User ID:</label>
                        <input type="text" class="form-control mb-1" placeholder="Enter the User Id" id="email"
                            name="email" autocomplete="off">
                    </div>
                    <!--Password-->
                    <div>
                        <label for="password" class="font-weight-bold mt-2 mb-1">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter the Password" id="password"
                            name="password" autocomplete="off">
                    </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="row">
                        <div class="col-10 link mt-2 mb-2" style="";>
                            <a href="{{ url('forget_password') }}">Forget Password?</a>
                        </div>
                        <div class="col-2 link mt-2 mb-2" style="float-end";>
                            <a href="{{ route('signup_form') }}">Signup</a>
                        </div>
                    </div>
                    <!--button-->
                    <div class="text-center mt-2">
                        <button type="submit" name="login" id="btn_admin_login">Login</button>
                        <button type="button" id="btn_cancel">Cancel</button>
                    </div>

                </form> <!--form end-->
            </div>

        </div> <!--row end-->
    </div> <!--container end-->


</body>

</html>
