<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap css-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>SignUp</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form class="border  mt-5 " action="{{ route('registerSave') }}" method="post">
            @csrf
            <h2 class="mt-2 mb-2" style="border-bottom:1px solid black";>SignUp-Form</h2>
            <div class="form-group">
                <label class="mt-2 mb-2">First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
            </div>
            <div class="form-group">
                <label class="mt-2 mb-2">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
            </div>
            <div class="form-group">
                <label class="mt-2 mb-2">Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label class="mt-2 mb-2">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>

            <div class="form-group">
                <label class="mt-2 mb-2">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirmation Password"
                    name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>

</html>
