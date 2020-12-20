$(document).ready(function(){

  $('form').submit(function(event) {
    var json;
    event.preventDefault();
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(result) {
        //alert(result);
        json = jQuery.parseJSON(result);
        if (json.code == 'done') {
          $("#stage_3").append("<div class='row'>" + json.message + "</div>");
          hide_section(2, 'next');
        } 
      },
    });
  });


  $('.dcarti').click(function(e){
      var id = $(this).attr("id");
      $.post(
              '/cart/del', 
              {id: id, flag: 'count'},
              function(data){
                data = jQuery.parseJSON(data);
                if (data.code == 'success') {

                  $('#sum_price').html(data.sum_price);

                  $('div#item_'+data.id).hide(500, function () {    //удаляем объект 
                      $('div#item_'+data.id).remove();
                    });
                }
              }, 
            );
      e.preventDefault();
    });



  $('.next').click(function(e){
    var stage = $(this).attr("data-stage");
    hide_section(stage, 'next');
    e.preventDefault();
  });

  $('.back').click(function(e){
    var stage = $(this).attr("data-stage");
    hide_section(stage, 'back');
    e.preventDefault();
  });

  $('#checkbox').click(function(){
    if ($(this).is(':checked')){
        $('#submit').attr('disabled', false);
    } else {
        $('#submit').attr('disabled', true);
    }
  });

});
    
function hide_section(n, option){
  $(document).scrollTop(0);
  n = parseInt(n);
  if(option == 'next'){
    $('#stage_' + n).css('display', 'none');
    $('#stage_' + (n+1)).css('display', 'block');
    $('.stage > *:nth-child(' + (n+1) + ')').addClass('stage_active');
  }
  if(option == 'back'){
    $('#stage_' + n).css('display', 'none');
    $('#stage_' + (n-1)).css('display', 'block');
    $('.stage > *:nth-child(' + n + ')').removeClass('stage_active');
  }
}    