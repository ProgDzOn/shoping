<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];

    // حفظ الصورة في المجلد
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);

    // الاتصال بقاعدة البيانات
    $conn = new mysqli('localhost', 'root', '', 'real_estate_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام لإضافة العقار
    $sql = "INSERT INTO properties (title, description, type, price, location, image) 
            VALUES ('$title', '$description', '$type', '$price', '$location', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة العقار بنجاح!";
    } else {
        echo "خطأ: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة عقار</title>
</head>
<body>
    <h2>إضافة عقار جديد</h2>
    <form action="add_property.php" method="POST" enctype="multipart/form-data">
        <label for="title">العنوان:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">الوصف:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="type">النوع:</label>
        <select id="type" name="type" required>
            <option value="residential">سكني</option>
            <option value="land">أراضي</option>
            <option value="commercial">مؤسسات</option>
        </select><br>

        <label for="price">السعر:</label>
        <input type="number" id="price" name="price" required><br>

        <label for="location">الموقع:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="image">صورة العقار:</label>
        <input type="file" id="image" name="image" required><br>

        <input type="submit" value="إضافة عقار">
    </form>
</body>
</html>
