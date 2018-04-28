<?php
require_once 'Classes/PHPExcel.php';

// Assign JSON encoded string to a PHP variable
// $json = '{"Peter":65,"Harry":80,"John":78,"Clark":90}';

// url : http://103.30.246.78:8080/api/service/get/download/nim?tgl_awal=2018-04-01&tgl_akhir=2018-04-30

$postdata = http_build_query(
    array(
        'tgl_awal' => $_POST['date'],
        'tgl_akhir' => $_POST['date2']
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$json = file_get_contents('http://103.30.246.78:8080/api/service/get/download/nim', false, $context);

// $json = '[{"id":1,"nim":"201804260001","nama":"John"},{"id":2,"nim":"201804260002","nama":"John"}]';
 
// Decode JSON data to PHP associative array
$arr = json_decode($json, true);
// $obj = json_decode($json);
// print_r($arr);

if ($arr['Status']=='1') {

	// Create new PHPExcel object
	$object = new PHPExcel();

	// Redirect output to a client’s web browser (Excel2007)
	// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header("Content-type: application/vnd-ms-excel");
	header('Content-Disposition: attachment;filename="Detail_approve_'.date('Hisd').'_'.date('m').'_'.date('Y').'.xls"');
	header('Cache-Control: max-age=0');

	$object->setActiveSheetIndex(0)
		->setCellValue('A1', 'NIM')
		->setCellValue('B1', 'NAMA')
		->setCellValue('C1', 'AKTIF');
	 
	$i = 2;
	$ex = $object->setActiveSheetIndex(0);
	foreach ($arr['Nims'] as $baris) {
		$ex->setCellValue("A".$i,$baris['Nim']);
		$ex->setCellValue("B".$i,$baris['Nama']);
		$ex->setCellValue("C".$i,$baris['Aktif']);
		// $j = 0;
		// foreach ($baris as $value) {
			// $excel->writeLabel($i, $j, $value);
		// 	$j++;
		// }
		$i++;
	}

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$object->setActiveSheetIndex(0);
	$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
	$objWriter->save('php://output');
	exit;

}else{
	header("Location:index.php?id=1");
}

?>