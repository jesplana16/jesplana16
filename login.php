<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
        <div class="login-container">
            <div class="box form-box">
                
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
            
                $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);
            
                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['id'] = $row['Id'];
            
                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                        exit(); // Ensure the script stops executing after redirection
                    }
                } else {
                    echo "<div class='message'>
                            <p class=mess>Wrong Username or Password!</p>
                          </div> ";
                    echo "<a href='login.php'><button class='button'>Go Back</button></a>"; // Correct the link
                }
              }else{

            
            ?>

                <header class="login">Login</header>
                <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" require>
                </div>
                
                <div class="field input">
                    <input type="submit" class="buttons" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up</a>
                </div>
            </form>
            </div>
            <?php } ?>
        </div>

</body>
</html>