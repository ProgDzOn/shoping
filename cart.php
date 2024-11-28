<?php
include 'db_connection.php';

$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

if (count($cart) > 0) {
    $ids = implode(",", $cart);
    $sql = "SELECT * FROM products WHERE product_id IN ($ids)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>سلة التسوق</h1>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["product_name"] . " - " . $row["price"] . " دولار</li>";
        }
        echo "</ul>";
    } else {
        echo "السلة فارغة";
    }
} else {
    echo "السلة فارغة";
}

$conn->close();
?>
