Zepto(document).ready(function(){
	var $ = Zepto;
	var allPanels = $('.accordion > dd').hide();
	
	//$('.accordion > dt:first > span').addClass('active');
	//$('.accordion > dd:first').addClass('active').slideDown();
	
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
//	var deviceAgent = navigator.userAgent.toLowerCase();
//    var agentID = deviceAgent.match(/(iphone|ipod|android)/);
//
//    if (!agentID) {
//		$("#lnkFace").attr("href","https://www.facebook.com/prox3.digital");
//	}
});