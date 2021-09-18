<?php
    session_start();
    // push to the to cart array
    array_push($_SESSION['tocart'], $_SESSION['items'][ $_SESSION['idxNow']]);

    //return to index.php
    header("location:index.php");
?>