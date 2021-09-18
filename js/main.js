const bukujson = {
    "books": [
      {
        "judul": "Untuk Apa Seni",
        "primer": {
          "url-foto": "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1392706216l/20837627.jpg",
          "harga": 60000
        },
        "deskripsi": {
          "penulis": "Bambang Sugiharto, dkk",
          "penerbit": "Pustaka Matahari",
          "penyunting": "Bambang Sugiharto"
        }
      },
      {
        "judul": "Warisan Sejarah Arianisme",
        "primer": {
          "url-foto": "https://pustaka.iainbukittinggi.ac.id/wp-content/uploads/2018/12/arian-198x300.jpg",
          "harga": 97000
        },
        "deskripsi": {
          "judul-asli": "Archetypal Heresy: Arianism Through the Centuries",
          "penulis": "Maurice Wiles",
          "penerjemah": "Zaenal Muttaqin",
          "penerbit": "Pustaka Matahari",
          "penerbit-asli": "Oxford University Press, Inc."
        }
      },
      {
        "judul": "Sejarah Filsafat Kontemporer: Jerman dan Inggris",
        "primer": {
          "url-foto": "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1551165807l/4309628._SX318_.jpg",
          "harga": 70000
        },
        "deskripsi": {
          "penulis": "K. Bertens",
          "penerbit": "PT Gramedia Pustaka Utama"
        }
      },
      {
        "judul": "Sejarah Filsafat Kontemporer: Prancis",
        "primer": {
          "url-foto": "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1243418656l/6498943.jpg",
          "harga": 63000
        },
        "deskripsi": {
          "penulis": "K. Bertens",
          "penerbit": "PT Gramedia Pustaka Utama"
        }
      },
      {
        "judul": "Semiotika dan Hipersemiotika",
        "primer": {
          "url-foto": "https://s2.bukalapak.com/img/7734600261/large/IMG_20170912_134621_scaled.jpg",
          "harga": 120000
        },
        "deskripsi": {
          "penulis": "Yasraf Amir Piliang",
          "penerbit": "Pustaka Matahari"
        }
      },
      {
        "judul": "Epistemologi Dasar",
        "primer": {
          "url-foto": "https://togamas.com/css/images/items/potrait/JPEGG_5905_Epistemologi_Dasar.jpg",
          "harga": 60000
        },
        "deskripsi": {
          "penulis": "J. Sudarminta",
          "penerbit": "Penerbit Kanisius"
        }
      },
      {
        "judul": "Teori-Teori Etika",
        "primer": {
          "url-foto": "https://s2.bukalapak.com/img/2027491742/large/Buku_Teori_Teori_Etika_karya_Gordon_Graham.jpg",
          "harga": 96000
        },
        "deskripsi": {
          "penulis": "Nusamedia",
          "penerbit": "Gordon Graham"
        }
      }
    ]
  };
let allbook = bukujson.books;
let idx = 2;

function generateBookMain(data) {
  const book = document.createElement("div");
  book.classList.add("card");
  book.classList.add("text-light");
  book.classList.add("bg-info");
  book.classList.add("mb-3");
  book.classList.add("main");
  book.classList.add("center");     
  book.id = data.judul;
  const photo = document.createElement("img");
  photo.src = data.primer["url-foto"];
  book.appendChild(photo);
  const title = document.createElement("h5");
  title.append(document.createTextNode(data.judul));
  book.appendChild(title);
  const price = document.createElement("h6");
  price.append(document.createTextNode("Rp" + data.primer.harga));
  book.appendChild(price);
  
  return book;
}

function main2() {
  let link = window.location.href;
  let temp1 = link.indexOf("?index=");
  let index = parseInt(window.location.href.substring(temp1 + 7,link.length));
  console.log(link.length);
  console.log(temp1); 
  console.log(index);
  let data = allbook[index];
  let kunci = [];
  let nilai = [];
  console.log(kunci);
  console.log(nilai);
  let teks;
  teks = `<div class="card text-white bg-info mb-3 main center" id="kartu2">
    <img id="photo0" class="card-img-top" src="` +  data.primer["url-foto"] + `" alt="Card image cap"></img>
    <div class="card-header">` + `Rp` + data.primer.harga + `</div>
    <div class="card-body">
    <h5 class="card-title">` + data.judul + `</h5>
    <p class="card-text">`;
  kunci = Object.keys(data.deskripsi);
  nilai = Object.values(data.deskripsi);
  for(let i=0;i<kunci.length;i++) {
    teks += kunci[i].replace("-"," ") + ": " + nilai[i] + "<br>";
  }

  teks += `</p></div></div>`;
  document.getElementById("kartu2").outerHTML = teks;
  console.log(document.getElementById("kartu2").outerHTML);

}

function changePage(index) {
  console.log("haha");
  window.location.href = "book0.php?index=" + index;
  // document.getElementById["jenis"].innerHTML = index; 
  // main2(index);
}

function main1() {
  for (var i = 0; i < allbook.length; i=i+1) {
    console.log(generateBookMain(allbook[i]));
    document.getElementById("booklist").appendChild(generateBookMain(allbook[i]));
    document.getElementById(allbook[i].judul).setAttribute("onclick","changePage(" + i + ")");
  }
}
function backToMain() {
  window.location.href = "index.php";
}




