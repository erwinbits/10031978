<?php
	use Functions\eIP;
	use Functions\eZTD;
	use Functions\UserAccount;
	use Functions\Item;
	use Functions\AEDS;
	use View\EIPviews;
	$eip = new eIP;
	$eztd = new eZTD;
	$account = new UserAccount;
	$show = new EIPviews;
	$id = $_SESSION['userid'];
	$zcode = $eztd->getZone($id);
	$itemCount = count($_POST['chk']);
	


	$countries = $show->listOfCountries();
?>
<!-- JS -->

<script src="js/jquery.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sb-admin-2.js" rel="stylesheet"></script>
<script src="js/metisMenu.min.js"></script>

<!-- AUTOPOPULATE -->
<link href="css/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui.js"></script>
<script src="js/hscodeautocom.js"></script>
<script src="js/aedsform.js"></script>




<br>
<h2>e-AEDs Form</h2>
<hr>	
<h4>To apply for e-IP, please fill up accurately and completely.</h4>
<form class="form-horizontal" id="eIPForm" name="eIPForm" action="aedsController" method="POST">
		<?php $appno = "APIP-" . substr(time(),4) . "-" . rand(1000, 9999) . "-" . date("Y");?>
		<?php $EDno = $zcode . '-'. rand(000000, 999999) . "-" . date('y') . "I"; ?>
		<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>GENERAL INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="expressForm" class="form-group">
							<label class="control-label col-sm-3">eIP Express Form</label>
							<div class="col-sm-8">
								<input type="checkbox" value="checked" name="expressForm">
							</div>
						</div>

						<div id="itemNo" class="form-group">
							<label class="control-label col-sm-3">No. of Items</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder=""  value="<?php echo $itemCount; ?>" name="noOfItems" placeholder="">
							</div>
						</div>
						<br>

						<div id="ofcOfClearance" class="form-group">
							<label class="control-label col-sm-3">Office of Clearance</label>
							<div class="col-sm-8">
								<select name="lstOffClear" class="form-control">                        
									<option value="" Selected>--SELECT HERE--</option>
			                        <option value="P01D"> Baguio EPZA </option>
			                        <option value="CCC"> BOC - CUSTOMS COMPUTER CENTER </option>
			                        <option value="P02A7"> CAVITE-EPZA </option>
			                        <option value="P02A3"> Clark (change to P14)</option>
			                        <option value="P07A"> Dumaguete</option>
			                        <option value="P02A1"> Food Terminal Inc. (FTI) </option>
			                        <option value="P02AH"> Harbour Centre Port Terminal Inc</option>
			                        <option value="P02AA"> Invalid Port Code - Do not use </option>
			                        <option value="P05A"> Jose Panganiban</option>
			                        <option value="P02A8"> Laguna EPZA </option> 
			                        <option value="P02A9"> Luisita (Tarlac) EPZA </option>
			                        <option value="P03A"> Manila Domestic</option>
			                        <option value="P02B"> Manila Intl Container Port </option>
			                        <option value="P03"> Ninoy Aquino Intl Airport </option>
			                        <option value="NONE"> NONE</option>
			                        <option value="P02BN"> North Harbour</option>
			                        <option value="P15"> Port of Aparri</option>
			                        <option value="P04"> Port of Batangas</option>
			                        <option value="P10"> Port of Cagayan de Oro </option>
			                        <option value="P07"> Port of Cebu </option>
			                        <option value="P14"> Port of Clark</option>
			                        <option value="P12"> Port of Davao</option>
		                        </select>
		                    </div>
		                </div>


		                <div id="purpose" class="form-group">
							<label class="control-label col-sm-3">Purpose of Importation</label>
							<div class="col-sm-8">
								<select name="purpose" class="form-control"> 
		   
										<option value="" Selected>--SELECT HERE--</option>
				                        <option value="Capital Equipment"> Capital Equipment</option>             
				                        <option value="Constructive Importation"> Constructive Importation</option>
				                        <option value="Constructive/Indirect Export"> Constructive/Indirect Export</option>     
				                        <option value="FOR MAINTENANCE REPAIR AND OVERHAUL OF AIRCRAFT"> FOR MAINTENANCE REPAIR AND OVERHAUL OF AIRCRAFT</option>
				                        <option value="For Production Research And Development"> For Production Research And Development</option>
				                        <option value="Machineries and spare parts for production use"> Machineries and spare parts for production use</option>
				                        <option value="Materials For Production Use"> Materials For Production Use</option>
				                        <option value="Production use"> Production use</option>
				                        <option value="Return to Vendor"> Return to Vendor</option>
				                        <option value="Returned shipments for repair"> Returned shipments for repair</option>
				                        <option value="Spare Parts / MRO"> Spare Parts / MRO</option>
				                        <option value="Subcontracting"> Subcontracting</option>
				                        <option value="Supply"> Supply</option>
				                        <option value="Temporary Transfer"> Temporary Transfer</option>
				                        <option value="Use for  Electronic Circuit Boards"> Use for  Electronic Circuit Boards</option>
				                        <option value="Use for Electronic Equipments"> Use for Electronic Equipments</option>
				                        <option value="Use for PCB/IC Test Equipments"> Use for PCB/IC Test Equipments</option>
				                        <option value="Warehousing/Logistics Sale"> Warehousing/Logistics Sale</option>
				               
				               </select>
				            </div>
				       	</div>

				       	<div id="paymentProcedure" class="form-group">
							<label class="control-label col-sm-3">Payment Procedure</label>
							<div class="col-sm-8">
								<select name="paymentProcedure" class="form-control"> 
		   
									<option value="" Selected>--SELECT HERE--</option>
				                  	<option value="CASHADV"> Agency Cash Advance</option>
									<option value="LBPEPAY-0003" >LANDBANK - BROKER Account</option>
									<option value="LBPEPAY-1024" >LANDBANK - IMPORTER Account</option>
									<option value="UBPEPAY-0340" >UNIONBANK EPAYMENT</option>
				               
				               </select>
				            </div>
				       	</div>

				       	<div id="manifestNo" class="form-group">
							<label class="control-label col-sm-3">Manifest Number</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Manifest Number" name="manifestNo">
							</div>
						</div>

						<div id="departureDate" class="form-group">
							<label class="control-label col-sm-3">Date of Departure</label>
							<div class="col-sm-8">
								<input class="form-control" type="date" value="" name="departureDate" required >
							</div>
						</div>

						<div id="arrivalDate" class="form-group">
							<label class="control-label col-sm-3">Date of Arrival</label>
							<div class="col-sm-8">
								<input class="form-control" type="date" value="" name="arrivalDate" required >
							</div>
						</div>

						<div id="tentativeRelease" class="form-group">
							<label class="control-label col-sm-3">Tentative Release</label>
							<div class="col-sm-8">
								<input class="form-control" type="date" value="" name="tentativeRelease">
							</div>
						</div>


					</table>	
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>SHIPPER / SUPPLIER INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">
						
						<div id="shipperName" class=" form-group">
							<label class="control-label col-sm-3">Name of Shipper</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Shipper's Name"  name="shipperName" required>
							</div>
						</div>

						<div id="shipperAdd1" class="form-group">
							<label class="control-label col-sm-3">Shipper Address</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Unit 501, Pearlbank, Valero St."  name="shipperAdd1" required>
							</div>
						</div>

						<div id="shipperAdd2" class="form-group">
							<label class="control-label col-sm-3"></label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder= "Makati City"  name="shipperAdd2" required>
							</div>
						</div>
						<div id="shipperAdd3" class="form-group">
							<label class="control-label col-sm-3"></label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Phillipines 1650"  name="shipperAdd3" required>
							</div>
						</div>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>BROKER INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="brokerName" class="form-group">
							<label class="control-label col-sm-3">Name of Broker</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Broker's Name"  name="brokerName" required >
							</div>
						</div>

						<div id="brokersTIN" class="form-group">
							<label class="control-label col-sm-3">Broker\'s TIN</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Broker Tax Identification Number" maxlength="12" name="brokersTIN" required >
							</div>
						</div>

						<div id="brokerAdd1" class="form-group">
							<label class="control-label col-sm-3">Broker Address</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="No. 1 Matalino St., Baranggay Matiwasay"  name="brokerAdd1" required>
							</div>
						</div>

						<div id="brokerAdd2" class="form-group">
							<label class="control-label col-sm-3"></label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="San Antonio, Village, Makati City"  name="brokerAdd2" required>
							</div>
						</div>

						<div id="brokerAdd3" class="form-group">
							<label class="control-label col-sm-3"></label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Philippines 1650"  name="brokerAdd3" required>
							</div>
						</div>
					</table>
				</div>
			</div>
		
			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>CARRIER INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="cargo" class="form-group">
							<label class="control-label col-sm-3">Vessel/Aircraft ID</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Cargo" name="cargo">
							</div>
						</div>

						<div id="registryNo" class="form-group">
							<label class="control-label col-sm-3">Registry No</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Registry Number" name="registryNo">
							</div>
						</div>

						<div id="carrier" class="form-group">
							<label class="control-label col-sm-3">Local Carrier</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Local Carrier" name="carrier">
							</div>
						</div>

					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>COUNTRY OF EXPORT INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="CountryOfExport" class="form-group">
							<label class="control-label col-sm-3">Country Of Export</label>
							<div class="col-sm-8">
								<select class="form-control" type="text" placeholder="Country of Export" name="CountryOfExport">
									<option value="">--SELECT FROM LIST--</option>';
									<?php
										foreach($countries as $key => $value){
											echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
										}
									?>
								</select>
							</div>
						</div>

						<div id="entryNo" class="form-group">
							<label class="control-label col-sm-3">T/W or W/S Entry No</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Entry Number" name="entryNo">
							</div>
						</div>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>PORT AND GOODS INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="transshipmentPort" class="form-group">
							<label class="control-label col-sm-3">Transshipment Port</label>
							<div class="col-sm-8">
								<select name="transshipmentPort" class="form-control">                        
									<option value="" Selected>--SELECT HERE--</option>
			                        <option value="P01D"> Baguio EPZA </option>
			                        <option value="CCC"> BOC - CUSTOMS COMPUTER CENTER </option>
			                        <option value="P02A7"> CAVITE-EPZA </option>
			                        <option value="P02A3"> Clark (change to P14)</option>
			                        <option value="P07A"> Dumaguete</option>
			                        <option value="P02A1"> Food Terminal Inc. (FTI) </option>
			                        <option value="P02AH"> Harbour Centre Port Terminal Inc</option>
			                        <option value="P02AA"> Invalid Port Code - Do not use </option>
			                        <option value="P05A"> Jose Panganiban</option>
			                        <option value="P02A8"> Laguna EPZA </option> 
			                        <option value="P02A9"> Luisita (Tarlac) EPZA </option>
			                        <option value="P03A"> Manila Domestic</option>
			                        <option value="P02B"> Manila Intl Container Port </option>
			                        <option value="P03"> Ninoy Aquino Intl Airport </option>
			                        <option value="NONE"> NONE</option>
			                        <option value="P02BN"> North Harbour</option>
			                        <option value="P15"> Port of Aparri</option>
			                        <option value="P04"> Port of Batangas</option>
			                        <option value="P10"> Port of Cagayan de Oro </option>
			                        <option value="P07"> Port of Cebu </option>
			                        <option value="P14"> Port of Clark</option>
			                        <option value="P12"> Port of Davao</option>
		                        </select>
		                    </div>
		                </div>

		                <div id="portOfDestination" class="form-group">
							<label class="control-label col-sm-3">Port Of Destination</label>
							<div class="col-sm-8">
								<select class="form-control" name="portOfDestination" required>

									<option value="" Selected>--SELECT HERE--</option>
			                        <option value="Z500S"> 500 Shaw Zentrum</option>
			                        <option value="Z6750"> 6750 Ayala Avenue Bldg.</option>   
			                        <option value="ZA001"> 6750 AYALA AVENUE BLDG.</option>  
			                        <option value="ZA002"> 6780 AYALA AVENUE BLDG.</option>
			                        <option value="Z6780"> 6780 Ayala Avenue Bldg.</option>
			                        <option value="Z6788"> 6788 Ayala Avenue Bldg.</option>
			                        <option value="ZA003"> 6788 AYALA AVENUE BLDG.</option>
			                        <option value="ZADGI"> A. D. Gothong IT Center</option>
			                        <option value="ZABCC"> Abreeza Corporate Center</option>
			                    </select>
			                </div>
			            </div>

			            <div id="locationOfGoods" class="form-group">
							<label class="control-label col-sm-3">Location Of Goods</label>
							<div class="col-sm-8">
								<select class="form-control" name="locationOfGoods" required>
									<option value="" Selected>--SELECT HERE--</option>
									<option value="55"> 55 - PHILIPPINE AIRLINES INC.</option>
									<option value="999"> 999 - IMPORTER'S PREMISE</option>
                        			<option value="A02"> A02 - PEOPLE'S AIRCARGO & WAREHOUSING CO. INC., </option>
                        			<option value="A03"> A03 - PHILIPPINE SKYLANDERS INC (PSI)</option>
                       				<option value="A04"> A04 - DELBROS INC.</option>
                       			</select>
							</div>
						</div>

						<div id="additionalRemarks" class="form-group">
							<label class="control-label col-sm-3">Additional Remarks</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Additional Remarks" name="additionalRemarks">
							</div>
						</div>

						<div id="deliveryRemarks" class="form-group">
							<label class="control-label col-sm-3">Delivery Remarks</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Delivery Remarks" name="deliveryRemarks">
							</div>
						</div>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading text-center"><strong>PORT AND GOODS INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div id="AirBill" class="form-group">
							<label class="control-label col-sm-3">Airway Bill/BOL</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="AirBill"  name="AirBill" placeholder="Air Bill">
							</div>
						</div>
						<br>

						<div id="countryOrigin" class="form-group">
							<label class="control-label col-sm-3">Country of Origin</label>
							<div class="col-sm-8">
								<select class="form-control" name="countryOrigin" placeholder="Country of Origin">
									<option value="">--SELECT FROM LIST--</option>';
									<?php
										foreach($countries as $key => $value){
											echo '<option value="'.$key.'">'.$value.'</option>'; 
										} 
									?>
								
								</select>
							</div>
						</div>

						<div id="portOforigin" class="form-group">
							<label class="control-label col-sm-3">Port Entry</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="portOforigin" placeholder="Port of Origin" required >
							</div>
						</div>

						

						<div id="modeOfTransport" class="form-group">
							<label class="control-label col-sm-3">Mode of Transport</label>
							<div class="col-sm-8">
								<select class="form-control" name="modeOfTransport" placeholder="Mode of Transport">
									<option name="SEA">SEA</option>
									<option name="AIR">AIR</option>
								</select>
							</div>
						</div>

						

						

						



						
						<div id="portDischarge" class="form-group">
							<label class="control-label col-sm-3">Port of Discharge</label>
						<br>


							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Port of Discharge"  name="portDischarge">
							</div>
						</div>

						<div id="POno" class="form-group">
							<label class="control-label col-sm-3">P.O. Number</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="P.O. Number"  name="POno">
							</div>
						</div>

						<div id="invoiceno" class="form-group">
							<label class="control-label col-sm-3">Invoice Number</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" value="" placeholder="Invoice Number"  name="invoiceno">
							</div>
						</div>


						<div id="OfcClearance" class="form-group">
							<label class="control-label col-sm-3">Office Of Clearance</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Office Of Clearance" name="OfcClearance" value="">
							</div>
						</div>

						<div id="purposeImport" class="form-group">
							<label class="control-label col-sm-3">Purpose of Importation</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Purpose of Importation" name="purposeImport">
							</div>
						</div>

						<div id="paymentProcedure" class="form-group">
							<label class="control-label col-sm-3">Payment Procedure</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Payment Procedure" name="paymentProcedure">
							</div>
						</div>

						


						

						

						

						
                        
                       
							</div>
						</div>

						

						

						<div id="internalRef" class="form-group">
							<label class="control-label col-sm-3">Internal Reference</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Internal Reference" name="internalRef">
							</div>
						</div>

						<div id="otherCost" class="form-group">
							<label class="control-label col-sm-3">Other Cost</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" placeholder="Other Cost" name="otherCost">
							</div>
						</div>
					</table>
				</div>
				<div class="panel-heading text-center"><strong>BANK INFORMATION</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

					<div id="bankName" class="form-group">
						<label class="control-label col-sm-3">Bank Name</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Landbank of the Philippines"  name="bankName" required>
						</div>
					</div>

					<div id="branchName" class="form-group">
						<label class="control-label col-sm-3">Bank Branch Name</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Makati City Branch"  name="branchName" required>
						</div>
					</div>

					<div id="refNo" class="form-group">
						<label class="control-label col-sm-3">Reference Number</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="SNS-19181"  name="refNo" required>
						</div>
					</div>

					<div id="Delay" class="form-group">
						<label class="control-label col-sm-3">Delay</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder=""  name="Delay" required>
						</div>
					</div>

					<div id="prepaidAcct" class="form-group">
						<label class="control-label col-sm-3">Prepaid Account</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder=""  name="prepaidAcct" required>
						</div>
					</div>

					<div id="internalRef" class="form-group">
						<label class="control-label col-sm-3">Internal Reference</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" placeholder="Internal Reference" name="internalRef">
						</div>
					</div>
					</table>
				</div>
				<div class="panel-heading text-center"><strong>COST AND CURRENCIES</strong></div>
				<div class="panel-body">
					<table style="margin:0 auto;">

						<div class="row">
							<div id="transactionValue" class="form-group">
								<label class="control-label col-sm-3">Transaction Value</label>
									<div class="col-sm-4">
										<input class="form-control" type="number" min="0" max="999999999999" name="transactionValue">
									</div>
									<div class="col-sm-2">
										<select class="form-control" type="text" name="transactionValueCurr">
											<option value="USD" Selected>USD</option>
											<option value="PH">PH</option>
											<option value="SGD">SGD</option>

										</select>
									</div>
							</div>
							<div id="extFreightCost" class="form-group">
								<label class="control-label col-sm-3">External Freight Cost</label>
									<div class="col-sm-4">
										<input class="form-control" type="number" min="0" max="999999999999" name="extFreightCost">
									</div>
									<div class="col-sm-2">
										<select class="form-control" type="text" name="extFreightCostCurr">
											<option value="USD" Selected>USD</option>
											<option value="PH">PH</option>
											<option value="SGD">SGD</option>

										</select>
									</div>
							</div>
							<div id="freightCostInsurance" class="form-group">
								<label class="control-label col-sm-3">Freight Cost Insurance</label>
									<div class="col-sm-4">
										<input class="form-control" type="number" min="0" max="999999999999" name="freightCostInsurance">
									</div>
									<div class="col-sm-2">
										<select class="form-control" type="text" name="freightCostInsuranceCurr">
											<option value="USD" Selected>USD</option>
											<option value="PH">PH</option>
											<option value="SGD">SGD</option>

										</select>
									</div>
							</div>

							<div id="otherCost" class="form-group">
								<label class="control-label col-sm-3">Other Cost</label>
									<div class="col-sm-4">
										<input class="form-control" type="number" min="0" max="999999999999" name="otherCost">
									</div>
									<div class="col-sm-2">
										<select class="form-control" type="text" name="otherCostCurr">
											<option value="USD" Selected>USD</option>
											<option value="PH">PH</option>
											<option value="SGD">SGD</option>

										</select>
									</div>
							</div>
						</div>
					</table>
				</div>
			</div>
			</div>

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							ITEM INFORMATION
							</a>
						</h4>
					</div>

					<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="table-responsive">

								<table class="table">


									<thead align="center">
										<th>#</th>
										<th>ITEM INFO</center></th>

										<th>ITEM QUANTITY</th>

										<th>CO CODE COLUMN</th>

										<th>ITEM VALUE COLUMN</th>
										
										<th>Actions</th>

									</thead>

									<tbody id="p_scents">
										<?php 
										$itemID = $_POST["chk"];

										
										$item = new Item;
										$aeds = new AEDS;
										$count = 1;
										foreach($itemID as $data)
										{


											echo "<script>console.log('".$data."')</script>";
											$eipsitem = $data;

											$itemarray = $aeds->getExportablesById($data);



											foreach($itemarray as $itemineip)
											{


												$itemItemID = $itemineip['ItemID'];
												$itemHSCODE = $itemineip['HSCODE'];
												$itemTAR_Ext = $itemineip['TAR_Ext'];
												$itemDescription = $itemineip['description'];
												$itemName = $itemineip['itemName'];
												$itemItemCode = $itemineip['itemCode'];
												$itemItemCategeory = $itemineip['itemCategory'];
												$itemItemRegAct = $itemineip['registeredActivity'];
												$itemItemLOANumber = $itemineip['loaNumber'];
												$itemItemLOAValidity = $itemineip['loaValidity'];
												$TAR_DSC = $item->getTarDSC($itemHSCODE, $itemTAR_Ext);
												$itemFrequency = $itemineip['frequency'];


										

												?>

												<tr>
													<td><?php echo $count; $count++;?></td>
													
													<td>
														<small>Item Name</small>
														<input class="form-control input-required" value="<?php echo $itemName; ?>" type="text" name="itemName[]" placeholder="Item Name" required readonly>
														<br>
														<small>Item Code</small>
														<input class='form-control input-required' type='text' name='itemCode[]' value='<?php echo $itemItemCode; ?>' readonly>
														<br>
														<small>Item Description</small>
														<input class='form-control input-required' type='text' name='description[]' value='<?php echo $itemDescription; ?>' readonly>
														<br>
														<small>HS Code</small>
														<input id="hscode" class="hscode form-control" type="text" placeholder="Type product name/code here" name="HSCODE[]" value='<?php echo  $itemHSCODE.".".$itemTAR_Ext.""; ?>' required readonly><br>

													</td>	
													
													<td>
														
														<small>No. of Packages</small>
														<input class="noOfPackages form-control" type="number" name="noOfPackages[]" value='<?php echo  ""; ?>' required tabindex="-1"/ min="1" ><br>

														<small>Packages Type</small>
														<select class="noOfPackagesType form-control" name="noOfPackagesType[]"  id="noOfPackagesType" tabindex="-1"/  >
															<option value="AE" >AE - AEROSOL</option>
															<option value="42" >42 - AEROSOL,ATOMIZER,BOTTL...</option>
															<option value="AM" >AM - AMPOULE(NON-PROTECTED)</option>
															<option value="AP" >AP - AMPOULE(PROTECTED)</option>
															<option value="other" >Other</option>
														</select>
														<br>

														<small>UOM</small>
															<select class='form-control input-required' type='text' name='UOM[]' placeholder='Please select' id="uom" disabled>
																<option name='' value=''> -UOM- </option>
																<option name='UOM[]' value='ampoule'> ampoule </option>
																<option name='UOM[]' value='angstroms'> angstroms </option>
																<option name='UOM[]' value='assembly'> assembly </option>
																<option name='UOM[]' value='barns'> barns </option>
																<option name='UOM[]' value='barrels'> barrels </option>
																<option name='UOM[]' value='base box'> base box </option>
																<option name='UOM[]' value='bushels'> bushels </option>
																<option name='UOM[]' value='carats'> carats </option>
																<option name='UOM[]' value='centilitres'> centilitres </option>
																<option name='UOM[]' value='centimetres'> centimetres </option>
																<option name='UOM[]' value='chains'> chains </option>
																<option name='UOM[]' value='circular inches'> circular inches </option>
																<option name='UOM[]' value='circular mils'> circular mils </option>
																<option name='UOM[]' value='cubic feet'> cubic feet </option>
																<option name='UOM[]' value='cubic inches'> cubic inches </option>
																<option name='UOM[]' value='cubic metres'> cubic metres </option>
																<option name='UOM[]' value='cubic yards'> cubic yards </option>
																<option name='UOM[]' value='decilitres'> decilitres </option>
																<option name='UOM[]' value='dozen'> dozen </option>
																<option name='UOM[]' value='feet'> feet </option>
																<option name='UOM[]' value='fluid ounces'> fluid ounces </option>
																<option name='UOM[]' value='furlongs'> furlongs </option>
																<option name='UOM[]' value='gallons'> gallons </option>
																<option name='UOM[]' value='gills'> gills </option>
																<option name='UOM[]' value='grains'> grains </option>
																<option name='UOM[]' value='gram'> gram </option>
																<option name='UOM[]' value='inches'> inches </option>
																<option name='UOM[]' value='kilograms'> kilograms </option>
																<option name='UOM[]' value='kit'> kit </option>
																<option name='UOM[]' value='litres'> litres </option>
																<option name='UOM[]' value='metres'> metres </option>
																<option name='UOM[]' value='miles'> miles </option>
																<option name='UOM[]' value='milligrams'> milligrams </option>
																<option name='UOM[]' value='millilitres'> millilitres </option>
																<option name='UOM[]' value='millimetres'> millimetres </option>
																<option name='UOM[]' value='nanometres'> nanometres </option>
																<option name='UOM[]' value='newtons'> newtons </option>
																<option name='UOM[]' value='ounces'> ounces </option>
																<option name='UOM[]' value='pad'> pad </option>
																<option name='UOM[]' value='panel'> panel </option>
																<option name='UOM[]' value='peck'> peck </option>
																<option name='UOM[]' value='pieces'> pieces </option>
																<option name='UOM[]' value='pints'> pints </option>
																<option name='UOM[]' value='pounds'> pounds </option>
																<option name='UOM[]' value='quart'> quart </option>
																<option name='UOM[]' value='slugs'> slugs </option>
																<option name='UOM[]' value='square cm'> square cm </option>
																<option name='UOM[]' value='square feet'> square feet </option>
																<option name='UOM[]' value='square inches'> square inches </option>
																<option name='UOM[]' value='square metres'> square metres </option>
																<option name='UOM[]' value='square mm'> square mm </option>
																<option name='UOM[]' value='square yards'> square yards </option>
																<option name='UOM[]' value='stones'> stones </option>
																<option name='UOM[]' value='strand'> strand </option>
																<option name='UOM[]' value='strip'> strip </option>
																<option name='UOM[]' value='tonnes'> tonnes </option>
																<option name='UOM[]' value='tons'> tons </option>
																<option name='UOM[]' value='troy ounces'> troy ounces </option>
																<option name='UOM[]' value='units'> units </option>
																<option name='UOM[]' value='vial'> vial </option>
																<option name='UOM[]' value='yards'> yards </option>
															</select>   
															<br>

														<small>Supplementary Value</small>
														<input class="supplementaryValueOne form-control" type="number" name="supplementaryValueOne[]" value='<?php echo  ""; ?>' required tabindex="-1"/  min="1"><br>


														

														<input type='hidden' name='itemID[]' value='<?php echo $itemItemID; ?>' readonly>
														<input type='hidden' name='itemCategory[]' value='<?php echo $itemItemCategeory; ?>' readonly>
													</td>
													
													
													
													<td>
														
														<small>CO Code</small>
														<select class="form-control" name="countryOrigin[]" placeholder="Country of Origin">
															<option value="">--SELECT FROM LIST--</option>';
															<?php
																foreach($countries as $key => $value){
																	echo '<option value="'.$key.'">'.$key.'-'.$value.'</option>'; 
																} 
															?>
													
														</select>
														<br>
														<small>Preference</small>
														<select class="preference form-control input-required"  name="preference[]" >
										
															<option value="AFTA">(AFTA) - ASEAN FREE TRADE AREA</option>
															<option value="AIJV">(AIJV) - ASEAN Industrial Joint Venture</option>
															<option value="APTA">(APTA) - Asian Preferencial Trade Agreement</option>
															<option value="BOI">(BOI-10%) 10% WHEN IMPORTED WITH BOI CERT</option>
														</select>


														</td>
														<td>

															<small>Item Gross Weight</small>
															<input class="form-control input-required" value='<?php echo ""; ?>' type="number" name="itemGrossWeight[]" placeholder="Item Gross Weight" min="1" required ><br>
															<small>Item Net Weight</small>
															<input class="form-control input-required" value='<?php echo ""; ?>' type="number" name="itemNetWeight[]" placeholder="Item Net Weight" min="1"  required ><br>
															<small>Item Invoice Value</small>
															<input class="form-control input-required " width="50" value='<?php echo ""; ?>' type="number" name="itemInvoiceValue[]" placeholder="Item Invoice Value" min="1" required ><br>
															<small>Item Invoice Value Currency</small>

															<select class="form-control" name="itemInvoiceValueCurrency[]">
															<option value="USD">USD<option>
															<option value="PHP">PHP<option>
															<option value="SGD">SGD<option>
															</select>

														</td>
														


														<td align="center"><button class="addScnt btn btn-success btn-md" type="button"><i class="fa fa-plus"></i></button></td>
														<td align="center"><button class="remScnt btn btn-danger btn-md" type="button"><i class="fa fa-minus"></i></button></td>
														
													</tr>
													<?php
												}
											}
											?>	
										</tbody>

									</table>
									</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>

		<div class="form-group text-right">
			<hr>
			<button type="button" class="btn btn-danger btn-number" title="Remove" data-type="minus" onClick="deleteRow('dataTable')">
				<span class="glyphicon glyphicon-minus-sign"></span>
			</button>&nbsp; | &nbsp;
		  
			<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Please review the details of your submission. If all is well, please click OK.')" <?php if(!isset($_POST['chk'])){echo 'disabled';}?>>Submit</button>
			<input type="hidden" name="appno" value="<?php echo $appno;?>">
		</div>
	</form>
</div>
<!-- General -->
	</div>
