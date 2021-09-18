<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <title>Tinkerwell</title>
</head>
<body>
    <!-- start session to check if has logged in -->
    <?php
        session_start();
        if(!(isset($_SESSION['loggedIn'])) || $_SESSION['loggedIn'] !== true){
            header('Location: login.php');
            exit;
        }
    ?>

    <!-- hardcoded data -->
    <?php
        $idxNow = $_SESSION['idxNow'];
        $items = [
            [
                "judul" => "Laptop",
                "url-foto" => "https://www.pngfind.com/pngs/m/306-3065236_keyboard-laptop-minimalist-keyboard-piano-laptops-laptop-screen.png",
                "harga" => "Mulai dari Rp3.000.000",
                "deskripsi" => "Laptop bekas berkualitas"
            ],
            [
                "judul" => "Graphic Card",
                "url-foto" => "https://www.pngmart.com/files/7/Graphics-Card-Transparent-Background.png",
                "harga" => "Mulai dari Rp1.000.000",
                "deskripsi" => "Graphic Card bekas berkualitas"
            ],
            [
                "judul"=> "Mikrokontroler",
                "url-foto"=> "https://pngimg.com/uploads/microcontroller/microcontroller_PNG26.png",
                "harga"=> "Mulai dari Rp200.000",
                "deskripsi"=> "Mikrokontroler bekas berkualitas"
            ],
            [
                "judul" => "Smartphone",
                "url-foto" => "https://www.freepnglogos.com/uploads/smartphone-png/asus-smartphone-mobile-png-6.png",
                "harga" => "Mulai dari Rp1.000.000",
                "deskripsi" => "Smartphone bekas berkualitas"
            ],
            [
                "judul" => "RAM",
                "url-foto" => "https://www.pngall.com/wp-content/uploads/5/RGB-Ram-Transparent.png",
                "harga" => "Mulai dari Rp700.000",
                "deskripsi" => "RAM bekas berkualitas"
            ],
            [
                "judul" => "Monitor",
                "url-foto" => "https://freepngimg.com/thumb/monitor/7-monitor-png-image.png",
                "harga" => "Mulai dari Rp500.000",
                "deskripsi" => "Monitor bekas berkualitas"
            ]
        ];
        $_SESSION['items'] = $items;
        $_SESSION['n_items'] = count($items);

        //empty array indicates nothing yet insinde the cart
        if(!isset($_SESSION['tocart'])){
            $_SESSION['tocart'] = [];
        }
    ?>

    <div class="container">
        <div class="header">
            <h1 id="header">Tinkerwell</h1>
            <a href="shopcart.php" class="logocontainer">
                <span class="material-icons" id="shopchartlogo">
                    shopping_cart
                </span>
            </a>
        </div>
        <div class="heroBanner">
            <div class="back" id="backbtn">
                <h1>&#10094;</h1>
            </div>

            <a href='tocart.php' id="cart">
                <div class="addtocart" id="cartbtn">
                    Add to cart
                </div>
            </a>
        
            <div class="arrows" id="arrowscontainer">
                <div class="arrow">
                    <a href="navigate.php?direction=-1" id="leftnav">&#10094;</a>
                </div>

                <div class="arrow">
                    <a href="navigate.php?direction=1" id="rightnav">&#10095;</a>
                </div>
            </div>

            <div class="productContainer">
                <div class="image" id="gambar">
                    <img src = '<?= $items[$_SESSION['idxNow']]['url-foto'] ?>' alt="buku" class="img" id="gambarbarang">
                </div>

                <div class="nameprice" id="namaharga">
                    <h1 id="namabarang"><?= $items[$_SESSION['idxNow']]['judul'] ?></h1>
                    <h3 id="hargabarang"><?= $items[$_SESSION['idxNow']]['harga'] ?></h3>
                </div>

                <div class="desc" id="deskripbarang">
                    <h3 id="teksdeskripbarang"><?= $items[$_SESSION['idxNow']]['deskripsi'] ?></h3>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>