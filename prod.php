<?php
session_start();
$id = $_COOKIE['proid'];
$connect = mysqli_connect("localhost", "root", "", "online_shopping") or die("connection failed!");
$check = mysqli_query($connect, "SELECT * FROM products where product_id=$id");
if (mysqli_num_rows($check) > 0) {
    $det = mysqli_fetch_all($check);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>online shopping</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script>
        function order()
        {    
            // var str=<?php echo isset($_SESSION['user']); ?>;
            // alert('Order Successfully');
            // window.location="login.php";
            // alert(str);
            alert();
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
        .container {
            position: relative;
            font-family: 'Lato', sans-serif;
            text-transform: uppercase;
            margin: auto;
            overflow: hidden;
            width: 600px;
            height: 450px;
            background: #F5F5F5;
            box-shadow: 5px 5px 15px rgba(#BA7E7E, .5);
            border-radius: 10px;
        }
        .images{
            width: 400px;
            height: 400px;
            background-color: #BA7E7E;
        }
        p {
            font-size: 1em;
            color: #BA7E7E;
            margin: 30px;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 1.2em;
            color: #4E4E4E;
            margin-top: -30px;
            margin-left: 30px;
        }

        h2 {
            color: chartreuse;
            margin-left: -30px;
        }

        img {
            width: 400px;
            height: 400px;
            margin: 50px;
            margin-top: 70px;
        }

        .add {
            /* background: darken(#E0C9CB, 10%); */
            background: red;
            padding: 10px;
            display: inline-block;
            outline: 0;
            border: 0;
            margin: -1px;
            border-radius: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #F5F5F5;
            cursor: pointer;
        }
        .add:hover {
                background: #BA7E7E;
                transition: all .4s ease-in-out;
            }

        .add {
            width: 67%;
            margin-top: 20px;
            margin-left: 30px;
        }
        .focus {
            background: #BA7E7E;
            color: #F5F5F5;
        }
    </style>

</head>

<body>
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="login.php">Home</a>
            <a href="contact.html">contact</a>
        </nav>
    </header>
    <form action="atc.php" method="post" >
        <div class="container">
            <div class="images">
                <img src="products/<?php echo $det[0][2]; ?>" title="<?php echo $det[0][4]; ?>" width="900px" height="300px"/>
            </div>
            <div class="product">
                <h1><?php echo $det[0][3];?></h1>
                <p class="desc"><?php echo $det[0][4]; ?></p>
                <h2>&#8377;<?php echo $det[0][5]; ?></h2>
                <div class="buttons">
                    <!-- <button class="add" onclick="order()">Add to Cart</button> -->
                    <input type="submit" name="atc" class="add" value="Add to Cart"/>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
