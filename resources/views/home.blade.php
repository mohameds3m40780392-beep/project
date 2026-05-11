<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <title>Home - BuyBye</title>
</head>
<body>
    <div class="tape">
    <div class="logo">
        <img src="img/image.png" alt="BuyBye Logo">
    </div>

    <div class="search-container">
        <input type="search" name="search" id="search" placeholder="Search for Products...">
        <i class="search-icon">🔍</i>
    </div>

    <div class="nav-links">
        <a href="#" class="sell-btn">Sell on BuyBye!</a>
        <div class="icons-group">
            <img src="img/icon-icons (5).png" alt="moon" class="icon">
            @if(Auth::check())
            <a href="{{ route('cart.index') }}">
                <img src="img/icon-icons (6).png" alt="cart" class="icon">
            </a>@else
            <a href="{{ route('login') }}">
                <img src="img/icon-icons (6).png" alt="cart" class="icon">
            </a>
            @endif
        </div>
    </div>

    @if(Auth::check())
        <a href="#" class="sign-in-btnn">
            <img class="profile" src="img/Prompt✨.jfif" alt="profile">
        </a>
    @else
        <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a>
    @endif
</div>

    <main class="hero-section">
        <div class="hero-content">
            <h1 class="typing-container">
            <span id="typing-text">BuyBye...</span><span class="cursor">|</span>
            </h1>
            <h2>سوقك الأمثل للبيع والشراء!</h2>
            <p>استمتع بأفضل ما في العالمين، نوفر لك فرصة فريدة للتعامل بسلاسة كبائع ومشتري.</p>
            <button class="btn-start">ابدأ الآن</button>
        </div>

    <div class="product-card">
        <span class="badge">⭐ منتجات مميزة ⭐</span>
        <img id="product-img" src="img/LG 22inch monitor.jfif" alt="LG TV">
        <h3 id="product-name">LG TV</h3>
        <p class="stars">⭐⭐⭐⭐</p>
        <p id="product-price" class="price">20,000.00 ج.م</p>
    </div>

    </main>

    <div class="container">
    <!-- القائمة الجانبية -->
    <aside class="sidebar">
        <div class="filter-group">
            <h3>Categories</h3>
            <ul>
                <li>> TVs</li>
                <li>> Fashion</li>
                <li>> Mobiles</li>
            </ul>
        </div>

        <div class="filter-group">
    <h3>Price Range</h3>
    <form action="{{ url('/home') }}" method="GET" id="filterForm">
        <label>
            <input type="radio" name="price_range" value="0-500" onchange="this.form.submit()">
            Upto EGP 500
        </label>
        <label>
            <input type="radio" name="price_range" value="500-1000" onchange="this.form.submit()">
            EGP 500 - 1000
        </label>
        <label>
            <input type="radio" name="price_range" value="1000-5000" onchange="this.form.submit()">
            Over 1000
        </label>
        <br>
        <a href="{{ url('/home') }}" style="font-size: 12px; color: red;">Reset Filter</a>
    </form>
</div>

    </aside>

    <!-- عرض المنتجات -->
    <section class="products-area">
        <div class="top-bar">
            <div class="view-icons">▦ ▤</div>
        </div>

    <div class="product-grid">
        @foreach ($products as $product)
        <!-- أضفنا رابط حول الكارت بالكامل ومررنا الـ ID -->
        <a href="{{ url('/product/' . $product->id) }}" class="product-card">
            <div class="card-content">
                <div class="img-container purple-bg">
                    <img src="{{ asset($product->img) }}" alt="{{ $product->name }}">

                </div>
                <h4>{{ $product->name }}</h4>
                <p class="no-reviews">No Reviews Yet</p>
                <p class="price">EGP {{ $product->price }}K</p>

            </div>
        </a>
        @endforeach
    </div>

    </section>
</div>
<script src="js/home.js"></script>
</body>
</html>
