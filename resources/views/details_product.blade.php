<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تفاصيل المنتج - BuyBye</title>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
</head>
<body>

<div class="container">
    <!-- رسالة النجاح خارج الـ wrapper لكي لا تؤثر على توزيع العناصر -->
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; text-align: center; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <div class="product-wrapper">
        <!-- الجزء الأيسر: الصور (يبقى كما هو تماماً) -->
        <div class="product-gallery">
            <div class="main-image">
                <img id="current-img" src="{{ asset($product->img) }}" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- الجزء الأيمن: التفاصيل (هنا التعديل لضمان بقاء التصميم) -->
        <div class="product-details">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <h1 id="p-name">{{ $product->name }}</h1>
                <div class="rating">⭐⭐⭐⭐⭐ (2 Customers Reviews)</div>

                <div class="price-section">
                    <span class="price">{{ $product->price }} EGP</span>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="variation-group">
                    <label>Color:</label>
                    <select name="color" id="color-select">
                        <option value="Dark Green">Dark Green</option>
                        <option value="Phantom Black">Phantom Black</option>
                    </select>
                </div>

                <div class="variation-group">
                    <label>Memory Size:</label>
                    <select name="memory">
                        <option value="64 GB">64 GB</option>
                        <option value="128 GB">128 GB</option>
                    </select>
                </div>

                <div class="variation-group">
                    <label>Battery:</label>
                    <select name="battery">
                        <option value="5000 mAh">5000 mAh</option>
                    </select>
                </div>

                <p class="stock-status">Availability: <span>In-stock</span></p>

                <div class="purchase-section">
                    <div class="quantity-control">
                        <!-- أضفنا type="button" لكي لا يرسل الفورم عند الضغط عليه -->
                        <button type="button" onclick="changeQty(-1)">-</button>
                        <input type="number" name="quantity" id="qty" value="1" min="1">
                        <button type="button" onclick="changeQty(1)">+</button>
                    </div>
                    <!-- الزر الآن نوعه submit ليرسل البيانات -->
                    @if(@auth()->check())
                    <button type="submit" class="add-to-cart">Add to Cart</button>
                    @else
                    <a href="{{ route('login') }}" class="add-to-cart">Add to Cart</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/details.js"></script>

</body>
</html>
