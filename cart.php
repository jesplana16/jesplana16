<?php
session_start();
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$customer_email = $_SESSION['valid'];

if (isset($_POST['cancel_order'])) {
    $order_id = intval($_POST['order_id']);
    $delete_sql = "DELETE FROM orders WHERE id = $order_id AND customer_email = '$customer_email'";
    mysqli_query($con, $delete_sql);
}

$sql = "SELECT orders.*, cars.name AS car_name, cars.price AS car_price FROM orders
        JOIN cars ON orders.car_id = cars.id
        WHERE customer_email = '$customer_email'";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <header class="profile-page">
        <nav class="top-nav">
            <a href="home.php" class="logo">JE'TZY</a>
            <div class="nav-right">
                <a href="cart.php" class="nav-icon"><i class="uil uil-shopping-cart"></i></a>
                <a href="login.php" class="nav-button">Logout</a>
            </div>
        </nav>
    </header>

    <div class="cart-container">
        <h1>YOUR ORDERS</h1>
        <hr>
        <br>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='order-item'>
                        <h2>" . $row['car_name'] . "</h2>
                        <p>Price: $" . $row['car_price'] . "</p>
                        <p>Order Date: " . $row['order_date'] . "</p>
                        <form method='post' action='cart.php'>
                            <input type='hidden' name='order_id' value='" . $row['id'] . "'>
                            <button type='submit' name='cancel_order' class='cancel-button'>Cancel</button>
                        </form>
                      </div>";
            }
        } else {
            echo "<h1>You have no orders.</h1>";
        }
        ?>
    </div>
</body>
</html>

