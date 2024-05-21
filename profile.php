<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<header class="profile-page">
        <nav class="top-nav">
            <a href="home.php" class="logo">JE'TZY</a>
            <div class="nav-right">
                <a href="cart.php" class="nav-icon"><i class="uil uil-shopping-cart">Cart</i></a>
                <a href="login.php" class="nav-button">Logout</a>
            </div>
        </nav>
    </header>
    <div class="change-container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age', Password='$password' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div>";
              echo "<a href='login.php'><button class='button'>Login Again</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_Password = $result['Password'];
                }

            ?>
            <header class="change">Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">password</label>
                    <input type="text" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="button" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>