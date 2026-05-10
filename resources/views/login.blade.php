<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard🎛</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-page">
    <div class="logo-container">
        <img src="img/image copy.png" alt="Buy Bye Logo" class="main-logo">
    </div>

    <div class="login-card">
        <h2>Login</h2>
        <form action="{{ route('login.post') }}" method="post">
            @csrf
            <div class="input-group">
                <span class="icon">📧</span>
                <input type="email" placeholder="name@example.com" name="email">
            </div>

            <div class="input-group">
                <span class="icon">🔒</span>
                <input type="password" placeholder="Password" name="password">
            </div>

            <div class="extra-options">
                <label><input type="checkbox"> Remember me?</label>
                <a href="#" class="forgot-pwd">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">Log in</button>
            <hr>
        </form>

        <div class="footer-links">
            <p>Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
            <p class="social-text">Login with Social</p>
            <div class="social-icons">
                <button class="social-btn facebook"><a href="{{route('google.redirect')}}" class="social-icon"><img src="img/Google.png" alt="Google" class="Google_icon"></a>
</button>
                <button class="social-btn google"><a href="#" class="social-icon"><img src="img/Facebook.png" alt="Facebook" class="Facebook_icon"></a></button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
