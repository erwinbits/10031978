<?php
require("../../library.php");
use Functions\eZTD;
use Functions\UserAccount;

$eloa = new eZTD;
$account = new UserAccount;

$eLOANo = $_GET['eLOANo'];
//$eLOANo = 'ELSE-LPT1-SR-79898115-16A';
//$ecertno = 'ELSE-LPT1-EC-716380-15-16A';
$ELSEname = $_GET['ELSEname'];
//$ELSEname = 'TEST ELSE';
$id = $_SESSION['userid'];
$appno = $_GET['appno'];
$ecertno = $_GET['ecertno'];
$appointedBy = $eloa->geteCERTappointedBy($ecertno);
$eloainfo = $eloa->geteLOAinfo($eLOANo);
$eloaitems = $eloa->geteLOAitems($eLOANo);
$TranID = $eloa->eLOATransactionIDForPrinting($appno);
$LOAValidity = $eloa->getLOAValidity($eLOANo);
$repname = $eloa->getAuthorisedRep($id);
$datenow = date('Y-m-d h:i:s', time());

$procurement = $eloa->getProcurementItems($ecertno);


        foreach($procurement as $data){
            $direct = $data['directImport'];
            $indirect = $data['indirectImport'];
            $domestic = $data['domesticEnterprise'];
            $peza = $data['peza'];
            $nonpeza = $data['nonpeza'];
        }

        ## --- PROCUREMENT --- ##
        if($direct == '1'){
            $check = 'checked="checked"';
        }else{
            $check = '';
        }

        if($indirect == '1'){
            $check2 = 'checked="checked"';
        }else{
            $check2 = '';
        }

        if($domestic == '1'){
            $checkd = 'checked="checked"';
        }else{
            $checkd = '';
        }

            ## --- SOURCE --- ##
            if($peza == '1'){
                $checkp = 'checked="checked"';
            }else{
                $checkp = '';
            }

            if($nonpeza == '1'){
                $checkn = 'checked="checked"';
            }else{
                $checkn = '';
            }

// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/tcpdf.php');
//require_once('../../tcpdf/examples/barcodes/tcpdf_barcodes_1d_include.php');
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
        $this->write1DBarcode($_GET['eLOANo'], 'C128A', '', '', '', 20, 0.2, $style, 'N');
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
        $this->Cell(-10, 10, ' Issuance of this Letter of Authority (LOA) is based on the representation/manifestation contained in the electronic application. Any false statement or
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
$pdf->SetTitle('e-LOA');
$pdf->SetSubject('e-LOA');
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



foreach($eloainfo as $loaInfo){

$ELSEPEZACOR = $eloa->getELSEpezaCOR($loaInfo['ELSEname']);
$CEName = $eloa->getCompanyName($loaInfo['CEcltcode']);
$CEPEZACORNo = $eloa->getCEpezaCOR($loaInfo['CEcltcode']);
$suretycompany = $eloa->getSuretyBondComapny($loaInfo['CEcltcode']);
$SURETYAmount = $eloa->getSuretyBondAmount($suretycompany, $loaInfo['CEcltcode']);
$ecertno = $eloa->getSuretyBondAmount($suretycompany, $loaInfo['ecertno']);

$html = '
<div><h3 align="center">Electronic Letter of Authority</h3>
<p align="center">'.$loaInfo['transaction_type'].'</p>
<br>
<br>

<table border = "0">
<br>
<br>
'
;

 $html .=   '<tr>
        <td>Application No &nbsp;&nbsp; : &nbsp;<strong>' . $loaInfo['appno']. '</strong></td>
        <td>Approved Date &nbsp; : &nbsp;<strong>' . $loaInfo['approvedDate']. '</strong></td>
    </tr>
    <tr>
        <td>Application Date  : &nbsp;<strong>' . $loaInfo['appDate']. '</strong></td>
        <td>Validity Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<strong>' . $LOAValidity. '</strong></td>
    </tr>
    <tr>
        <td>Payment Date &nbsp;&nbsp; : &nbsp;<strong>' . $loaInfo['approvedDate']. '</strong></td>
        <td>Processing Fee  : &nbsp;<strong>PHP' . number_format($loaInfo['processingFee'],2). '</strong></td>
    </tr>
    <tr>
        <td>e-Certificate No. : &nbsp;<strong>' . $loaInfo['ecertno']. '</strong></td>
        <td>Payment Ref. No.:&nbsp; :  <strong>'. $TranID .'</strong></td>

    </tr>




<hr>

<table border = "0">
<br>
<br>
    <tr>
        <th align="left"><br>OPRE  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;: &nbsp;<strong>' . $loaInfo['ELSEname']. '</strong></th>
        <th align="left">PEZA COR No. &nbsp; : &nbsp;<strong>'. $ELSEPEZACOR .'</strong></th>
    </tr>

    <tr>

        <th align="left">Zone Location &nbsp;&nbsp;&nbsp; : &nbsp;<strong>' . $loaInfo['ELSEzone']. '</strong><br></th>
        <th align="left"></th>
    </tr>
    <br>
</table>


<br>
<table>
    <tr>
        <td>RPRE &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;: &nbsp;<strong>'. $CEName.'</strong></td>
        <td>PEZA COR No. &nbsp; : &nbsp;<strong>'.$CEPEZACORNo .'</strong></td>
    </tr>


    <tr>

        <td>Zone Location &nbsp;&nbsp;&nbsp; : &nbsp;<strong>'.$loaInfo['ConsigneeZone'].'</strong></td>
        <td></td>
    </tr>
    <br>

';
}


$html .= '</table>

<br>

<p style="text-align:justify">

';


$html .= '<table border="1" cellpadding="5">
    <tr>
        <th bgcolor="#bebfbf" align="center"><strong>HSCODE</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>Item Code</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>Item Description</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>Quantity</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>UOM</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>Unit Price (US$)</strong></th>
        <th bgcolor="#bebfbf" align="center"><strong>Value (US$)</strong></th>

    </tr>

';

foreach($eloaitems as $items) {
    $html .= '<tr>
                <td align="center">'.$items['description'].'</td>
                <td align="center">'.$items['itemCode'].'</td>
                <td align="center">'.$items['description'].'</td>
                <td align="center">'.$items['quantity'].'</td>
                <td align="center">'.$items['UOM'].'</td>
                <td align="center">'.number_format($items['unitPrice'],2).'</td>
                <td align="center">'.number_format($items['totalValue'],2).'</td>

            </tr>';
}

foreach($eloainfo as $loaInfo){
$transaction_type = $loaInfo['transaction_type'];


if($transaction_type == "INDIRECT EXPORT")
{
    $transtype = '(Import and Supply)';
}elseif($transaction_type == "STORAGE AND RETRIEVAL"){
    $transtype = '(Storage and Retrieval)';
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
<td><strong>TOTAL VALUE</strong></td>
<td>&nbsp;&nbsp;&nbsp; $'.number_format(array_sum(array_column($eloaitems, 'totalValue')),2).'</td>

</tr>
<hr>';
if($appointedBy == 'Company'){
$html .= '<table>
<br>
<br>
<strong>SOURCE OF GOODS:</strong>
<br>
<br>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="directImport" value="1" '.$check.' readonly="true"/><label for="direct">Direct Import</label></td>
        <td><input type="checkbox" name="indirectImport" value="1" '.$check2.' readonly="true"/><label for="indirect">Indirect Import</label></td>
        <td><input type="checkbox" name="domesticEnterprise" value="1" '.$checkd.' readonly="true"/><label for="indirect">Sourced from Domestic Enterprise</label></td>
    </tr>
    <tr>
        <td></td>

        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="peza" value="1" '.$checkp.' readonly="true"/><label for="peza">PEZA Enterprise</label></td>
    </tr>
    <tr>
        <td></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="nonpeza" value="1" '.$checkn.' readonly="true"/><label for="nonpeza" align="left">Other Export-oriented Enterprise</label></td>
    </tr>
</table>';
}

$html .='<!--<p>Bondable Amount (PHP)    : '. $SURETYAmount .'  (equivalent to 7 days of goods for delivery)</p>-->
<br>

<p align="center"><center>Your request to engage in Warehousing/Logistics '. $transtype .' services is <strong>APPROVED</strong> subject to the standard terms and conditions set forth under PEZA Memorandum Order___ dated ___.</center></p>

<p align="center">Any violation of the terms and conditions of this authority, pursuant to PEZA M.O. No.______ dated _______ shall be cause for the imposition upon <strong>'. $ELSEname.'</strong> of applicable penalties under PEZA rules, including but not limited to revocation of this authority</p>
<br>
<br>
<br>
<br>



';

}
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------



//Close and output PDF document
$pdf->Output('ELOA_'.$eLOANo.'INS.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
