<?php
include 'db_connection.php'; // الاتصال بقاعدة البيانات

// استعلام للحصول على العقارات
$sql = "SELECT * FROM properties WHERE available = 1"; // العقارات المتاحة فقط
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض العقارات</title>
    <link rel="stylesheet" href="style.css"> <!-- رابط لملف الـ CSS -->
</head>
<body>

<header>
    <div class="container">
        <h1>العقارات المتوفرة</h1>
        <nav>
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="add_property.php">إضافة عقار</a></li>
                <li><a href="view_properties.php">عرض العقارات</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="property-grid">
<?php
if ($result->num_rows > 0) {
    // عرض العقارات
    while($row = $result->fetch_assoc()) {
        echo "<div class='property'>";
        echo "<img src='" . $row["image_url"] . "' alt='صورة العقار' class='property-image'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p><strong>السعر: </strong>" . $row["price"] . " ج.م</p>";
        echo "<p><strong>الموقع: </strong>" . $row["location"] . "</p>";
        echo "<p><strong>النوع: </strong>" . $row["type"] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>لا توجد عقارات متاحة حالياً.</p>";
}
$conn->close(); // إغلاق الاتصال بعد الانتهاء
?>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 موقع بيع العقارات. جميع الحقوق محفوظة.</p>
    </div>
</footer>

</body>
</html>

