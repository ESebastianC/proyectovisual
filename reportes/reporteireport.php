<?php
require './phpjasperxml-master/vendor/autoload.php';

use simitsdk\phpjasperxml\PHPJasperXML;
$filename = "reporteEstudiante.jrxml"; 


$config= [
    'driver' => 'mysql',
    'host' => 'bhlut4j4kuhxsivd4hrp-mysql.services.clever-cloud.com',
    'user' => 'uvhyhfvxsavrkktw',
    'pass' => '2w5zMYBaRxgZ5aeDVXTw',
    'name' => 'bhlut4j4kuhxsivd4hrp'
];

$report = new PHPJasperXML();
$report->load_xml_file($filename)    
    ->setParameter(['reporttitle'=>'Database Report With Driver : '.$config['driver']])
    ->setDataSource($config)
    ->export('Pdf');
    print $report;
?>.