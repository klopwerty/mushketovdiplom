<?php session_start()/*Старт сессии */ ?>
<?php require_once '../login/check_session.php' /* проверка аутентификации сессии */?>
<?php require_once '../../Classes/PHPExcel.php';
    
?>
<?php

function get_price() {
    $number =  trim($_REQUEST['number']);
    $capcity = trim($_REQUEST['capcity']);
        //Проверяем на пустоту
    if(  $number=="" or $capcity=="Площадка")
    {
        echo "<script>alert(\"Заполните обязательные поля\");</script>";
        die();
    }
	$sql = "SELECT * FROM capcity_info INNER JOIN users ON capcity_info.FIO = users.users_id INNER JOIN kult ON capcity_info.period = kult.id INNER JOIN capcity_name ON capcity_info.capcity_name = capcity_name.id  WHERE capcity_number = $number AND capcity_name = $capcity  ORDER BY `id_capcity` DESC limit 50";
	$result = mysql_query($sql);
    
	
	if(!$result) {
		exit(mysql_error());
	}
	
	$row = array();
	
	for($i = 0;$i < mysql_num_rows($result);$i++) {
		$row[] = mysql_fetch_assoc($result);
	}
	
	return $row;		
}


$NC = trim($_REQUEST['capcity_number']);

$price_list = get_price();

$objPHPExcel = new PHPEXcel();

$objPHPExcel->setActiveSheetIndex(0);

//$objPHPExcel->createSheet();

$active_sheet = $objPHPExcel->getActiveSheet();

$active_sheet->getPageSetup()
			->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
			
$active_sheet->getPageSetup()
			->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			
			
$active_sheet->getPageMargins()->setTop(1);
$active_sheet->getPageMargins()->setRight(0.75);
$active_sheet->getPageMargins()->setLeft(0.75);
$active_sheet->getPageMargins()->setBottom(1);

$active_sheet->setTitle("Отчет"); /*Название страницы*/	

$active_sheet->getHeaderFooter()->setOddHeader("&CШапка нашего прайс листа");	
$active_sheet->getHeaderFooter()->setOddFooter('&L&B'.$active_sheet->getTitle().'&RСтраница &P из &N');

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);	


$active_sheet->getColumnDimension('A')->setWidth(30);
$active_sheet->getColumnDimension('B')->setWidth(40);
$active_sheet->getColumnDimension('C')->setWidth(20);
$active_sheet->getColumnDimension('D')->setWidth(10);
$active_sheet->getColumnDimension('E')->setWidth(10);
$active_sheet->getColumnDimension('F')->setWidth(10);
$active_sheet->getColumnDimension('G')->setWidth(10);




$active_sheet->mergeCells('B1:G1');
$active_sheet->getRowDimension('1')->setRowHeight(40);

$row_start = 1;
$i = 0;

foreach($price_list as $item) {
	$active_sheet->setCellValue('B1'.$row_next,$item['name']);
    $active_sheet->setCellValue('A1'.$row_next,$item['capcity_number']);
}



$active_sheet->setCellValue('A2','Время');
$active_sheet->setCellValue('B2','ФИО Сотрудника');
$active_sheet->setCellValue('C2','Период');
$active_sheet->setCellValue('D2','AHT');
$active_sheet->setCellValue('E2','SL');
$active_sheet->setCellValue('F2','LCR');
$active_sheet->setCellValue('G2','AR');

$row_start = 3;
$i = 0;
foreach($price_list as $item) {
	$row_next = $row_start + $i;
	
	$active_sheet->setCellValue('A'.$row_next,$item['time_auto']);
	$active_sheet->setCellValue('B'.$row_next,$item['FIO']);
	$active_sheet->setCellValue('C'.$row_next,$item['kult']);
	$active_sheet->setCellValue('D'.$row_next,$item['AHT']);
	$active_sheet->setCellValue('E'.$row_next,$item['SL']);
	$active_sheet->setCellValue('F'.$row_next,$item['LCR']);
	$active_sheet->setCellValue('G'.$row_next,$item['AR']);
	
	$i++;
}


$style_wrap = array(
	'borders'=>array(
		'outline' => array(
			'style'=>PHPExcel_Style_Border::BORDER_THICK
		),
		'allborders'=>array(
			'style'=>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
				'rgb'=>'696969'
			)
		)
	
	)


);
$active_sheet->mergeCells('F104:G104');
$active_sheet->setCellValue('F104','Дата создания');

$date = date('d-m-Y');
$active_sheet->setCellValue('G104',$date);
$active_sheet->getStyle('G104')
			->getNumberFormat()->
			setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX14);


$active_sheet->getStyle('A1:G'.($i+99))->applyFromArray($style_wrap);

$style_header = array(
	'font'=>array(
		'bold' => true,
		'name' => 'Times New Roman',
		'size' => 20
	),
	'alignment' => array(
		'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
	),
	'fill' => array(
		'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
		'color'=>array(
			'rgb' => 'CFCFCF'
		)
	)


);

$active_sheet->getStyle('A1:G1')->applyFromArray($style_header);

$style_slogan = array(
	'font'=>array(
		'bold' => true,
		'italic' => true,
		'name' => 'Times New Roman',
		'size' => 13,
		'color'=>array(
			'rgb' => '8B8989'
		)
		
	),
	'alignment' => array(
		'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
	),
	'fill' => array(
		'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
		'color'=>array(
			'rgb' => 'CFCFCF'
		)
	),
	'borders' => array(
		'bottom' => array(
		'style'=>PHPExcel_Style_Border::BORDER_THICK
		)
	
	)


);

$active_sheet->getStyle('A2:G2')->applyFromArray($style_slogan);


$style_tdate = array(
	'alignment' => array(
		'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_RIGHT,
	),
	'fill' => array(
		'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
		'color'=>array(
			'rgb' => 'CFCFCF'
		)
	),
	'borders' => array(
		'right' => array(
		'style'=>PHPExcel_Style_Border::BORDER_NONE
		)
	
	)


);


$style_price = array(
	'alignment' => array(
		'horizontal' => PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_LEFT,
	)
	

);

$active_sheet->getStyle('A3:G'.($i+99))->applyFromArray($style_price);


header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=Otchet.xls"); /*Название excel файла*/

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit();