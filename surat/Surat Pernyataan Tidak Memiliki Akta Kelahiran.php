<?php
    require 'dompdf/autoload.inc.php';
    require '../connect/db_connect.php';

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    ob_start();
    require('template_surat/pernyataan_tidakmemilikiakte.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'potrait');

    $dompdf->render();

    $tgl = date('Y-m-d');
    $dompdf->stream('Surat Pernyataan Tidak Memiliki Akte Kelahiran_'.$tgl.'.pdf', ['Attachment'=>false]);

?>