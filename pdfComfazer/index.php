<?php

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';

$css = file_get_contents('estilo.css');
$html = file_get_contents('doc.html');


$mpdf = new Mpdf();
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('doc.test.pdf', 'D');
