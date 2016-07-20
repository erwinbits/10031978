<?php
require("../../library.php");
use Functions\eZTD;
use Functions\UserAccount;
use Functions\Item;

$ecert = new eZTD;
$account = new UserAccount;
$itemfunction = new Item;


$ecertno = $_GET['ecertno'];
//$ecertno = 'ELSE-LPT1-EC-716380-15-16A';
$ELSEname = $_GET['ELSEname'];
//$ELSEname = 'TEST ELSE';
$id = $_SESSION['userid'];
$DateofReg = $ecert->getPEZACORDateofReg($id);

$ecertinfo = $ecert->getECERTinfo($ecertno);
foreach($ecertinfo as $val){
    $CEzone = $val['CEzone'];
    $appnum = $val['appno'];
    $appDate = $val['appDate'];
}
$ecertitems = $ecert->eCERTitems($ecertno);
$repname = $ecert->getAuthorisedRep($id);
$datenow = date('Y-m-d h:i:s', time());
$zonename = $ecert->getZoneName();
$elsePEZACOR = $ecert->getELSEpezaCOR($ELSEname);
$elseaddress = $ecert->getELSEadd($ELSEname);
$zoneloc =  $ecert->getZoneEcozoneName($CEzone);



// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/tcpdf.php');



// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 18);
        // Title
        //$this->Cell(0, 15, 'Test Print', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PEZA');
$pdf->SetTitle('e-Certificate');
$pdf->SetSubject('e-Certificate');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data


