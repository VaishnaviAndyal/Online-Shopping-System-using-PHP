<?php
$to = "navinandyal59@gmail.com";
$subject = "FeedBack";
$txt = $_POST['message'];
$headers = "From: ".$_post['email'];

mail($to,$subject,$txt,$headers);
    echo "<script>alert('Thank you');</script>";
      echo "<script>window.location='contact.html'</script>";
?>