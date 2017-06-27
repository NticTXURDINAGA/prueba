<?php
    include '../mpdf60/mpdf.php';
    $mpdf=new mPDF('');

    $stylesheet = file_get_contents('../bootstrap/css/bootstrap.min.css');
    $mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

    $mpdf->WriteHTML($_POST['pdf']);
    $mpdf->Output('../tmp/filename.pdf','D'); //OBLIGAR DESCARGA
    exit;
?>
