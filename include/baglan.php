<?php
// veritabanı bağlantısı için gerekli parametreler






$site = 'https://demoyazilim.online/vdt5/';

//upload dosya yolu
$targetFolder = '/resimler/';





$host = "localhost";
$vt_adi = "epikscriptonline_krmsl";
$kullanici_adi = "epikscriptonline_krmsl";
$sifre = "epikscriptonline_krmsl";
try {
 $db = new PDO("mysql:host={$host};dbname={$vt_adi}", $kullanici_adi, $sifre,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
// hatayı göster
catch(PDOException $exception){
 echo "Bağlantı hatası: " . $exception->getMessage();
}
error_reporting(0);
?>