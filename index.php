<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <title>Webede Exercise</title>
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
                "judul" => "Untuk Apa Seni",
                "url-foto" => "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1392706216l/20837627.jpg",
                "harga" => "Rp60000,-",
                "deskripsi" => "Penulis : Bambang Sugiharto, dkk<br>Penerbit : Pustaka Matahari<br>Penyunting : Bambang Sugiharto"
            ],
            [
                "judul" => "Warisan Sejarah<br>Arianisme",
                "url-foto" => "https://pustaka.iainbukittinggi.ac.id/wp-content/uploads/2018/12/arian-198x300.jpg",
                "harga" => "Rp97000,-",
                "deskripsi" => "Judul asli:<br>Archetypal Heresy: Arianism Through the Centuries<br>Penulis: Maurice Wiles<br>Penerjemah: Zaenal Muttaqin<br>penerbit: Pustaka Matahari<br>Penerbit-asli: Oxford University Press, Inc."
            ],
            [
                "judul"=> "Sejarah Filsafat Kontemporer:<br>Jerman dan Inggris",
                "url-foto"=> "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1551165807l/4309628._SX318_.jpg",
                "harga"=> "Rp70000,-",
                "deskripsi"=> "Penulis: K. Bertens<br>Penerbit: PT Gramedia Pustaka Utama"
            ],
            [
                "judul" => "Sejarah Filsafat<br>Kontemporer: Prancis",
                "url-foto" => "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1243418656l/6498943.jpg",
                "harga" => "Rp63000,-",
                "deskripsi" => "Penulis: K. Bertens<br>Penerbit: PT Gramedia Pustaka Utama"
            ],
            [
                "judul" => "Semiotika dan<br>Hipersemiotika",
                "url-foto" => "https://s2.bukalapak.com/img/7734600261/large/IMG_20170912_134621_scaled.jpg",
                "harga" => "Rp120000,-",
                "deskripsi" => "Penulis: Yasraf Amir Piliang<br>Penerbit: Pustaka Matahari"
            ],
            [
                "judul" => "Epistemologi Dasar",
                "url-foto" => "https://togamas.com/css/images/items/potrait/JPEGG_5905_Epistemologi_Dasar.jpg",
                "harga" => "60000,-",
                "deskripsi" => "Penulis: J. Sudarminta<br>Penerbit: Penerbit Kanisius"
            ],
            [
                "judul" => "Teori-Teori Etika",
                "url-foto" => "https://s2.bukalapak.com/img/2027491742/large/Buku_Teori_Teori_Etika_karya_Gordon_Graham.jpg",
                "harga" => "Rp96000,-",
                "deskripsi" => "Penulis: Nusamedia<br>Penerbit: Gordon Graham"
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
            <h1 id="header">Bukupedia</h1>
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