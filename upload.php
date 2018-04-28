<?php
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 	  $target_dir = "uploads/";
    $target = basename($_FILES['fileexcelall']['name']) ;
    move_uploaded_file($_FILES['fileexcelall']['tmp_name'], $target);
 
// tambahkan baris berikut untuk mencegah error is not readable
    // if(is_readable($target)){
		chmod($_FILES['fileexcelall']['name'],0777);
    // }
    
    
    $data = new Spreadsheet_Excel_Reader($_FILES['fileexcelall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
    
    $hasil = array();
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nim   = $data->val($i, 1);
      $nama           = $data->val($i, 2);
 
      $hasil1 = array();
      $hasil1['nim'] = $nim;
      $hasil1['nama'] = $nama;

      array_push($hasil, $hasil1);



    }
    $myJSON = json_encode($hasil);

    // echo $myJSON;
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $myJSON
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents('http://103.30.246.78:8080/api/service/get/upload/nim', false, $context);


    $arr = json_decode($result, true);

    // echo $arr['Status'];
    if ($arr['Status']=='1') {
      header('Location:index.php?status=1');
    } else {
      header('Location:index.php?status=0');
    }
    
    
//    hapus file xls yang udah dibaca
    unlink(basename($_FILES['fileexcelall']['name']));
}
?>