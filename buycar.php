<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['car_id'])) {
    header("Location: login.php");
    exit();
}

$_SESSION['ready_to_confirm'] = true;

$car_id = $_SESSION['car_id'];
$ready_to_confirm = isset($_SESSION['ready_to_confirm']) && $_SESSION['ready_to_confirm'];

include("php/config.php");

// Fetch car details from the database
$car_query = "SELECT * FROM cars WHERE id='$car_id'";
$car_result = mysqli_query($con, $car_query);
if (!$car_result) {
    die("Query failed: " . mysqli_error($con));
}
$car = mysqli_fetch_assoc($car_result);
if (!$car) {
    die("Car not found.");
}

// Set $ready_to_confirm variable based on session
$ready_to_confirm = isset($_SESSION['ready_to_confirm']) && $_SESSION['ready_to_confirm'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="js/script.js" defer></script>
    <title>Car Details</title>
</head>
<body>
<header>
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="#" class="logo">JE'TZY</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="index.html">HOME</a></li>
        <li><a href="products.php">PRODUCTS</a></li>
        <li><a href="services.html">SERVICES</a></li>
        <li><a href="about.html">ABOUT US</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
      </ul>

      <a href="profile.php" class="profile-icon">
        <i class="uil uil-user"></i>
      </a>

    </nav>

    <div class="car-details-page">
        <header class="header">
            <a href="products.php" class="back-button">← Back to Products</a>
        </header>
        <div class="car-details-container">
            <div class="car-image">
                <img src="images/carsample.jpg ?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>">
            </div>
            <div class="car-info">
                <h1><?php echo htmlspecialchars($car['name']); ?></h1>
                <p class="car-description"><?php echo htmlspecialchars($car['description']); ?></p>
                <p class="car-price">$<?php echo number_format($car['price'], 2); ?></p>
                
                <?php if ($ready_to_confirm): ?>
                    <div class="button-container">
                    <form action="process_order.php" method="post">
                        <button type="submit" class="confirm-button">Confirm Purchase</button>
                    </form>
                    <a href="products.php"><button class="cancel-button">Cancel</button></a>
                <?php else: ?>
                    <!-- Add a message to see if the condition is not met -->
                    <p>Not ready to confirm purchase.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Unset the ready to confirm flag
if (isset($_SESSION['ready_to_confirm'])) {
    unset($_SESSION['ready_to_confirm']);
}
?>