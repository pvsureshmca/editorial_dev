<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($content,$file_name) 
{
    require_once("html2pdf/html2pdf.class.php");

   try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf->Output($file_name,'D');
        //$html2pdf->Output('uploads/mydocument/'.$file_name,'F');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>
