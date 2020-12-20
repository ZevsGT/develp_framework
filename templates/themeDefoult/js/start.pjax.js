$(document).ready(function(){
   $(document).pjax('.nav-link, .navbar-brand', '.pjax-container');
   $(document).on('pjax:end', function() {

	   	$(function () {
	   		$('[data-toggle="popover"]').popover()
	   	});

	   	 delitem();
       additem();

   });
});