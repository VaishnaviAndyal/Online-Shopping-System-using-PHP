<?php
  session_start();
  $cat=$_COOKIE['categories'];
  $connect=mysqli_connect("localhost","root","","online_shopping") or die("connection failed!");
  $check = mysqli_query($connect,"SELECT * FROM products where product_categories='$cat'");
  if(mysqli_num_rows($check)>0){
    $det=mysqli_fetch_all($check);
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>online shopping</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

  </head>

  <script>
    function pro(id)
    {
      document.cookie ="proid="+id;
      document.location="prod.php";
    }
  </script>

  <body>
    <header>
      <h2 class="logo">Logo</h2>
      <nav class="navigation">
        <a href="login.php">Home</a>
        <a href="contact.html">contact</a>
      </nav>
    </header>
    <section>
         <div class="con">
          <?php 
            for ($i=0; $i < count($det); $i++){ 
                ?>
            <div class="card" onclick="pro(<?php echo $det[$i][0];?>)">
                <div class="card-iamge"><img src="products/<?php echo $det[$i][2];?>" width="240vw" height="300vh" title="<?php echo $det[$i][4];?>" alt="<?php echo $det[$i][3];?>"></div>
                <div class="card-info">
                    <h3 class="card-title"><span><?php echo $det[$i][3];?></span></h3>
                    <h5 class="card-dis"><span><?php echo $det[$i][5];?></span></h5>
                </div>
            </div>
            <?php
            } ?>
        </div>
     </section>

  </body>
</html>


