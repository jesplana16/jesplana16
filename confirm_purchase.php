
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Confirm Purchase</title>
</head>
<body>
    <div class="login-container">
        <div class="box form-box">

        <?php 
session_start();
include("php/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['car_id'])) {
        $car_id = intval($_POST['car_id']);
        $_SESSION['car_id'] = $car_id; // Store the car ID in session for later use
    }
}

if (isset($_POST['confirm_login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        // User authenticated successfully, proceed with purchase
        header("Location: buycar.php");
        exit();
    } else {
        echo "<div class='message'>
                <p class=mess>Wrong Username or Password! Please Try again.</p>
              </div>";
    }
}
?>
            <header class="login">Confirm Your Identity</header>
            <?php if (isset($message)) { echo "<p class='error-message'>$message</p>"; } ?>
            <form action="confirm_purchase.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field input">
                    <input type="submit" class="button" name="confirm_login" value="Confirm">
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>
