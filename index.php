<?php
include 'db_connection.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // الحصول على بيانات المدخلات من النموذج
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $image_url = $_POST['image_url']; // الحصول على رابط الصورة من المدخلات

    // استعلام لإدخال بيانات العقار في قاعدة البيانات
    $sql = "INSERT INTO properties (title, description, price, location, type, image_url) 
            VALUES ('$title', '$description', '$price', '$location', '$type', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        $message = "تم إضافة العقار بنجاح";
    } else {
        $message = "خطأ: " . $conn->error;
    }
}

$conn->close(); // إغلاق الاتصال بعد الانتهاء
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عقار جديد</title>
    <link rel="stylesheet" href="style.css"> <!-- رابط لملف الـ CSS -->
</head>
<body>

<header>
    <div class="container">
        <h1>إضافة عقار جديد</h1>
        <nav>
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="add_property.php">إضافة عقار</a></li>
                <li><a href="view_properties.php">عرض العقارات</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="form-container">
    <h2>أدخل تفاصيل العقار</h2>

    <!-- عرض رسالة النجاح أو الفشل -->
    <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>

    <form action="add_property.php" method="POST">
        <label for="title">العنوان</label>
        <input type="text" id="title" name="title" required>

        <label for="description">الوصف</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">السعر (ج.م)</label>
        <input type="number" id="price" name="price" required>

        <label for="location">الموقع</label>
        <input type="text" id="location" name="location" required>

        <label for="type">النوع</label>
        <select id="type" name="type" required>
            <option value="شقة">شقة</option>
            <option value="فيلا">فيلا</option>
            <option value="أرض">أرض</option>
            <option value="مؤسسة تجارية">مؤسسة تجارية</option>
        </select>

        <label for="image_url">رابط الصورة</label>
        <input type="url" id="image_url" name="image_url" placeholder="أدخل رابط الصورة" required>

        <button type="submit">إضافة العقار</button>
    </form>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 موقع بيع العقارات. جميع الحقوق محفوظة.</p>
        <ul>
            <li><a href="tel:0123456789">اتصل بنا: 0123456789</a></li>
            <li><a href="mailto:info@realestate.com">البريد الإلكتروني: info@realestate.com</a></li>
            <li><a href="https://www.facebook.com/yourpage" target="_blank">فيسبوك</a></li>
        </ul>
    </div>
</footer>

</body>
</html>

