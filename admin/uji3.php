<?php
require_once 'Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->getSheet(0)->setTitle('Sheet Ke-1');

// Menambahkan value di sheet pertama pada cell A1
$objPHPExcel->getSheet(0)
            ->setCellValue('A1', 'Ini isi cell A1');

$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
$objPHPExcel->getActiveSheet()->setCellValue('A1','DATA PHPEXCEL DARI MYSQL');
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'ID');
$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'DATA');
$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'NILAI');
$objPHPExcel->getActiveSheet()->getStyle('C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
// mengeset sheet pertama yang aktif
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getBorders()->getAllBorders()
->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
// memberikan border pada seluruh area
$objPHPExcel->getSheet(0)->getStyle('A3:C3')->getBorders()->getAllBorders()
->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//Selain getAllBorders() dan getRight(), 
//properti lainnya untuk menentukan sisi mana dari cell yang mau diberikan garis border adalah getLeft(), getTop(), getBottom(), getDiagonal().


// output file dengan nama file 'contoh.xls'
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="contoh.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>
