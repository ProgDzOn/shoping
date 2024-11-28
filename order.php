<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب المنتج</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>تأكيد طلب المنتج</h1>
</header>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $customer_firstname = $_POST['customer_firstname'];
    $customer_lastname = $_POST['customer_lastname'];
    $phone_number = $_POST['phone_number'];
    $state = $_POST['state'];

    // إدراج الطلب في قاعدة البيانات
    $sql = "INSERT INTO orders (product_id, customer_firstname, customer_lastname, phone_number, state) 
            VALUES ('$product_id', '$customer_firstname', '$customer_lastname', '$phone_number', '$state')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>تم تقديم الطلب بنجاح!</p>";
    } else {
        echo "<p>حدث خطأ: " . $conn->error . "</p>";
    }

    $conn->close();
} else {
    $product_id = $_GET['product_id'];
?>

<form method="POST" action="order.php" class="order-form">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <label>الاسم:</label><br>
    <input type="text" name="customer_firstname" required><br>
    <label>اللقب:</label><br>
    <input type="text" name="customer_lastname" required><br>
    <label>رقم الهاتف:</label><br>
    <input type="text" name="phone_number" required><br>
    <label>الولاية:</label><br>
    <input type="text" name="state" required><br>
    <input type="submit" value="تأكيد الطلب">
</form>

<?php
}
?>

</body>
</html>


==ملف success_notification.js:

// هذه الدالة لعرض رسالة النجاح عند إتمام الطلب
function showSuccessNotification(message) {
    const notification = document.createElement('div');
    notification.classList.add('success-notification');
    notification.innerText = message;
    
    document.body.appendChild(notification);
    
    // إزالة الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

==تعديل في order.php:

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // البيانات الخاصة بالطلب
    $product_id = $_POST['product_id'];
    $customer_firstname = $_POST['customer_firstname'];
    $customer_lastname = $_POST['customer_lastname'];
    $phone_number = $_POST['phone_number'];
    $state = $_POST['state'];

    // إدراج الطلب في قاعدة البيانات
    $sql = "INSERT INTO orders (product_id, customer_firstname, customer_lastname, phone_number, state) 
            VALUES ('$product_id', '$customer_firstname', '$customer_lastname', '$phone_number', '$state')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>showSuccessNotification('تم تقديم الطلب بنجاح!');</script>";
    } else {
        echo "<p>حدث خطأ: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
