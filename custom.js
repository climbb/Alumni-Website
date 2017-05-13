$(document).ready(function() {
	
	$("body").css("display", "none");

    $("body").fadeIn(500);
    
	$("a.trans").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("body").fadeOut(200, redirectPage);		
	});
		
	function redirectPage() {
		window.location = linkLocation;
	}
	
});
