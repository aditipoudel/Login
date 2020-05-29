<html>
<head>
    <title>System Portal</title>
    <link rel="stylesheet" href="./css/mystyle.css">
</head>
<body>
    <form action="" class="signup-form" method="POST">
        <h1>Signup</h1>

        <div class="txta">

            <input type="text" name="username" required>
            <span data-placeholder="Username"></span>
        </div>

        <div class="txta">

            <input type="text" name="password"  required>
            <span data-placeholder="Password"></span>
        </div>
          <div class="txta">
            <input type="text" name="email" required>
            <span data-placeholder="email"></span>
          </div>
          <div class="txta">
            <input type="text" name="country" required>
            <span data-placeholder="Country"></span>
          </div>
          <br>
          
              <select name="gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
              </select>
          <br>
          <br>
    
    <input type="submit" name="submit" class="signbtn" value="Sign up" >
<br>
    <div class="bottom-text2"> Already have an account? <a href="index.php">LOGIN</a>
    </div>
     </form>
    

</body>
</html>
<?php
    // $conn
    $conn=mysqli_connect("localhost","root","","checklogins");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['submit']))
   
    #this is for button click
    {
        $a=$_POST['username'];
        $b=$_POST['password'];
        $c=$_POST['email'];
        $d=$_POST['country'];
        $e=$_POST['gender'];
            
        $que="insert into signupdbs(username,password,email,country,gender) values('$a', '$b','$c','$d','$e')";
         if (mysqli_query($conn,$que)) 
        {
            echo "<script> window.alert('Thank you! Successfully signed up!')</script>";
        }
        else
        {
            echo "<script> window.alert('Oops! something went wrong, try again.')</script>";
        }
    }
   
?>