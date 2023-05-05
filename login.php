<?php
session_start();
// Create connection
$con =new  mysqli("localhost","root","","login");
if ($con->connect_error) {
  echo $con->connect_error;
  die("Connection failed: ");
}

// LOGIN VALIDATION

if (isset($_POST['login'])) {
    $mail = stripslashes($_REQUEST['mail']);    
    $mail = mysqli_real_escape_string($con, $mail);
    $pass1 = stripslashes($_REQUEST['pass1']);
    $pass1 = mysqli_real_escape_string($con, $pass1);
    $sql = "SELECT * FROM `records` WHERE Email='$mail' AND password ='$pass1'";
          $rs = mysqli_query($con, $sql);
          $rows = mysqli_num_rows($rs);
          if ($rows == 1) 
          {
            $_SESSION['login'] = $mail;
            header("Location: index.html");
            // echo '<script language="javascript"> window.location.href = "http://localhost/D:/DINESH/PROJECT/index.html";</script>';
            // echo "<script type='text/html'> window.location.href = 'D:/DINESH/PROJECT/index.html';</script>";
            
  
          }
          else
          {
            echo '<script language="javascript">';
            echo 'alert("Incorrect Username or Password")';
            echo '</script>';
          }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
</head>
<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="Model.jpg" alt="" /></div>
        <div class="formBx">
          <form action="#" method='post' >
            <h2>Sign In</h2>
            <input type="text" name="mail" placeholder="Username" required />
            <input type="password" name="pass1" placeholder="Password" required />
            <input type="submit" name="login" value="Login" />
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form action="#" method='post'>
            <h2>Create an account</h2>
            <input type="text" name="first" placeholder="Username" required />
            <input type="email" name="mail" placeholder="Email Address" required />
            <input type="password" name="pass1" placeholder="Create Password" required />
            <input type="password" name="pass2" placeholder="Confirm Password" required />
            <input type="submit" name="Submit" id="submit" value="Sign Up" />
            <p class="signup">
              Already have an account ?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
          </form>
        </div>
        <div class="imgBx"><img src="Model1.jpg" alt="" /></div>
      </div>
    </div>
  </section>
</body>
</html>

<?php

// REGISTER VALIDATION

if(isset($_POST['Submit']))
{
$first=$_POST['first'];
$mail=$_POST['mail'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];

if($first=="" and $mail=="" and $pass1=="" and $pass2=="")
    {
    echo '<script Type="javascript">alert("Registered Failed")</script>';
    }
    else{
    echo '<script Type="javascript">alert("Registered Successfully")</script>';
    }
}

// INSERTING DATA INTO TABLE

if (isset($_POST['Submit'])) {
    $first=$_POST["first"];
    $mail=$_POST["mail"];
    $pass1=$_POST["pass1"];
    
    $sql="INSERT INTO `records`(`First_name`,`Email`,`password`)
          VALUES('$first','$mail','$pass1')";
    $rs = mysqli_query($con,$sql);
    if($rs)
    {
         echo '<script language="javascript">';
        echo 'alert("Registered successfully")';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Registered Failed")';
        echo '</script>';
    }
    }
    
?>