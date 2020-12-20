$(document).ready(function(){
    $('.shopping-cart').click(function(e){
      e.preventDefault();
      if($('.shopping-block').css('width') == '0px'){
        var $width = $(window).width();
        if($width <= 767 ){
          $('body').css('overflow','hidden');
        }
        $('.shopping-block').addClass('shopping-active');
        $('.shopping-cart').css('animation','none').addClass('cart-actuve');
        $('.fa-times').css('display','block');
        $('.fa-shopping-cart').css('display','none');
        $('.count').css('transform','scale(0, 0)');
      }
    });
    
    $(document).mouseup(function (e){ 
        var div = $(".shopping-block");
        if (!div.is(e.target) && div.has(e.target).length === 0) {
          var $width = $(window).width();
          if($width <= 767 ){
            $('body').css('overflow','auto');
          }
          $('.shopping-block').removeClass('shopping-active');
          $('.shopping-cart').css('animation','pulse 2s infinite').removeClass('cart-actuve');
          $('.fa-times').css('display','none');
          $('.fa-shopping-cart').css('display','block');
          $('.count').css('transform','scale(1, 1)');
      }
    });

    $('.shopping-list').bind('mousewheel DOMMouseScroll', function(e) {
      var scrollTo = 0;
      e.preventDefault();
      if (e.type == 'mousewheel') {
        scrollTo = (e.originalEvent.wheelDelta * -1) / 10;
      }
      else if (e.type == 'DOMMouseScroll') {
        scrollTo = 40 * e.originalEvent.detail;
      }
      $(this).scrollTop(scrollTo + $(this).scrollTop());
    });

    $(window).on('load', function() {
      var $width = $(window).width();
      if($width <= 767 ){
        $(window).on("scroll", function() {
          $('footer').scrollanim('skip-shopping-cart', '.shopping-cart');
        });
      }
    });

});