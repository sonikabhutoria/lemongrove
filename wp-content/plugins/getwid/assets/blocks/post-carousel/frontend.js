!function(e){function o(i){if(t[i])return t[i].exports;var s=t[i]={i:i,l:!1,exports:{}};return e[i].call(s.exports,s,s.exports,o),s.l=!0,s.exports}var t={};o.m=e,o.c=t,o.d=function(e,t,i){o.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:i})},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,o){return Object.prototype.hasOwnProperty.call(e,o)},o.p="",o(o.s=21)}({21:function(e,o){/*!
 * getwid-post-carousel
 */
!function(e){e(document).ready(function(o){e(document.body).on("post-load",function(e){t()});var t=function(){var o=e(".wp-block-getwid-post-carousel:not(.getwid-init) .wp-block-getwid-post-carousel__wrapper");o.length&&"undefined"!=typeof imagesLoaded&&o.each(function(o){getwid_post_carousel=e(this);var t=getwid_post_carousel.data("slider-option"),i=t.sliderSlidesToShowDesktop,s=t.getwid_slidesToShowLaptop,n=t.getwid_slidesToShowTablet,d=t.getwid_slidesToShowMobile,r=t.getwid_slidesToScroll,a=t.getwid_autoplay,l=t.getwid_autoplay_speed,p=t.getwid_infinite,c=t.getwid_animation_speed,u=t.getwid_center_mode,w=t.getwid_pause_on_hover,g=t.getwid_arrows,_=t.getwid_dots;w=!1,r=parseInt(r),i=parseInt(i),s=parseInt(s),d=parseInt(d),n=parseInt(n),g="none"!=g,_="none"!=_,getwid_post_carousel.closest(".wp-block-getwid-post-carousel").addClass("getwid-init"),getwid_post_carousel.imagesLoaded().done(function(o){e(o.elements[0]).slick({arrows:g,dots:_,rows:0,slidesToShow:i,slidesToScroll:r,autoplay:a,autoplaySpeed:l,fade:!1,speed:c,infinite:p,centerMode:u,variableWidth:!1,pauseOnHover:w,adaptiveHeight:!0,responsive:[{breakpoint:991,settings:{slidesToShow:s,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:n,slidesToScroll:1}},{breakpoint:468,settings:{slidesToShow:d,slidesToScroll:1}}]})})})};t()})}(jQuery)}});