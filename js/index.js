 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38821032-1']);
  _gaq.push(['_setDomainName', 'prox3.com.br']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

Zepto(document).ready(function(){
	setTimeout(function(){
		window.scrollTo(0, 1);
	}, 0);
	var $ = Zepto;
	var allPanels = $('.accordion > dd').hide();	
	$('.accordion > dt > span').click(function() {
	  	$this = $(this);
	  	$target =  $this.parent().next();
		
		$('.accordion > dt > span').removeClass('active');
		$this.addClass('active');
		
	  	if(!$target.hasClass('active')){
			 allPanels.removeClass('active').hide();
			 $target.addClass('active').show();
	  	}
		return false;
	});
});