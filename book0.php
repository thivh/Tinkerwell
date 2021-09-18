<?php
 session_start();
 if(!(isset($_SESSION["username"]))) {
  header("Location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico" />
    <title>Boocoo</title>
    <style>
        h1 {
        text-align: center;
        font-size: 200px;
        color: rgb(165, 40, 165);
        }
        .errmsg {
        text-align: center;
        font-size: 18px;
        color: #e21a1a;
        }          
        body {
        background: #91a849;
        color: #2b1f1f;
        margin: 0;
        min-height: 100%;
        height: 100%;
        position:relative;
      }
    </style>
  </head>
  <body onload="main2()">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="static/favicon-32x32.png" alt="Boocoo" style="height:100%"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link active" aria-current="page" href="index.php">About</a>
              <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
              <a class="nav-link active right1" aria-current="page" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
    
    
    <img src="static/Boocoo.png" class="center">
    <br>
    <br>
      
    <div class="card text-light bg-info mb-3 main center" id="kartu2">

    </div>
    <form method="post">
    <input type="text" id="quantity" class="center" name="quantity" placeholder="quantity">
    <br>
    <input type="submit" class="button-center" value="Add">
    <br>
    </form>

    <?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = (int)$_POST["quantity"];
        if($n <= 0) {
          echo '<p class="errmsg">Invalid input</p>'; 
        }
        else {
          $_SESSION["booklist"][$_GET["index"]] += $n;
          header("Location: cart.php");
        } 
      }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>