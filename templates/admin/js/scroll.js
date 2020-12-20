$(function(){
	$("a[href^='#']").click(function(){
		var a=$(this).attr("href");
		a=$(a).offset().top-$("nav").height();
		$("html, body").animate({scrollTop:a+"px"});
		return!1})
});