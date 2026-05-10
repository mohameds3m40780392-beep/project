<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart - BuyBye Style</title>
    <link rel="stylesheet" href="{{ asset('css/purchases.css') }}">
</head>
<body>

<div class="container">
    <!-- جدول السلة -->
    <div class="cart-section">
        <h2>Shopping Cart</h2>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ $item->img }}" alt="{{ $item->name }}" class="product-img">
                    </td>

                    <td>{{ $item->name }}</td>

                    <td>EGP {{ $item->price }}</td>

                    <td>
                        {{ $item->quantity }}
                    </td>

                    <td>
                        EGP {{ $item->price * $item->quantity }}
                    </td>

                    <td>
                        <form action="{{ route('cart.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                            <button class="action-btn">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">السلة فاضية</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ملخص الفاتورة -->
    <div class="summary-section">
        <h2>Cart Totals</h2>

        <div class="summary-row">
            <span>Sub Total</span>
            <span>EGP {{ $total }}</span>
        </div>

        <div class="summary-row">
            <span>Additional Discount</span>
            <span class="discount-text">-EGP 0.00</span>
        </div>

        <div class="summary-row">
            <span>Delivery Charges</span>
            <span class="free-text">0.00 (Free)</span>
        </div>

        <div class="summary-row">
            <span>Tax</span>
            <span>+EGP 0.00</span>
        </div>

        <hr>

        <div class="summary-row">
            <strong>Total Bill</strong>
            <strong>EGP {{ $total }}</strong>
        </div>

        <a href="/" class="btn btn-continue">
            ⬅ Continue Shopping
        </a>

        <button class="btn btn-checkout">
            Check out ➡
        </button>
    </div>
</div>

</body>
</html>
