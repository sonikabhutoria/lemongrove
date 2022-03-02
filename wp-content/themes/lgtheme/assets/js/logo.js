$(document).ready(function() {

    if($(window).width() < 600) {
        console.log($(window).width())
        $("#db-logo").attr("src", "images/mob_logo.svg");
    } else {
        $("#db-logo").attr("src", "images/logo.svg");
    }
    
});