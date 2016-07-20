<?php
require("../../library.php");
use Functions\eZTD;
use Functions\UserAccount;
use Functions\SuretyBond;

$eztd = new eZTD;
$account = new UserAccount;
$surety = new SuretyBond;

$eZTDno = $_GET['ZTDNo'];
$ELSEname = $_GET['ELSEname'];
$appno = $_GET['appno'];
$cltcode = $_GET['cltcode'];
//$ELSEname = 'TEST ELSE';
$id = $_SESSION['userid'];

$transtype = $eztd->checkTransferType($appno);
$eztdinfo = $eztd->getEZTDinfo($eZTDno);
$eztditems = $eztd->getEZTDitems($eZTDno);
$LOAno = $eztd->getLOANousingZTDNo($eZTDno);

$ORnum = $eztd->getOrNumForPrinting($appno);
$TransID = $eztd->getTransactionIDForPrinting($appno);
$datenow = date('Y-m-d h:m:s', time());


// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/tcpdf.php');
// require_once('../../tcpdf/examples/tcpdf_include.php');
//require_once('../../tcpdf/examples/barcodes/tcpdf_barcodes_1d_include.php');
// include 1D barcode class (search for installation path)

// set the barcode content and type

//$barcodeobj = new TCPDFBarcode('http://www.tcpdf.org', 'C128');

