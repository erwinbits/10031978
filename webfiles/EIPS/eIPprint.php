<?php

require("../../../library.php");

use Functions\eIP;

$eIP = new eIP;

// Include the main TCPDF library (search for installation path).
require_once('../../../tcpdf/examples/tcpdf_include.php');
require_once('../../../tcpdf/examples/barcodes/tcpdf_barcodes_1d_include.php');
// include 1D barcode class (search for installation path)

// set the barcode content and type

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	
    //Page header
    public function Header() {
        // Logo
        $style = array(
            'position' => '',
            'align' => 'R',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );
        $style['position'] = 'R';
        $this->Ln(1); 
        $this->write1DBarcode($_GET['appno'], 'C128A', '', '', '', 20, 0.2, $style, 'N');
        $image_file = K_PATH_IMAGES.'PEZA_logo8.jpg';
        $this->Image($image_file, 25, 7, 90, '', 'JPG', '', 'L', false, 400, '', false, false, 0, false, false, false);
        //$this->Image($image_file, 25, 7, 15);
        
        //$this->Image($barcodeimage, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
       
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
         $this->SetFont('helvetica', 'I', 6);
        // Page number
        $this->Ln(1); 
        $this->Cell(-10, 10, '', 0, false, 'C', 0, '', 1, false, 'B', 'M');
        $this->Ln(3); 
        $this->Cell(-10, 10, '', 0, false, 'C', 0, '', 1, false, 'B', 'M');
        $this->Ln(5); 
        $this->Cell(-10, 10, 'Page'. $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 1, false, 'B', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// output the barcode as HTML object

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PEZA');
$pdf->SetTitle('Electronic IMPORT PERMIT');
$pdf->SetSubject('e-IP');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$PDF_HEADER_LOGO = "logo_peza.jpg";;//any image file. check correct path.
$PDF_HEADER_LOGO_WIDTH = "20";
$PDF_HEADER_TITLE = "PHILIPPINE ECONOMIC ZONE AUTHORITY";
$PDF_HEADER_STRING = "PEZA Building Roxas Boulevard  \n"
. "corner San Luis St., Pasay City,\n"
. "Philippines, 1300\n"
. "www.peza.gov.ph";
$pdf->SetHeaderData(PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$PDF_FONT_NAME_MAIN = 'helvetica';
$PDF_FONT_SIZE_MAIN = '8';
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
$pdf->setBarcode(date('Y-m-d H:i:s'));
// set font
$pdf->SetFont('helvetica', '', 9);

$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);


$pdf->AddPage();


$style['position'] = 'R';
//$pdf->write1DBarcode('ELSE-LPT1-EC-716380-15-6A', 'C128A', '', '', '', 25, 0.2, $style, 'N');
//$pdf->write1DBarcode('ELSE-LPT1-EC-716380-15-6A', 'RMS4CC', '', '', '', 25, 0.4, $style, 'N');

$pdf->Ln(1);

$html = '
<div><h3 align="center">Electronic IMPORT PERMIT</h3>
<p align="center"> </p>
<br>
<br>

<table border = "0">
<br>
<br>';

$appno = $_GET['appno'];
$info = $eIP->geteIPinfo($appno);
foreach($info as $data){
	$appno = $data['appno'];
	$BOCrefno = $data['BOCrefno'];
	$appDate = $data['appDate'];
	$IPno = $data['IPno'];
	$paidFee = $data['paidFee'];
	$dateValidity = $data['dateValidity'];
	$paymentRefno = $data['paymentRefno'];
	$paymentDate = $data['paymentDate'];
	$clientName = $data['clientName'];
	$clientTIN = $data['clientTIN'];
	$zoneLocation = $data['zoneLocation'];
	$CRno = $data['CRno'];
	$brokerName = $data['brokerName'];
	$shipperName = $data['shipperName'];
	$shipperAddress = $data['shipperAddress'];
	$countryOrigin = $data['countryOrigin'];
	$departureDate = $data['departureDate'];
	$portDischarge = $data['portDischarge'];
	$arrivalDate = $data['arrivalDate'];
	$AirBill = $data['AirBill'];
	$POno = $data['POno'];
	$invoiceNo = $data['invoiceNo'];
	$totalValue = $data['totalValue'];
	$totalWeight = $data['totalWeight'];
}

 $html .= '<tr>
        <td>Application No &nbsp; : &nbsp;<strong>'.$appno.'</strong></td>
        <td>BOC Reference No. &nbsp; : &nbsp;<strong>'.$BOCrefno.'</strong></td>
    </tr>
    <tr>
        <td>Application Date &nbsp; : &nbsp;<strong>'.$appDate.'</strong></td>
        <td>PEZA IP Number &nbsp; : &nbsp;<strong>'.$IPno.'</strong></td>
    </tr>
    <tr>
        <td>PEZA IP Fee Paid &nbsp; : &nbsp;<strong>PHP '.$paidFee.'</strong></td>
        <td>Valid Until &nbsp; : &nbsp;<strong>'.$dateValidity.'</strong></td>
    </tr>
    <tr>
        <td>Payment Reference No &nbsp; : &nbsp;<strong>'.$paymentRefno.'</strong></td>
        <td>Payment Date &nbsp; : &nbsp;<strong>'.$paymentDate.'</strong></td>
    </tr>
<hr>
<p>Permission is hereby to the PEZA Registered Enterprise indicated below, to import for delivery to its premises, the
item/s described, in the quality and value stated, for its exclusive and direct use, as follow:</p>

<table border = "0">
<br>
<br>
    <tr>
        <th align="left"><br>Importers Name  &nbsp; : &nbsp;<strong>'.$clientName.'</strong></th>
        <th align="left">TIN &nbsp; : &nbsp;<strong>'.$clientTIN.'</strong></th>
    </tr>
    <tr>
        <th align="left"><br>Zone Location &nbsp; : &nbsp;<strong>'.$zoneLocation.'</strong></th>
        <th align="left">CR No &nbsp; : &nbsp;<strong>'.$CRno.'</strong></th>
    </tr>
    <br>
</table>

<br>
<table>
    <tr>
        <td>Broker Name &nbsp; : &nbsp;<strong>'.$brokerName.'</strong></td>
        <td> &nbsp; </td>
    </tr>

    <tr>
        <td>Shipper Name &nbsp; : &nbsp;<strong>'.$shipperName.'</strong></td>
        <td></td>
    </tr>
</table>
	
<br>
<table>
    <tr>
        <td>Shipper Address &nbsp; : &nbsp;<strong>'.$shipperAddress.'</strong></td>
        <td> &nbsp; </td>
    </tr>

    <tr>
        <td>Country Origin &nbsp; : &nbsp;<strong>'.$countryOrigin.'</strong></td>
        <td>Departure Date &nbsp; : &nbsp;<strong>'.$departureDate.'</strong></td>
    </tr>
</table>

<br>
<table>
    <tr>
        <td>Port Of Discharge &nbsp; : &nbsp;<strong>'.$portDischarge.'</strong></td>
        <td>Arrival Date &nbsp; : &nbsp;<strong>'.$arrivalDate.'</strong></td>
    </tr>

    <tr>
        <td>PO No. &nbsp; : &nbsp;<strong>'.$POno.'</strong></td>
        <td> &nbsp; </td>
    </tr>
</table>

<br>
<table>
    <tr>
        <td>Invoice No. &nbsp; : &nbsp;<strong>'.$invoiceNo.'</strong></td>
        <td> &nbsp; </td>
    </tr>

    <tr>
        <td>PO No. &nbsp; : &nbsp;<strong>'.$POno.'</strong></td>
        <td> &nbsp; </td>
    </tr>
</table>

<br>
<table>
    <tr>
        <td>Total Value &nbsp; : &nbsp;<strong>'.$totalValue.'</strong></td>
        <td>Total Weight &nbsp; : &nbsp;<strong>'.$totalWeight.' &nbsp;</strong>kgs</td>
    </tr>
';

$html .= '</table>

<br>
<p style="text-align:justify">

';


$html .= '<table border="1" cellpadding="5">
    <tr>
        <th bgcolor="#bebfbf" align="center"><strong>HSCODE</strong></th>               
        <th bgcolor="#bebfbf" align="center"><strong>Item Code</strong></th>  
        <th bgcolor="#bebfbf" align="center"><strong>Description</strong></th> 
        <th bgcolor="#bebfbf" align="center"><strong>Quantity</strong></th>               
        <th bgcolor="#bebfbf" align="center"><strong>Packaging Type</strong></th>  
        <th bgcolor="#bebfbf" align="center"><strong>Unit of Measurement</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong> FOB Value (US$)</strong></th>
    </tr>';
	
	
$items = $eIP->geteIPitems($appno);
foreach($items as $data){
	$hsCode = $data['hsCode'];
	$itemCode = $data['itemCode'];
	$description = $data['description'];
	$quantity = $data['quantity'];
	$packType = $data['packType'];
	$UOM = $data['UOM'];
	$FOBvalue = $data['FOBvalue'];
	
    $html .= '<tr>
                <td align="center">'.$hsCode.'</td>
                <td align="center">'.$itemCode.'</td>
                <td align="center">'.$description.'</td>
                <td align="center">'.$quantity.'</td>
                <td align="center">'.$packType.'</td>
                <td align="center">'.$UOM.'</td>
                <td align="center">'.$FOBvalue.'</td>
            </tr>';
}
$html .= '</table>

<br>
<br>
<br>
<table>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

</tr>';

$html .= '<table>
<br>
<br>
<strong>Remarks:</strong>
<br>
<hr>

Issuance of the Import Permit is based on the presentation / manifestation contained in the electronic IP application and valid for 15 days from date of approval. Any false statement or misrepresentations in the application made shall be subject to the penalties imposed under section 8 A(3) and B of
Rule XXV, Implementing Rules and Regulations of R.A. 7916 creating the Philippine Economic Zone Authority, as amended, and other applicable laws.
    
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------



//Close and output PDF document
$pdf->Output('eIP INS.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+