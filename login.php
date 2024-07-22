<?php
  session_start();
  $connect=mysqli_connect("localhost","root","","online_shopping") or die("connection failed!");
  if(isset($_POST['rsub']))
  {
    $uname=$_POST['runame'];
    $email=$_POST['remail'];
    $pass=$_POST['rpass'];
    $qry="INSERT INTO login (username,email,password) VALUES ('$uname','$email','$pass')";
    if ($connect->query($qry)) {
      echo "<script>alert('Register Successfully');</script>";
    }
    else
      echo "<script>alert('Register Failed');</script>";
  }
  if(isset($_POST['lsub']))
  {
    $email=$_POST['lemail'];
    $pass=$_POST['lpass'];
    $qry="SELECT * FROM login where email='$email'";
    $check = mysqli_query($connect,$qry);
    if (mysqli_num_rows($check)>0) {
      echo "<script>alert('Login Successfully');</script>";
      $det=mysqli_fetch_all($check);
      $_SESSION['user']=$det[0][0];
      setcookie('user',$det[0][0]);
    }
    else
      echo "<script>alert('Incorrect email or password');</script>";
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>online shopping</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script>
      function mencookie()
      {
        document.cookie = "categories=men";
        window.location="Product.php";
        
      }
      function womencookie()
      {
        document.cookie = "categories=women";
        window.location="Product.php";
      }
      function kidscookie()
      {
        document.cookie = "categories=kids";
        window.location="Product.php";
      }
      function logout()
      {
        <?php session_destroy()?>
        document.cookie="user=; expires=Thu, 01 Jan 1970 00:00:00 UTC;"
        window.location="login.php";
      }
      
    </script>
  </head>
  <body>

    <header>
      <h2 class="logo">Logo</h2>
      <nav class="navigation">
        <a href="login.php" id="home">Home</a>
        <a href="contact.html">contact</a>
        <button class="btnLogin-popup" id="lbtn" <?php if(isset($_COOKIE['user'])) { ?> style="display: none"; <?php }?> >Login</button>
       <button class="btnLogin-popup" id="log" <?php if(!isset($_COOKIE['user'])) { ?> style="display: none"; <?php }?> onclick="logout()">Logout</button>  

      </nav>
    </header>


          <div class="imges">
            <img src="men.webp" alt="men" name="men" width="400px" value="men" onclick="mencookie()">
            <img src="women.webp" alt="women" name="women" value="women" onclick="womencookie()">
            <img src="kids.webp" alt="kids" name="kids" value="kids" onclick="kidscookie()">
          </div>

    <div class="wrapper">
      <!-- <span class="icon-close"><ion-icon name="close"></ion-icon></span> -->
      <div class="form-box login">
        <h2>Login</h2>
        <form action="" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="Email" required  name="lemail"/>
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" required name="lpass"/>
            <label>password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox" /> Remember me</label>
            <!-- <a href="#">Forgot password?</a> -->
          </div>

          <button type="submit" class="btn" name="lsub">Login</button>
          <div class="login-register">
            <p>
              Don't have an account?<a href="#" class="register-link"
                >register?
              </a>
            </p>
          </div>
          <span class="icon-close"><ion-icon name="close"></ion-icon></span>

        </form>
      </div>
    

      <!-- Registration form-->
     
        <div class="form-box register">
          <h2>Registration</h2>
          <form action="" method="post" >
                  <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required  name="runame" />
                    <label>Username</label>
                  </div>
                  <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="Email" required name="remail" />
                    <label>Email</label>
                  </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
              <input type="password" required name="rpass" />
              <label>Password</label>
            </div>
            <div class="remember-forgot">
              <label><input type="checkbox" required /> I agree to the terms & Conditions</label>
              <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn" name="rsub" >Register</button>
            <div class="login-register">
              <p>
                Already have an account?<a href="#" class="login-link"
                  >Login?
                </a>
              </p>
            </div>
            <!-- <span class="icon-close"><ion-icon name="close"></ion-icon> -->
          </form>
        </div>
      </div>
    </div>
    
    
    <!-- Prodects -->
    

    <script src="script.js"></script>
    <script type="module"src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>


