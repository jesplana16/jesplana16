<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchased Successfully</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
    session_start();
    include("php/config.php");

    if (isset($_SESSION['car_id'])) {
        $car_id = intval($_SESSION['car_id']);
        $customer_name = $_SESSION['username'];
        $customer_email = $_SESSION['valid'];

        $sql = "INSERT INTO orders (car_id, customer_name, customer_email) VALUES ('$car_id', '$customer_name', '$customer_email')";
        if (mysqli_query($con, $sql)) {
            echo "<div class='message-container'>
                    <div class='message-box'>
                        <p class='mess'>Order Placed Successfully!</p>
                        <a href='products.php' class='button'>Okay</a>
                    </div>
                  </div>";
            unset($_SESSION['car_id']); // Clear the car ID from session
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "No car selected for purchase.";
    }
    ?>
  </body>
</html>