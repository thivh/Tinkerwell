<?php
    session_start();
    if(isset($_GET['todel'])){
        unset($_SESSION['tocart'][$_GET['todel']]);
    }

    //back to cart
    header("location:shopcart.php");
?>