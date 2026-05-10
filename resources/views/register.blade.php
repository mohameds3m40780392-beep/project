<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    <div class="login-container">
        <form action="{{ route('register.post') }}" method="POST" class="login-form">
            @csrf
            <h2>إنشاء حساب</h2>
            <p>انضم إلينا اليوم!</p>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 10px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Name" required value="{{ old('name') }}">
            </div>

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="******" required>
            </div>

            <div class="input-group">
                <i class="fas fa-check-double"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="login-btn">إنشاء الحساب</button>

            <div class="footer-links">
                لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل دخولك</a>
            </div>
        </form>
    </div>
</body>
</html>
