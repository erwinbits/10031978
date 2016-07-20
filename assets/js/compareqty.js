$(function() {
	$('form').keyup(function(evt) {
	    if($('#transfer').val() > $('#ending').val()){
	       	alert('Quantity to be transferred is greater than your total quantity');
        	evt.preventDefault();
	    }else{
	        // alert('values match');
	        // evt.preventDefault();
	    }
	});
});
