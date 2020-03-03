<?php
    
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $html = file_get_contents("format_berita_menara.php");

    $dompdf->loadHtml($html);
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Menjadikan HTML sebagai PDF
$dompdf->render();
// Output akan menghasilkan PDF ke Browser
$dompdf->stream("codexworld",array("Attachment"=>1));
?>