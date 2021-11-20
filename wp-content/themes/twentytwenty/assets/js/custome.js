$(document).ready(function () {
    alert('ok');
    window.onscroll = function () {
    	alert('ok');
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
            $('.header-titles img').css('width', '35%');
            $('#header_section .navbar').css('padding', '10px 25px');
            $('#site-header .navbar').removeClass('bg-light');
            $('#site-header .navbar').addClass('header_scroll');
        } else {
            $('.header-titles img').css('width', '');
            $('#site-header .navbar').removeClass('header_scroll');
            $('#site-header .navbar').css('padding', '');
        }
    }

})