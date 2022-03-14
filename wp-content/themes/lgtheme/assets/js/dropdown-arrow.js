$(document).ready(function(){
  $(".dropdown").click(function(){
    $(".dropdown .fa-arrow-down").toggleClass("rtoate180");
    
  });

  /*Added by me*/

  // function toggle() {
  //   if ( jQuery( window ).width() >= 800 ) {
  //     jQuery( '.nav.mobile-menu' ).hide();
  //     jQuery( '.nav.desktop-menu' ).show();
  //   } else {
  //     jQuery( '.nav.desktop-menu' ).hide();
  //     jQuery( '.nav.mobile-menu' ).show();
  //   }
  // }

  // // on page load set the menu display initially
  // toggle();

  // // toggle the menu display on browser resize
  // jQuery( window ).resize( function () {
  //     // toggle();
  // } );

  // $("#mobile-menu-button").click(function(){
  //     toggle();
  // });


});