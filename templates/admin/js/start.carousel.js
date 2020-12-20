$(document).ready(function(){
    $('.owl-theme').owlCarousel({
        loop:true,
        nav:true,
        autoplay: true,
        smartSpeed: 500,
        dots:true,
        autoplayTimeout: 6000,
        navText: ['<span class="carousel-control-prev-icon" aria-hidden="true"></span>','<span class="carousel-control-next-icon" aria-hidden="true"></span>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});