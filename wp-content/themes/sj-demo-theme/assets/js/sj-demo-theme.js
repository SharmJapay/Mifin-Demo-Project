// Navbar Menu Toggle
function toggleMenu() {
    document.querySelector(".navbar nav").classList.toggle("active");
}

// Woocommerce Checkout Authentication Pop-up
document.addEventListener("DOMContentLoaded", function () {
    let popup = document.getElementById("auth-popup");
    if (popup) {
        popup.style.display = "block";
        document.querySelector(".close-popup").addEventListener("click", function () {
            popup.style.display = "none";
        });
    }
});