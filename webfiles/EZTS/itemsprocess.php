

		<?php
		
		if($_POST){

			if(isset($_POST['chk'])){
				include('eCert.php');	
			}elseif(isset($_POST['addPL'])){
				include('addItemgroup.php');
			}else{
				echo 'ERROR!';
			}
		}
		?>
							
<!-- JS -->
<script type="text/javascript" src="js/importables.js"></script>
<!-- JS -->

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/nominatedcompanies.js"></script>
<script src="js/validation.js"></script>
<!-- AUTOPOPULATE -->


<script type="text/javascript">
	function appointed_check(val) 
    {
		var status = (val != "Company")? true : false;
		for(i=0; i < chkBoxes.length; i++){
			chkBoxes[i].checked = false;
			chkBoxes[i].disabled = status;
		}
	}
	window.onload=function(){
		chkBoxes = document.getElementById('top_space').getElementsByTagName('input');
		appointed_check(0);
	}
</script>