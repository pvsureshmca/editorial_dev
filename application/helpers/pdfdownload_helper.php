<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($content,$file_name) 
{
    require_once("html2pdf/html2pdf.class.php");

   try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->IncludeJS("print(true);");
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf->Output('js1.pdf');
        $html2pdf->Output('uploads/mydocument/'.$file_name,'F');

        
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>
