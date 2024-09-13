<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Catering</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your app's CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome to Marketplace Catering</h1>

        <div class="register-section">
            <h2>Register</h2>
            <a href="{{ route('customer.register') }}" class="btn btn-primary">Register as Customer</a>
            <a href="{{ route('merchant.register') }}" class="btn btn-primary">Register as Merchant</a>
        </div>

        <hr>

        <div class="login-section">
            <h2>Login</h2>
            <div class="row">
                <!-- Customer Login Form -->
                <div class="col-md-6">
                    <h3>Login as Customer</h3>
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="customer-email">Email</label>
                            <input id="customer-email" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="customer-password">Password</label>
                            <input id="customer-password" type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login as Customer</button>
                    </form>
                </div>

                <!-- Merchant Login Form -->
                <div class="col-md-6">
                    <h3>Login as Merchant</h3>
                    <form method="POST" action="{{ route('merchant.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="merchant-email">Email</label>
                            <input id="merchant-email" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="merchant-password">Password</label>
                            <input id="merchant-password" type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Login as Merchant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Link to your app's JS file -->
</body>
</html>
