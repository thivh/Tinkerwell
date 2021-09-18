<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">
    <title>Tinkerwell</title>
</head>
<body>
    <?php
        //load the file
        $file = fopen("accounts.txt","r") or die("Unable to open file");
        $accounts = fread($file, filesize("accounts.txt"));
        $accounts = explode("\n", $accounts);
        
        //making an array of accounts and passwords
        $unameAndPW = array();
        for($i = 0; $i < count($accounts); $i++){
            $unameAndPW[$i] = explode(":", $accounts[$i]);
            $unameAndPW[$i][1] = trim($unameAndPW[$i][1]);
        }
        fclose($file);

        //start session to validate the username and passw
        session_start();
        if(isset($_POST['uname']) && isset($_POST['pasw'])){
            foreach($unameAndPW as $value){
                if($_POST['uname'] == $value[0] && $_POST['pasw'] == $value[1]){
                    $_SESSION['loggedIn'] = true;
                    header('Location: http://localhost/wbd-2021-13519157-ryandito-diandaru/SimpleWebApp/index.php');
                    $_SESSION['idxNow'] = 0;
                    exit;
                }
            }
        }
    ?>
    <div class="container">
        <div class="title">
            <h1>Tinkerwell Login</h1>
        </div>
        <form method="post" action="">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="uname" placeholder="Username" class="inputan">

            <label for="pasw">Password</label>
            <input type="password" id="pasw" name="pasw" placeholder="Password" class="inputan">

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>