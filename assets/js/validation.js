$(document).ready(function(){
	var $fields = $("#emanifest-form :input");
    $fields.keyup(function() {
        var $emptyFields = $fields.filter(function() {

            return $.trim(this.value) === "";
        });

        if (!$emptyFields.length) {
           
           if(!$("#save-button").hasClass("disabled")){
				$("#save-button").addClass("disabled");
			}
           
        } else {
        
			if($("#save-button").hasClass("disabled")){
				$("#save-button").removeClass("disabled");
			}
        }
    });
    
    var $requiredFields = $("#emanifest-form :input.input-required");
    $requiredFields.keyup(function() {
        var $emptyFields = $requiredFields.filter(function() {

            return $.trim(this.value) === "";
        });

        if (!$emptyFields.length) {
           
           $("#submit-button").prop("disabled", false);
           
        } else {
        
			$("#submit-button").prop("disabled", true);
           
        }
    });
	
	
	$("#reset-button").click(function() {
		$(this).closest('form').find("input[type=text], textarea").val("");
	});
	
	
	$(".input-number").keypress(function (event) { 
		var regex = new RegExp("^[0-9]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
		   event.preventDefault();
		   return false;
		}
	});
	
	// $(".input-number").keypress(function (key) {
		
	// 	if((key.charCode <= 48 || key.charCode >= 57)){
	// 		return false;
	// 	}

	// 	// var regex = new RegExp("^[0-9]+$");
	// 	// var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	// 	// if (!regex.test(key)) {
	// 	//    event.preventDefault();
	// 	//    return false;
	// 	// }

	// });
	
	
	$(".input-contact-number").keypress(function (event) { 
		var regex = new RegExp("^[0-9+*]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
		   event.preventDefault();
		   return false;
		}
	});
	
});