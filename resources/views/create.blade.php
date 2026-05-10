<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة منتج جديد</title>
    <link rel="stylesheet" href="css/create.css">
</head>
<body>
    <div class="container">
    <div class="form-card">
        <h2>إضافة منتج جديد 🛍️</h2>
        <!-- فورم واحد فقط مع خاصية رفع الصور -->
        <form action="{{ route('products.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label>اسم المنتج</label>
                <input type="text" name="name" id="pName" placeholder="مثلاً: LG TV 55 Inch" required>
            </div>

            <div class="input-group">
                <label>السعر (ج.م)</label>
                <input type="number" name="price" id="pPrice" placeholder="0.00" required>
            </div>

            <div class="input-group">
                <label>صورة المنتج</label>
                <div class="upload-box" id="dropZone">
                    <!-- اسم الحقل img لازم يكون موجود هنا -->
                    <input type="file" name="img" id="pImg" accept="image/*" hidden required>
                    <p id="uploadText">اضغط هنا أو اسحب الصورة</p>
                    <img id="imgPreview" src="" alt="Preview" class="hidden">
                </div>
            </div>

            <button type="submit" class="submit-btn">حفظ المنتج</button>
        </form>
    </div>
</div>

    <script src="js/create.js"></script>
</body>
</html>

