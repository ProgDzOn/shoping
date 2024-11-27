<?php
// إعدادات الاتصال بقاعدة البيانات
$host = 'localhost'; // أو إذا كنت تستخدم خادمًا عن بُعد، ضع عنوانه هنا
$username = 'root'; // اسم المستخدم لقاعدة البيانات
$password = ''; // كلمة المرور الخاصة بقاعدة البيانات (غالبًا تكون فارغة في XAMPP أو WAMP)
$database = 'real_estate_db'; // اسم قاعدة البيانات

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($host, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>

