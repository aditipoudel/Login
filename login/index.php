<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>System Portal</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <form action="index.php" class="login-form" method="POST">
        <h1>Login</h1>

        <div class="txtb">

            <input type="text" name= "username" required>
            <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">

            <input type="password"  name= "password" required>
            <span data-placeholder="Password"></span>
        </div>
    
    <input type="submit" name= "submit" class="logbtn" value="Login" >
    <div class="bottom-text">Don't have an account?<a href="signup.php">Sign Up</a>
    </div>
     </form>
</body>
</html>

<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=checklogins", "root",""); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    echo "Database Operations Failed: " . $e->getMessage();
}


session_start();
if (isset($_POST["submit"])) {

    $a=$_POST['username'];
 
    $b=$_POST['password'];
   
    $que = "select * from signupdbs where username = '$a'";
    try {
        $stmt = $conn->prepare($que);
        $stmt->execute(array(
            ':username' => $a
            ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data == false){
         
            echo "<script> window.alert('Username not found')</script>";
       
        }	
        else {
            if( $data['password'] == $b) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['password'] = $data['password'];
         
                header('Location: login.php');
                exit;
            }
            else
            {
            echo "<script> window.alert('Oops! Password went wrong')</script>";
            
        }
    }
}
    catch(PDOException $e) {
        $errMsg = $e->getMessage();
    }
}    
    

   
    
  
?>




