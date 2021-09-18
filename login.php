<?php
 session_start();
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
    <link rel="stylesheet" href="css/login.css">
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
  <body>
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
            </div>
          </div>
        </div>
      </nav>
      
    <img src="static/Boocoo.png" class="center">
    <br>
    <br>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="static/login.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form action="" method="post">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Login">
            </form>


        </div>
    </div>

    <?php
      $users = json_decode(file_get_contents("users.json"),true);
      $found = false;
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputUN = $_POST['username'];
        $inputPW = $_POST['password'];
        foreach($users as $un => $pw) {
          if($inputUN == $un and $inputPW == $pw) {
            $_SESSION["username"] = $un;
            $_SESSION["password"] = $pw;
            $bookcount = count(json_decode(file_get_contents("books.json"),true)["books"]);
            $arr = array();
            for($i = 0; $i < $bookcount; $i++) {
              $arr[$i] = 0;
            }
            $_SESSION["booklist"] = $arr;
            $found = true;
            header("Location: index.php");
          }
        }
        if($found == false) {
          echo '<p class="errmsg">Incorrect, please try again</p>'; 
        }
      }     
    ?>
    

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="books.json"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>