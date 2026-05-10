// مصفوفة صور لكل لون (محاكاة لما في الفيديو)
const colorImages = {
    "Dark Green": "https://media-amazon.com",
    "Phantom Black": "https://media-amazon.com"
};

// تغيير الصورة عند تغيير اللون
document.getElementById('color-select').addEventListener('change', function() {
    const selectedColor = this.value;
    document.getElementById('current-img').src = colorImages[selectedColor];
});

// التحكم في كمية المنتج
function changeQty(amount) {
    const qtyInput = document.getElementById('qty');
    let currentVal = parseInt(qtyInput.value);
    if (currentVal + amount >= 1) {
        qtyInput.value = currentVal + amount;
    }
}

// رسالة عند الإضافة للسلة
document.querySelector('.add-to-cart').onclick = () => {
    alert("تمت إضافة المنتج بنجاح إلى السلة!");
};
