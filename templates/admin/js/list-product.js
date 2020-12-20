$(document).ready(function() {
	$('.del-product').click(function(e){
		var id = $(this).attr("id");
		if(confirm('Удалить?')){
	    $.post(
					    window.location.pathname, 
					    {id: id, delproduct: true},
					    function(data){
					    	data = jQuery.parseJSON(data);
	              	if(data.code == 'done'){
	              		$('div#'+data.id).hide(500, function () {    //удаляем объект 
                      $('div#'+data.id).remove();
                  	});
	              	}else if(data.code == 'error 404'){
	              		console.log('не найден');
	              	}
	              
	            }, 
					  );
		}    

		e.preventDefault();
	});
});