<?php
require('dashboard/includes/conn.php');
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHARMACY</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
    <div class="wrapper">
        <section class="form sign up">
            <header> Login</header>
            <form class="header"  method="post" action="login_inc.php"> 
                        <div class="field input">
                            <label for="">Username</label>
                            <input type="text" name="username" placeholder="Provide your Username">
                        </div>
                        <div class="field input">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password">
                       </div>
                       
                        <div class="field button"> 
                            
                            <input type="submit" name="submit" value="LOGIN">
                        </div>
                        <?php echo $error?>
                            </form>
            <p>Register here <a href="register.php">Here</a></p>
        </section>
    </div>
</body>
</html>