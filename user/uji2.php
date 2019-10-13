<?php
include 'Classes/PHPExcel.php';

// membuat obyek dari class PHPExcel
$objPHPExcel = new PHPExcel();

// memberi nama sheet pertama dengan nama 'Sheet 1'
$objPHPExcel->getSheet(0)->setTitle('Sheet 1');

$objPHPExcel->getSheet(0)->setCellValueByColumnAndRow(0, 1, "NIM")
				   ->setCellValueByColumnAndRow(1, 1, "NAMA MAHASISWA")
				   ->setCellValueByColumnAndRow(2, 1, "ALAMAT");

// membuat fill color background cell
$objPHPExcel->getSheet(0)->getStyle('A1:C1')->getFill()
->setFillType(PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR);
$objPHPExcel->getSheet(0)->getStyle('A1:C1')->getFill()
->getStartColor()->setRGB('FFFFFF');
$objPHPExcel->getSheet(0)->getStyle('A1:C1')->getFill()
->getEndColor()->setRGB('F78B9D');

// auto width size kolom
$objPHPExcel->getSheet(0)->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('C')->setAutoSize(true);

// memberi border dari A1 sd C5
$objPHPExcel->getSheet(0)->getStyle('A1:C5')->getBorders()
->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getSheet(0)->getStyle('A1:C5')->getBorders()
->getAllBorders()->getColor()->setRGB('0717F7');

// output file dengan nama file 'contoh.xlsx' (excel 2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="myfile.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');
exit;
?>