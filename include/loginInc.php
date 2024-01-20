
<link href="../../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />

<?php
 session_start();
//check if the submit button was clicked or not

if (isset($_POST['submit'])) {
    //echo "Clicked";
//connect to the database

    require "conn.php";
    //collect data from the form

    $username = $_POST ['username'];
    $password = $_POST['password'];

    //check if the fields are empty

    if (empty($username) || empty($password)) {
        header("Location:index.php?error=emptyfields");
        exit();
    }
    //check if the password provided matches what we have in the database
    $sql = "SELECT * FROM users WHERE username =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: index.php?error=sqlerror");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s" , $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
           $passCheck = password_verify($password, $row['password']);
           if ($passCheck == false) {
              echo "<div class='h-full text-lg text-white font-bold bg-gradient-to-tl from-red-600 to-rose-400 flex justify-center items-center'>
              <div>Bad Login</div> 
              <div><a href='../../index.php'> <br>Try Again</a></div>
              </div>";
           }elseif ($passCheck == true) {
              $_SESSION['sessionId'] = $row ['id'];
              $_SESSION ['sessionUsername'] = $row['username'];
              $_SESSION ['sessionEmail'] = $row['email'];
              $_SESSION['success'] = "<div class='alert alert-success'> 
                        You have been logged in Successifuly</div>";
                header("Location: ../index_2.php?success=Loggedin");

              
           }
        }else {
            echo "<div class='h-full text-lg text-white font-bold bg-gradient-to-tl from-red-600 to-rose-400 flex justify-center items-center'>
              <div>Bad Login</div> 
              <div><a href='../index.php'> <br>Try Again</a></div>
              </div>";
        }
    }


}else {
    echo "<div class='h-full text-lg text-white font-bold bg-gradient-to-tl from-red-600 to-rose-400 flex justify-center items-center'>
              <div>Bad Login</div> 
              <div><a href='../index.php'> <br>Try Again</a></div>
              </div>";
}

?>