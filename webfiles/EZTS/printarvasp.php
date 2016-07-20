<?php
require("../../library.php");
use Functions\PrintFunctions;
use Functions\UserAccount;

$account = new UserAccount;
$print = new PrintFunctions;

$ORNo = $_GET['ORNo'];
$cltcode = $_GET['cltcode'];

$AR = $print->getARdetailsPEZAvasp($ORNo);

$company = $account->getCompanyNamebycltcode($cltcode);


//$ecertno = $_GET['ecertno'];
//$ecertno = 'ELSE-LPT1-EC-716380-15-16A';
//$ELSEname = $_GET['ELSEname'];
//$ELSEname = 'TEST ELSE';
//$id = $_SESSION['userid'];
//$DateofReg = $ecert->getPEZACORDateofReg($id);

//$ecertinfo = $ecert->getECERTinfo($ecertno);
//$ecertitems = $ecert->eCERTitems($ecertno);
//$repname = $ecert->getAuthorisedRep($id);
//$datenow = date('Y-m-d h:i:s', time());



// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/examples/tcpdf_include.php');



// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $this->Ln(2); 
        $image_file = K_PATH_IMAGES.'INSLOGO2.jpg';
        $this->Image($image_file, 25, 7, 100, '', 'JPG', '', 'R', false, 400, '', false, false, 0, false, false, false);
        //$this->Image($image_file, 25, 7, 15);
        $this->SetFont('helvetica', 'B', 18);
        // Title
        //$this->Ln(5); 
        //$this->Cell(8, 15, '------------------------------------------------------------', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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



// output the barcode as HTML object



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


// add a page
$pdf->AddPage();

foreach($AR as $data) { 

$newDate = date("d-m-Y", strtotime($data['DateCreated']));

$html = '<hr><br><br><br><div style="text-align:center"><h2>Acknowledgement Receipt</h2><br /></div>
<br>
<br>
<table border = "0">
    <tr>
        <td> Received from: &nbsp; : &nbsp; <strong> '.$company.'</strong></td>
        <td> Date: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <strong>'.$newDate.'</strong></td>
    </tr>
    <br>

    <tr>
        <td> Payment For: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; <strong>Preloaded PEZA Funds</strong></td>
        <td> Reference No: &nbsp; : <strong>'.$data['refnum'].'</strong></td>
    </tr>
    <br>

</table>
<br>
<br>
<br>
 
<div style="text-align:center"><h3>Transaction Details</h3><br /></div>
<hr>
<br>
<br>
<br>
';

$html .= '<table border="1" cellpadding="5">
    <tr>
        <th bgcolor="#bebfbf" align="center"><strong>Description</strong></th>               
        <th bgcolor="#bebfbf" align="center"><strong>Amount</strong></th>  
        <th bgcolor="#bebfbf" align="center"><strong>OR Number</strong></th>              
        <th bgcolor="#bebfbf" align="center"><strong>Remarks</strong></th>  
    </tr>

';


    $html .= '<tr>
                <td align="center">Preloaded Fund</td>
                <td align="center">'.$data['amount'].'</td>
                <td align="center">'.$data['ORnum'].'</td>
                <td align="center">'.$data['remarks'].'</td>

            </tr>';
} 

$html .= '</table>

 
<br>
<br>
<br>
<br>
<div style="text-align:center"><h3>********* NOTHING FOLLOWS *********</h3></div>
<hr>
<br>
<br>
<br>
<br>
<p align="center"><i><center>This is a system generated receipt.<center><i></p>
';

    
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+