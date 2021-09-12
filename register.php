<?php
include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
         $sql = "SELECT * FROM username WHERE email = '$email'";
         $result = mysqli_query($conn, $sql);
         if(!$result->num_rows > 0){
                  $sql = "INSERT INTO username(username,email,password)
                  VALUES ('$username','$email','$password')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>alert('WELCOME TO ZEDANSAHEER.DEV COMPANIES')</script>";
                        $username = "";
                        $email = "";
                        $password = "";
                        $cpassword = "";
                    } else {
                        echo "<script>alert('OOPS SOMETHING WENT WRONG')</script>";
                    }
                }else{
              echo "<script>alert('EMAIL ADDRESS is already in use!')</script>";
            $email = "";
             } 
            }else{
        echo "<script>alert('PASSWORDS DO NOT MATCH')</script>";
            $password = "";
            $cpassword = "";
     }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="input-group">
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $cpassword; ?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Register</button>
                </div>
                <p class="login-register-text">have an account? <a href="index.php">Login Here</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>