$PDF_HEADER_LOGO = "logo_peza.jpg";;//any image file. check correct path.
$PDF_HEADER_LOGO_WIDTH = "20";
$PDF_HEADER_TITLE = "PHILIPPINE ECONOMIC ZONE AUTHORITY";
$PDF_HEADER_STRING = "PEZA Building Roxas Boulevard  \n"
. "corner San Luis St., Pasay City, 1300\n"
. "www.peza.gov.ph";
$pdf->SetHeaderData(PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$PDF_FONT_NAME_MAIN = 'helvetica';
$PDF_FONT_SIZE_MAIN = '9';
$pdf->setHeaderFont(Array($PDF_FONT_NAME_MAIN, '', $PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(25, PDF_MARGIN_TOP, 25);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);


// add a page
$pdf->AddPage();


	foreach($repname as $val){
		
$html = '<div style="text-align:center"><h2>e-Certificate</h2><br /></div>
<br>
<br>
<table border = "0">
    <tr>
        <td> PEZA Enterprise :  <strong>'.$val['companyName'].' </strong></td>';
							}
		foreach($ecertinfo as $ecertdata){
$html .= '<td> e-Certificate No &nbsp; : <strong>'.$ecertdata['ecertno'].' </strong></td>
    </tr>
   

    <tr>
        <td> Zone Location &nbsp;&nbsp;&nbsp; :  <strong>'.$ecertdata['CEzone'].' </strong></td>
        <td> Date Submitted &nbsp;&nbsp; : <strong>'.$ecertdata['appDate'].' </strong></td>
    </tr>
   

    <tr>
        <td> </td>
        <td> Date Approved &nbsp;&nbsp; : <strong>'.$ecertdata['approvalDate'].' </strong></td>
    </tr>
</table>
<br>

<p style="text-align:justify">';


	$appointedBy = $ecert->geteCERTappointedBy($ecertno);
	
    if($appointedBy == 'Company'){
        $checkcompany = 'checked';
        $checkcompany2 = '';
        $checksupplier ='';
    }elseif($appointedBy == 'Company2'){
        $checkcompany = '';
        $checkcompany2 = 'checked';
        $checksupplier ='';
    }else{
        $checkcompany = '';
        $checkcompany2 = '';
        $checksupplier ='checked';
    }
	
	
	$procurement = $ecert->getAllFromProcurementTable($ecertno);
		
        foreach($procurement as $data){
			$direct = $data['directImport'];
			$indirect = $data['indirectImport'];
			$domestic = $data['domesticEnterprise'];
			$peza = $data['peza'];
			$nonpeza = $data['nonpeza'];	
		}
		
		## --- PROCUREMENT --- ##
		if($direct == '1'){
			$check = 'checked';
		}else{
			$check = '';
		}
	
		if($indirect == '1'){
			$check2 = 'checked';
		}else{
			$check2 = '';
		}
		
		if($domestic == '1'){
			$checkd = 'checked';
		}else{
			$checkd = '';
		}
		
			## --- SOURCE --- ##
			if($peza == '1'){
				$checkp = 'checked';
			}else{
				$checkp = '';
			}
			
			if($nonpeza == '1'){
				$checkn = 'checked';
			}else{
				$checkn = '';
			}
		
		$html .= '<p>This is to certify that <strong>' . $ecertdata['ELSEname'] . ' is:</p>

        <p></strong>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="company" value="1" checked="'.$checkcompany.'" readonly="true"/>our appointed <strong>Warehouse/Logistics Service Provider</strong> which will procure and store for subsequent sale/delivery to our facility, the goods described below either thru:</p>
            <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="directImport" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Direct Import</label></td>
                <td><input type="checkbox" name="indirectImport" value="1" checked="'.$check2.'" readonly="true"/><label for="indirect">Indirect Import</label></td>
                <td><input type="checkbox" name="domesticEnterprise" value="1" checked="'.$checkd.'" readonly="true"/><label for="indirect">Sourced from Domestic Enterprise</label></td>
            </tr>
            <tr>
                <td></td>
               
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="peza" value="1" checked="'.$checkp.'" readonly="true"/><label for="peza">PEZA Enterprise</label></td>
            </tr>
            <tr>
                <td></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="nonpeza" value="1" checked="'.$checkn.'" readonly="true"/><label for="nonpeza" align="left">Other Export-oriented Enterprise</label></td>
            </tr>
            </table>
           
            ';

		$html .= '<p>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="company" value="1" checked="'.$checksupplier.'" readonly="true"/>the appointed <strong>Warehouse/Logistics Service Provider</strong> of our supplier namely <strong>' . $ecertdata['supplier'] . '</strong> with address at <strong>' . $ecertdata['add1'] .' '. $ecertdata['add2'] .'</strong>.It shall procure in behalf of our company and store the goods in its warehouse for subsequent delivery to our facility.</p><br>';

         $html .= '<p></strong>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="company" value="1" checked="'.$checkcompany2.'" readonly="true"/>our appointed <strong>Service Provider</strong> for the storage and subsequent retrieval of goods described below:</p>';

        $html .= '<br><strong>' . $ecertdata['ELSEname'] . '</strong> is a PEZA-registered Ecozone Logistics Service Enterprise (ELSE) or Ecozone Facilities enterprise engaged in warehousing/logistics operations under C.R. No.: <strong>' . $elsePEZACOR . '</strong> dated <strong>' .$DateofReg.'</strong> with facility located in <strong>' . $zoneloc . '</strong>.
        <br><br><br><br>';
		
		
	}


$html .= '<table border="1" cellpadding="5">
    <tr>
        <th bgcolor="#bebfbf" align="center"><strong>Generic Description</strong></th>               
        <th bgcolor="#bebfbf" align="center"><strong>Item Code</strong></th>  
        <th bgcolor="#bebfbf" align="center"><strong>Specific Description</strong></th> 
        <th bgcolor="#bebfbf" align="center"><strong>Qty</strong></th>               
        <th bgcolor="#bebfbf" align="center"><strong>UOM</strong></th>  
        <th bgcolor="#bebfbf" align="center"><strong>Registered Project</strong></th>
    </tr>

';

foreach($ecertitems as $items) { 

    $regAct = $itemfunction->getItemRegAct($items['ItemID']);

    $html .= '<tr>
                <td align="center">'.$items['genDesc'].'</td>
                <td align="center">'.$items['itemCode'].'</td>
                <td align="center">'.$items['description'].'</td>
                <td align="center">'.$items['quantity'].'</td>
                <td align="center">'.$items['UOM'].'</td>
                <td align="center">'.$regAct.'</td>

            </tr>';
} 

$html .= '</table>

<br>
<br>
<br>
<br>
We further certify that the above goods with tax and duty exemption incentives shall be used exclusively in our PEZA-register activities. 
<br>
<br>
<br>
<br>';

foreach($repname as $name){

$html .= '<table border = "0">

    <tr>
        <th align="left"><strong>'. $name['companyName'] . '</strong> </th>
        <th align="left"><strong>ENDORSED :</strong></th>
    </tr>
    <br>
   

    <tr>';
        
        $html .= '<td><strong>'.$name['name'].' '.$name['middleName']. ' '.$name['surname'] . '</strong></td>
                  <td align="left"><strong>'.$ecertdata['taggedBy'].'</strong></td>
    </tr>
	
    <tr>
        <td>Authorised Representative</td>
        <td align="left"><strong>'.$zoneloc.'</strong></td>
    </tr>
    
    <tr>
        <td>ID No. &nbsp;: &nbsp;<strong>' . $name['IDNo'] . '</strong></td>
    </tr>
    ';

}
    
$html .=  ' <tr>
            <td>Date &nbsp;&nbsp;&nbsp; : &nbsp;<strong>' . $datenow .'</strong></td>
    </tr>

</table>


';


$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+