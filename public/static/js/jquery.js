$(function() {
    // Header navbar icon Toggle open/close
    $('#navbarTogglerIconClose').hide();
    $('.navbar-toggler').click(function () {
        $('#navbarTogglerIconOpen').toggle();
        $('#navbarTogglerIconClose').toggle();
    })
});