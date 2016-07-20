
$(document).ready(function(){

	$('[type=password]').keypress(function(e) {
		var $password = $(this),
			tooltipVisible = $('.tooltip').is(':visible'),
			s = String.fromCharCode(e.which);
		
		// check if capslock is on.
		if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
		  if (!tooltipVisible)
			  $password.tooltip('show');
		} else {
		  if (tooltipVisible)
			  $password.tooltip('hide');
		}
		
		// hide the tooltip when moving away from the password field
		$password.blur(function(e) {
			$password.tooltip('hide');
		});
	});
	
	$('body').bind('contextmenu', function(e) {
		return false;
	}); 

});