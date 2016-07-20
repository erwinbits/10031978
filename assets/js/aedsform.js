$(document).ready(function () {

				toggleFields();
				$('[name=expressForm]').change(function () {

					toggleFields();

				});


			//$('#noOfPackagesType').change(function(){
			$(document).on('change', '#noOfPackagesType', function(e){

				var parent = $(this).parent();
				var uom = parent.find('#uom');
				if($(this).val() != "other" ){
					
					uom.attr("disabled", "disabled");
				}
				else
				{
					uom.removeAttr("disabled");
				}

			})


			});


			function toggleFields() {

				if ($('[name=expressForm]').is(':checked'))
				{	
					console.log("yes");
					//GENERAL INFO
					
					$("#consigneeTIN").show();
					$("#consigneeName").show();
					$("#zoneLocation").show();
					$("#portOforigin").show();
					$("#purposeImport").show();
					$("#paymentProcedure").show();
					$("#manifestNo").show();
					$("#departureDate").show();
					$("#arrivalDate").show();
					$("#modeOfTransport").show();
					$("#countryOrigin").show();
					$("#deliveryRemarks").show();
					$("#additionalRemarks").show();
					$("#internalRef").show();
					$("#otherCost").show();
					$("#shipperName").show();
					$("#shipperAddress").show();
					$("#brokerName").show();
					$("#brokerAddress").show();
					$("#brokersTIN").show();
					$("#totalValue").show();
					$("#portOfEntry").show();
					$("#modeOfTransport").show();

					//FINANCIAL DETAILS
					$("#bankName").hide();
					$("#branchName").hide();
					$("#refNo").hide();
					$("#Delay").hide();
					$("#prepaidAcct").hide();
					
					//COST and CURRENCIES
					$("#transactionValue").hide();
					$("#extFreightCost").hide();
					$("#freightCostInsurance").hide();

					$("#deliveryTerms").hide();
					$("#paymentTerms").hide();
					$("#ofcOfClearance").hide();
					$("#tentativeRelease").hide();
					$("#registryNo").hide();
					$("#carrier").hide();
					$("#entryNo").hide();
					$("#transshipmentPort").hide();
					$("#AirBill").hide();
					$("#countryOfOrigin").hide();
					$("#paymentRefno").hide();
					$("#CountryOfExport").hide();
					$("#portOfDestination").hide();
					$("#portOfDestination").hide();
					$("#paymentDate").hide();
					$("#crno").hide();
					$("#portDischarge").hide();
					$("#POno").hide();
					$("#invoiceno").hide();
					$("#totalWeight").hide();
					$("#locationOfGoods").hide();
					$("#goodsLoc").hide();


					

				}
				else
				{	
					$("#appno").show();
					$("#consigneeTIN").show();
					$("#consigneeName").show();
					$("#zoneLocation").show();
					$("#IPno").show();
					$("#portOforigin").show();
					$("#purposeImport").show();
					$("#paymentProcedure").show();
					$("#manifestNo").show();
					$("#departureDate").show();
					$("#arrivalDate").show();
					$("#modeOfTransport").show();
					$("#countryOrigin").show();
					$("#deliveryRemarks").show();
					$("#additionalRemarks").show();
					$("#internalRef").show();
					$("#otherCost").show();
					$("#shipperName").show();
					$("#shipperAddress").show();
					$("#brokerName").show();
					$("#brokerAddress").show();
					$("#brokersTIN").show();
					$("#ofcOfClearance").show();
					$("#tentativeRelease").show();
					$("#cargo").show();
					$("#registryNo").show();
					$("#carrier").show();
					$("#entryNo").show();
					$("#transshipmentPort").show();
					$("#AirBill").show();
					$("#countryOrigin").show();
					$("#paymentRefno").show();
					$("#CountryOfExport").show();
					$("#portOfDestination").show();
					$("#paymentDate").show();
					$("#crno").show();
					$("#portDischarge").show();
					$("#invoiceno").show();
					$("#totalValue").show();
					$("#totalWeight").show();
					$("#deliveryTerms").show();
					$("#paymentTerms").show();
					$("#goodsLoc").show();
					$("#bankName").show();
					$("#branchName").show();
					$("#refNo").show();
					$("#Delay").show();
					$("#prepaidAcct").show();
					$("#portOfEntry").hide();
					$("#modeOfTransport").hide();


				}
			}
