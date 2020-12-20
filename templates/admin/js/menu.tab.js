$(document).ready(function(){

    $(".nav-bt-item[href^='#']").click(function(){
      if(!$(this).hasClass("tab-on")){
        return false;
      }
      var a=$(this).attr("href");
      event.preventDefault();
      $('.nav-tabs-btn > .tab-on').removeClass('nav-bt-item-active');
      $(this).addClass('nav-bt-item-active');
      $('.menu-list > section').css('display','none');
      $(a).css('display','block');

      if($('.menu-list').css('width') == '1px'){
        $('.menu-list').addClass('menu-list-active');
      }
    });

    $(".nav-btn").click(function(){
      event.preventDefault();
      if($('.menu-list').css('width') == '1px') $('.menu-list').addClass('menu-list-active');
      else $('.menu-list').removeClass('menu-list-active');
    });

});