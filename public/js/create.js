const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('pImg');
const imgPreview = document.getElementById('imgPreview');
const uploadText = document.getElementById('uploadText');

// فتح اختيار الملفات عند الضغط على المربع
dropZone.addEventListener('click', () => fileInput.click());

// عرض الصورة فور اختيارها
fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
            imgPreview.classList.remove('hidden');
            uploadText.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});

// التعامل مع إرسال الفورم
document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const productData = {
        name: document.getElementById('pName').value,
        price: document.getElementById('pPrice').value,
        image: imgPreview.src
    };

    console.log("تم حفظ المنتج:", productData);
    alert("تم حفظ المنتج بنجاح (راجع الكونسول)!");
});
