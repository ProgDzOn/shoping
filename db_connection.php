<?php
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = ""; // كلمة مرور قاعدة البيانات (إذا كانت موجودة)
$dbname = "ecommerce_store"; // قاعدة البيانات الخاصة بك

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
// echo "تم الاتصال بنجاح";  // هذه الجملة يمكن حذفها لتجنب ظهور الرسالة
?>
