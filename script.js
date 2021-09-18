// old data for testing
// const items = {
//     tahu : {
//         nama : "Tahu super",
//         harga : "Rp2000,-",
//         gambar : "assets/tempe.png",
//         deskripsi : "penulis : Bambang Sugiharto, dkk<br>penerbit : Pustaka Matahari<br>penyunting : Bambang Sugiharto"
//     },
//     tempe :{
//         nama : "Tempe super",
//         harga : "Rp2500,-",
//         gambar : "assets/tempe.png",
//         deskripsi : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
//     },
//     buah :{
//         nama : "Buah super",
//         harga : "Rp5000,-",
//         gambar : "assets/buah.png",
//         deskripsi : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
//     }
// }


// new data, edited to fit the current code
// const books = {
//     nol : {
//         "judul": "Untuk Apa Seni",
//         "url-foto" : "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1392706216l/20837627.jpg",
//         "harga" : "Rp60000,-",
//         "deskripsi" : "Penulis : Bambang Sugiharto, dkk<br>Penerbit : Pustaka Matahari<br>Penyunting : Bambang Sugiharto"
//     },

//     satu : {
//         "judul" : "Warisan Sejarah<br>Arianisme",
//         "url-foto" : "https://pustaka.iainbukittinggi.ac.id/wp-content/uploads/2018/12/arian-198x300.jpg",
//         "harga" : "Rp97000,-",
//         "deskripsi" : "Judul asli:<br>Archetypal Heresy: Arianism Through the Centuries<br>Penulis: Maurice Wiles<br>Penerjemah: Zaenal Muttaqin<br>penerbit: Pustaka Matahari<br>Penerbit-asli: Oxford University Press, Inc."
//     },

//     dua : {
//         "judul": "Sejarah Filsafat Kontemporer:<br>Jerman dan Inggris",
//         "url-foto": "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1551165807l/4309628._SX318_.jpg",
//         "harga": "Rp70000,-",
//         "deskripsi": "Penulis: K. Bertens<br>Penerbit: PT Gramedia Pustaka Utama"
//     },

//     tiga : {
//         "judul": "Sejarah Filsafat<br>Kontemporer: Prancis",
//         "url-foto": "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1243418656l/6498943.jpg",
//         "harga": "Rp63000,-",
//         "deskripsi": "Penulis: K. Bertens<br>Penerbit: PT Gramedia Pustaka Utama"
//     },

//     empat : {
//         "judul": "Semiotika dan<br>Hipersemiotika",
//         "url-foto": "https://s2.bukalapak.com/img/7734600261/large/IMG_20170912_134621_scaled.jpg",
//         "harga": "Rp120000,-",
//         "deskripsi": "Penulis: Yasraf Amir Piliang<br>Penerbit: Pustaka Matahari"
//     },

//     lima : {
//         "judul": "Epistemologi Dasar",
//         "url-foto": "https://togamas.com/css/images/items/potrait/JPEGG_5905_Epistemologi_Dasar.jpg",
//         "harga": "60000,-",
//         "deskripsi":"Penulis: J. Sudarminta<br>Penerbit: Penerbit Kanisius"
//     },

//     enam : {
//         "judul": "Teori-Teori Etika",
//         "url-foto": "https://s2.bukalapak.com/img/2027491742/large/Buku_Teori_Teori_Etika_karya_Gordon_Graham.jpg",
//         "harga": "Rp96000,-",
//         "deskripsi": "Penulis: Nusamedia<br>Penerbit: Gordon Graham"
//     }
// }

// making an index array to point the objects
const index = [];
for (var x in books){
    index.push(x);
}
const idxlen = index.length

//empty object to store items in cart
const toCart = {};

//initial states
var idxnow = 0;
var details = 0;
var itemsAdded = 0;

//first display
// document.getElementById("namabarang").innerHTML = books[index[idxnow]].judul;
// document.getElementById("hargabarang").innerHTML = books[index[idxnow]].harga;
// document.getElementById("gambarbarang").src = books[index[idxnow]]["url-foto"];
// document.getElementById("teksdeskripbarang").innerHTML = books[index[idxnow]].deskripsi;

//define the function
const moveIndex = (step) => {
    return (e) => {
        // indexing in round robin manner
        var newidx  = idxnow + step;
        if(newidx == -1){
            idxnow = idxlen-1;
        }
        else if(newidx == idxlen){
            idxnow = 0;
        }
        else{
            idxnow = newidx
        }
        
        // changing properties
        // document.getElementById("namabarang").innerHTML = books[index[idxnow]].judul;
        // document.getElementById("hargabarang").innerHTML = books[index[idxnow]].harga;
        // document.getElementById("gambarbarang").src = books[index[idxnow]]["url-foto"];
        // document.getElementById("teksdeskripbarang").innerHTML = books[index[idxnow]].deskripsi;

        //resetting animation
        const element = document.getElementById("gambarbarang")
        element.classList.remove('img');
        void element.offsetWidth;
        element.classList.add('img');
    }
}

const showDetails = () => {
    return (e) => {
        if(details == 0){
            //summon backbutton and disable clickable of picture
            document.getElementById("backbtn").style.left = "5%";
            document.getElementById("gambarbarang").style.pointerEvents = "none";

            //add to cart button to screen
            document.getElementById("cartbtn").style.right = "2%";

            // disappearing arrows
            document.getElementById("arrowscontainer").style.left = "-25%";
            document.getElementById("arrowscontainer").style.width = "150%";

            //image to left
            document.getElementById("gambarbarang").style.left = "-20%";
            document.getElementById("gambarbarang").style.width = "50%";

            //title and price to left
            document.getElementById("namaharga").style.right = "-25%";

            //make description visible
            document.getElementById("deskripbarang").style.opacity = "100";

            details = 1;
        }
        else{
            //hide back button and let it be clickable again
            document.getElementById("backbtn").style.left = "-20%";
            document.getElementById("gambarbarang").style.pointerEvents= "";

            //hide add to cart button
            document.getElementById("cartbtn").style.right = "-20%";

            //put arrows back
            document.getElementById("arrowscontainer").style.left = "0%";
            document.getElementById("arrowscontainer").style.width = "100%";

            //return image to original position
            document.getElementById("gambarbarang").style.left = "0%";
            document.getElementById("gambarbarang").style.width = "25%";

            //return name and price
            document.getElementById("namaharga").style.right = "0%";

            //hide the description
            document.getElementById("deskripbarang").style.opacity = "0";

            details = 0;
        }
    }
    
}

const addToCart = () => {
    return (e) => {
        toCart[itemsAdded] = books[index[idxnow]];
        itemsAdded++;
    }
}

//event listeners
//navigation
// document.getElementById("leftnav").addEventListener("click", moveIndex(-1));
// document.getElementById("rightnav").addEventListener("click", moveIndex(1));

//details
document.getElementById("gambarbarang").addEventListener("click", showDetails());
document.getElementById("backbtn").addEventListener("click", showDetails());

//addToCart
document.getElementById("cartbtn").addEventListener("click", addToCart());