//$barcodeimage = $barcodeobj->getBarcodePNG(2, 30, array(0,0,0));
// set the barcode content and type

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {


    // output the barcode as PNG image
  
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
        $this->write1DBarcode($_GET['ZTDNo'], 'C128A', '', '', '', 20, 0.2, $style, 'N');
        $image_file = K_PATH_IMAGES.'PEZA_logo6.jpg';
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
        $this->Cell(-10, 10, ' Issuance of this permit is based on the representation/manifestation contained in the electronic application. Any false statement or
', 0, false, 'C', 0, '', 1, false, 'B', 'M');
        $this->Ln(3); 
        $this->Cell(-10, 10, 'misrepresentation in this application shall be subject to the penalties imposed under Section 28 of Presidential Decree. 66 or other applicable laws.', 0, false, 'C', 0, '', 1, false, 'B', 'M');
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
$pdf->SetTitle('EZTD');
$pdf->SetSubject('EZTD');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set default header data


$PDF_HEADER_LOGO = "logo_peza.jpg";;//any image file. check correct path.
$PDF_HEADER_LOGO = "logo_peza.jpg";;//any image file. check correct path.
$PDF_HEADER_LOGO_WIDTH = "20";
$PDF_HEADER_LOGO_WIDTH = "20";
$PDF_HEADER_TITLE = "PHILIPPINE ECONOMIC ZONE AUTHORITY";
$PDF_HEADER_STRING = "Building 5, DOE-PNOC Complex, 34th St.,  \n"
. "Bonifacio Global City, Taguig, Metro Manila \n"
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
$pdf->SetFont('helvetica', '', 8);

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

$pdf->Ln(0);

foreach($eztdinfo as $info){

$date = $info['approvalDate'];

$html = '<div style="text-align:center"><h3>Electronic Permit For INTRA/INTER Zone Transfer of Goods</h3></div>

<table>
    <!------------------------------------- FIRST SECTION ---------------------------------------->
    <tr>
        <td>Application No.    &nbsp;&nbsp;&nbsp; : &nbsp; <strong>'.$info['appno'].'</strong> </td>
        <td>Date of Transfer   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>'.$info['TransferDate'].'</strong></td>
    </tr>
    

    <tr>
        <td>Application Date       &nbsp; : &nbsp; <strong>'.$info['appDate'].' </strong></td>
        <td>PEZA Processing Fee    &nbsp;&nbsp;&nbsp; : <strong>PHP '.$info['processingFee'].' </strong></td>
    </tr>
    

    <tr>
        <td>Approved Date     &nbsp;&nbsp;&nbsp; : &nbsp; <strong>'. $info['approvalDate'] .' </strong></td>
        <td>Payment Transaction ID  : <strong>'. $TransID. '</strong></td>
    </tr>
    

    <tr>
        <td>LOA No.  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :  &nbsp;  <strong>'.$info['LOAno'].' </strong></td>
        <td>Payment Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :  &nbsp;<strong>'.$info['appDate'].' </strong></td>
    </tr>
    <!------------------------------------- END OF FIRST SECTION ---------------------------------------->

<hr>
    

    <!------------------------------------- SECOND SECTION ---------------------------------------->
<table>

    <br>
    <br>
    <tr>   
        <td> ORPRE &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; : &nbsp; <strong>'.$info['clientName'].'</strong> </td>
        <td> PEZA COR No. &nbsp; : &nbsp; <strong>'.$info['elsePEZACor'].'</strong> </td>
    </tr>
    <tr>
        <td> Zone Location &nbsp;&nbsp;&nbsp; : &nbsp; <strong>'.$info['ELSEZone'].'</strong> </td>
        <td></td>
    </tr>
    <br>

    <tr>
        <td> RPRE &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; : &nbsp;  <strong>'.$info['consignee'].'</strong> </td>
        <td> PEZA COR No. &nbsp; : &nbsp; <strong>'.$info['userPEZACor'].'</strong> </td>
    </tr>
    <tr>
        <td> Zone Location &nbsp;&nbsp;&nbsp; : &nbsp; <strong>'.$info['clientZone'].'</strong> </td>
        <td></td>
    </tr>

</table>
    <!------------------------------------- END OF SECOND SECTION ---------------------------------------->
<br>

<p style="text-align:justify">

';
}


$html .= '<table border="1" cellpadding="5">
    <tr>
        <th rowspan="2" bgcolor="#bebfbf" align="center"><strong><p>HS Code</p></strong></th>
        <th colspan="4" bgcolor="#bebfbf" align="center"><strong>ITEM</strong></th>               
        <th colspan="2" bgcolor="#bebfbf" align="center"><strong>FOB Value (US $)</strong></th> 
    </tr>

    <tr>
        <td bgcolor="#bebfbf" align="center"><strong>Code</strong></td>  
        <td bgcolor="#bebfbf" align="center"><strong>Description</strong></td> 
        <td bgcolor="#bebfbf" align="center"><strong>Quantity</strong></td>               
        <td bgcolor="#bebfbf" align="center"><strong>UOM</strong></td> 
        <td bgcolor="#bebfbf" align="center"><strong>Unit</strong></td>
        <td bgcolor="#bebfbf" align="center"><strong>Total</strong></td> 
    </tr>
    

';

foreach($eztditems as $items) { 

    $hscode = $eztd->getHSCODEusingItemID($items['ItemID']);
    $itemcode = $eztd->getitemCODEusingItemID($items['ItemID']);
    $newValue = $items['unitValue'] * $items['qtyToBeTransferred'];
    $html .= '<tr>
                <td align="center">'.$hscode.'</td>
                <td align="center">'.$itemcode.'</td>
                <td align="center">'.$items['description'].'</td>
                <td align="center">'.$items['qtyToBeTransferred'].'</td>
                <td align="center">'.$items['UOM'].'</td>
                <td align="center">$'.number_format($items['unitValue'],2).'</td>
                <td align="center">$'.number_format($newValue,2).'</td>

            </tr>';
} 

$html .= '</table>
<br>
<br>
<br>
<hr>
';

foreach($eztdinfo as $purpose)
{


if($purpose['purpose'] == 'INDIRECT EXPORT')
{
    $checkIE = "checked";
    $checkSR = "";
}else{
    $checkIE = "";
    $checkSR = "checked"; 
}

$check ="";
// $html .= '<p>Purpose &nbsp; : &nbsp;<strong>'.$purpose['purpose'].'</strong></p>
// <br>';

$html .= '<br>

<table>
<br>
<br>
<tr>
    <td><strong>Purpose:</strong></td>
    <td><input type="checkbox" name="IndirectExport" value="1" checked="'.$checkIE.'" readonly="true"/><label for="direct">Indirect Export</label></td>
    <td><input type="checkbox" name="TempTransfer" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Temporary Transfer</label></td>
    <td><input type="checkbox" name="Local Sales/Disposal" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Local Sales/Disposal</label></td>
    <td><input type="checkbox" name="Sample" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Sample</label></td>
</tr>
<tr>
    <td></td>
    <td><input type="checkbox" name="Subcontracting" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Subcontracting</label></td>
    <td><input type="checkbox" name="PermTransfer" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Permanent Transfer</label></td>
    <td><input type="checkbox" name="FarmOut" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Farm Out</label></td>
    <td><input type="checkbox" name="Scrap" value="1" checked="'.$check.'" readonly="true"/><label for="direct">Scrap</label></td>
</tr>

</table>
<br>
<br>
';
}

if($transtype == '1'){
    $SuretyBondnumber = 'Not Applicable';
    $SuretyBondORNo = 'Not Applicable';
    $SuretyBondAmount = 'Not Applicable';
    $SuretyCompany = 'Not Applicable';
}else{
    $SuretyBondnumber = $purpose['SuretyBondNo'];
    $SuretyBondORNo = $purpose['SB_ORNo'];
    $SuretyBondAmount = 'PHP' . number_format($purpose['SBamount'],2);
    $SuretyCompany = $purpose['SBcompany'];
}

$html .= '<strong>Supporting Documents</strong>
<br>
    <!------------------------------------- THIRD SECTION ---------------------------------------->
<table>
    <br>
    <tr>   
        <td>Commercial Invoice No. :<strong>'.$purpose["CommInvoice"].'</strong> </td>
        <td>Surety Bond No. &nbsp; : &nbsp; <strong>'.$SuretyBondnumber.'</strong> </td>        
    </tr>
    

    <tr>
        <td>Packing List : &nbsp; <strong>'.$purpose['PackingList'].'</strong> </td>
        <td>OR No. &nbsp; : &nbsp; <strong>'.$SuretyBondORNo.'</strong> </td>
    </tr>
    

    <tr>
        <td>Delivery Receipt No. : &nbsp; <strong>'.$purpose['DeliveryReceipt'].'</strong> </td>
        <td>Amount &nbsp; : &nbsp; <strong>'.$SuretyBondAmount.'</strong> </td>
    </tr>
    

    <tr>
        <td>Gatepass No. : &nbsp; <strong>'.$purpose['Gatepass'].'</strong> </td>
        <td align = "left">Insurance Company : <strong>'.$SuretyCompany.'</strong> </td>
    </tr>

    <!------------------------------------- END OF THIRD SECTION ---------------------------------------->
<br>
<table>
<table border = "1" cellpadding = "5">
<tr>
    <th>DATE / TIME Approved: <strong>'.$info['approvalDate'].' </strong></th>
    <th>DATE / TIME Allowed to Exit: <strong> '. date("Y-m-d G:i:s", strtotime($info['approvalDate'] . "+30 minutes")).' </strong></th>
</tr>
</table>
<br>
<br>
<hr>
<div><br></div>
<div><p><strong>CLEARANCE:</strong> This is to certify that the commodities covered by this Permit have been checked and found to be in order and may therefore be taken out/in of the Zone.</p></div>
<br>
<br>
<br>
<br>
<br>
    <tr>
        <td> Bureau of Custom Examiner </td>
        <td> PEZA Enterprise Service Officer <br><br></td>
    </tr>

<hr>

<p align="center">TALLY OF GOODS ENTERED INTO THE RECEIVING ZONE ON THE BASIS OF THE ABOVE PERMIT</p>
<br>
<br>
<br>
<table border="1" cellpadding="5">

    <tr>
        <th rowspan="2" align="center"><br><p>Item Description:</p></th>
        <th rowspan="2" align="center"><br><p>Quantity Arrived/UOM:</p></th>
        <th colspan="2" align="center">Checked by: </th>
    </tr>
    <tr>
        <td align="center">PEZA Examiner<br></td>
        <td align="center">BOC Examiner<br></td>
    </tr>
    <tr>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
               

    </tr>
<br>
<br>
<br>
<br>
</table>



<hr>



';


$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------



//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+