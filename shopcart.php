<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="shopcart.css">

    <title>Webede Exercise</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="header">
        <h1 id="header">Bukupedia</h1>
    </div>
    <a href="index.php" class=back>
        <h1>&#10094;</h1>
    </a>
    <div class="listofitems">
        <?php foreach( $_SESSION['tocart'] as $index=>$item ) : ?>
        <div class="item">
            <div class="image">
                <img src="<?= $item['url-foto'] ?>" alt="barang" class="img" id="gambarbarang">
            </div>
            <div class="desc">
                <h1 id="namabarang"><?= $item['judul'] ?></h1>
                <h3 id="hargabarang"><?= $item['harga'] ?></h3>
                <br>
                <h3 id="teksdeskripbarang"><?= $item['deskripsi'] ?></h3>
            </div>
            <div class="deleter">
                <a href="delete.php?todel=<?= $index ?>" id="delanchor">
                    <span class="material-icons" style="font-size: 50px;">
                        delete
                    </span>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>