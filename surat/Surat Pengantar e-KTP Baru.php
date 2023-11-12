<?php
    require 'dompdf/autoload.inc.php';
    require '../connect/db_connect.php';

    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('template_surat/pengantar_ektp.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $tgl = date('Y-m-d');
    $dompdf->stream('Surat Pengantar e-KTP_'.$tgl.'.pdf', ['Attachment'=>false]);

?>