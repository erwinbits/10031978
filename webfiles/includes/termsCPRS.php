<!DOCTYPE html>

<?php
use Functions\UserInfo;
use Tools\Connectivity\Database;
$userdata = new UserInfo;
$connection = new Database;


?>

<html lang="en">
<!-- EIP Modal -->
	<div class="modal fade" id="termsCPRS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
	      </div>
	      <div class="modal-body">
	      	CPRS
	        <p>Client will use the Services in accordance with applicable law, including data privacy laws, and standard conditions of use established by InterCommerce. InterCommerce will keep Client Data confidential and will not disclose to any third party without prior authorization.  InterCommerce may terminate access or take other actions it reasonably believes to be necessary to comply with the law or prevent damage to InterCommerce systems or customers or disruption of other InterCommerce customers’ use of the affected Service.</p>

			<p>Client is also accountable for the designation of the Users and the Company’s availment of the service.  It is the sole responsibility of the Client to notify Intercommerce in writing on the activation or termination of User’s access to the system. Unless UserIDs and Passwords are terminated, users, who may no longer be connected with the company or have been reassigned to perform other functions, shall continue to have access to confidential transaction data of the company.</p>

			<p>Client also holds InterCommerce free and harmless from any liability arising from any access by the Users to the system whether arising from the Company or from third parties.</p>
			<br>
			<br>
			<div class="form-group">
					<label class="control-label col-md-3" for="role">Roles:</label>
					<div class="col-md-3">
						<select name="role" class="selectpicker" data-live-search="true" id="role">
							<option value = "Importer" selected>Importer</option>
							<option value = "Broker">Broker</option>
							<option value = "Exporter">Exporter</option>
							<option value = "Warehouse">Warehouse</option>
							<option value = "Arrastre Operator">Arrastre Operator</option>
							<option value = "One time Importer">One time Importer</option>
							<option value = "Agency">Agency</option>				
						</select>
					</div>
				</div>
				<br>
				<br>
				<div id="agency" class="form-group">

					<label class="control-label col-md-3" for="role">Agency:</label>
					<div class="col-md-3">
						<select class="agency" data-live-search="true" name="agency">
							<option value = "" selected>Select</option>
							<option value = "peza">PEZA</option>
							<option value = "sdma">SDMA</option>			
						</select>
					</div>
				</div>
				<script>
					$(document).ready(function () {
						toggleFields(); 

						$("#role").change(function () {

							toggleFields();

						});

					});

					function toggleFields() {
						if ($("#role").val() == "Agency")
						{	
							$("#agency").show();
						}
						else
						{	
							$("#agency").hide();
						}
					}

				</script>
			<div class="form-group">
					<label class="control-label col-md-3" for="isa">Scanned ISA*:</label>
					<div class="col-md-7">
						<input id="isa" name="isa" type="file" class="file-loading" required>
						<script>
							$(document).on('ready', function() {
								$("#isa").fileinput({
									overwriteInitial: false,
									maxFileSize: 500,
									initialCaption: "Scanned ISA",
									allowedFileExtensions: ["jpg", "gif", "png", "pdf"],
									showUpload: false

								});
							});
						</script>
					</div>
					<div class="help-block with-errors"></div>
				</div>
			<div class="form-group">
					<label class="control-label col-md-3" for="additional">Additional Documents:</label>
					<div class="col-md-7">
						<input id="additional" name="additional" type="file" class="file-loading">
						<script>
							$(document).on('ready', function() {
								$("#additional").fileinput({
									overwriteInitial: false,
									maxFileSize: 500,
									initialCaption: "Additional",
									allowedFileExtensions: ["jpg", "gif", "png", "pdf"],
									showUpload: false

								});
							});
						</script>
					</div>
					<div class="help-block with-errors"></div>
				</div>
			<?php

			if($cprsstatus == 2){ 
				$id = $_SESSION['userid'];

				$remarks = $subscribe->getRemarks($id);

				?>
			 <div class="panel panel-default">
                            <div class="panel-heading text-center"><strong>Remarks</strong></div>
                            <div class="panel-body">
                                   <table width="100%" cellspacing = "10px" style="margin:0 auto;">
                                    <tr>
                                        <td>
                                           <?php echo $remarks; ?>
                                        </td>
                                    </table>
                            </div>
                        </div>
			<?php }
			?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" name="CPRSService" class="btn btn-primary">Apply for CPRS</button>
	      </div>
	    </div>
	  </div>
	</div>
</html>
