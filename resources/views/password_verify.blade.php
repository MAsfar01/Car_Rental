<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .otp-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            margin-right: 0.5rem;
        }
        .otp-input:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .card {
            border: none;
            border-radius: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Enter OTP</h4>
                        <p class="text-muted text-center mb-4">Check your email for the OTP.</p>
                        <form action="{{ url('/verify_otp') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="d-flex justify-content-center mb-3">

                                <input type="text" class="otp-input form-control" id="otp1" name="otp1" maxlength="1">
                                <input type="text" class="otp-input form-control" id="otp2" name="otp2" maxlength="1">
                                <input type="text" class="otp-input form-control" id="otp3" name="otp3" maxlength="1">
                                <input type="text" class="otp-input form-control" id="otp4" name="otp4" maxlength="1">
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
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Verify OTP</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS for OTP input focus -->
    <script>
        document.querySelectorAll('.otp-input').forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < 3) {
                    e.target.nextElementSibling.focus();
                }
            });
        });
    </script>
</body>
</html>
