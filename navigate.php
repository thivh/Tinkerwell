<?php
    session_start();
    if($_GET['direction'] == 1){
        if($_SESSION['idxNow'] < $_SESSION['n_items']-1){
            $_SESSION['idxNow']++;
        }
        else{
            $_SESSION['idxNow'] = 0;
        }
    }
    else{
        if(0 < $_SESSION['idxNow']){
            $_SESSION['idxNow']--;
        }
        else{
            $_SESSION['idxNow'] = $_SESSION['n_items']-1;
        }
    }
    
    //return to index.php
    header("location:index.php");
?>