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