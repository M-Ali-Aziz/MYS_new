$(function() {
    // Header navbar icon Toggle open/close
    $('#navbarTogglerIconClose').hide();
    $('.navbar-toggler').click(function () {
        $('#navbarTogglerIconOpen').toggle();
        $('#navbarTogglerIconClose').toggle();
    })

    // Add class to YouTube iframe element
    $("iframe[src^='https://www.youtube']").addClass("rounded-3");

    let width = $(window).width();
    // Add class shadow to header when mobile
    if (width <= 992) {
        $('header').addClass('shadow-sm');
    }
});