<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/script.js" defer></script>
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
                    <img src="images/carsample.jpg" alt="Mitsubishi 1250">
                </div>
                <div class="car-info">
                    <h1>Mitsubishi 1250</h1>
                    <p class="car-description">This is an in-depth description of the Mitsubishi 1250. It features a powerful engine, advanced technology, and a sleek design. It's designed to offer the ultimate driving experience, with enhanced safety features and top-notch performance.</p>
                    <p class="car-price">$25,000</p>
                    <form action="confirm_purchase.php" method="POST">
                        <input type="hidden" name="car_id" value="1">
                        <button type="submit" class="buy-button">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
