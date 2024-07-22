<?php 
$id = $_COOKIE['proid'];
$connect = mysqli_connect("localhost", "root", "", "online_shopping") or die("connection failed!");
$check = mysqli_query($connect, "SELECT * FROM products where product_id=$id");
if (mysqli_num_rows($check) > 0) {
    $det = mysqli_fetch_all($check);
}


if(isset($_COOKIE['user']))
{
    $u=$_COOKIE['user'];
    $pn=$det[0][3];
    $pp=$det[0][5];
    $qry="INSERT INTO ordersdata (username,product_name,product_price) VALUES ('$u','$pn',$pp)";
    if ($connect->query($qry)) {
      echo "<script>alert('Oredr Successfully');</script>";
      echo "<script>window.location='login.php'</script>";
    }
    else
    {
      echo "<script>alert('Order Failed');</script>";
      echo "<script>window.location='prod.php'</script>";
    }  
}
else {
    echo "<script>alert('Plz login');</script>";
    echo "<script>window.location='login.php'</script>";
}
?>