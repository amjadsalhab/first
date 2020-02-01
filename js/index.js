$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

/* scroll bar start */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("nav").style.top = "0";
    } else {
        document.getElementById("nav").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
}
/* scroll bar end */

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

////////////////

$('[data-add-to-cart]').click(function (e) {
   alert('Added to cart');
   e.stopPropagation();
});


//////


