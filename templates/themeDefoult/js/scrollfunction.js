(function($){
   $.fn.scrollanim = function(parm, element) {
   			if(this.hasClass(parm)) return false;
   			if ($(window).scrollTop() > (this.offset().top)-500) $(element).addClass(parm);
   			if ($(window).scrollTop() < (this.offset().top)-500) $(element).removeClass(parm);
   			return this;
   }; 
})( jQuery );

