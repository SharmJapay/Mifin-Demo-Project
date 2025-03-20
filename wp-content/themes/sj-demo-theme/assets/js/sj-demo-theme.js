// Navbar Menu Toggle
function toggleMenu() {
    document.querySelector(".navbar nav").classList.toggle("active");
}

// Woocommerce Checkout Authentication Pop-up
jQuery(document).ready(function ($) {
    if ($("#auth-popup").length) {
        $("#auth-popup").fadeIn();

        $(".close-popup").click(function () {
            $("#auth-popup").fadeOut();
        });

        // Close pop-up when clicking outside the pop-up content
        $(document).on("click", function (e) {
            if (!$(e.target).closest(".popup-content").length && !$(e.target).is(".login-btn")) {
                $("#auth-popup").fadeOut();
            }
        });
    }
});