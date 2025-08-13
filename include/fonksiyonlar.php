<?php
include"baglan.php";
function oturumkontrolana(){
	 if (empty($_SESSION["eposta"])){
		 echo '<script language="javascript">window.location="giris-yap.php";</script>'; die();
	 }
	 
}function oturumkontrolana1(){
	 if (empty($_SESSION["email"])){
		 echo '<script language="javascript">window.location="giris-yap";</script>'; die();
	 }
	 
}
$tarih = date("d.m.Y");
$saat = date("H:i");


$kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
foreach ($kur -> Currency as $cur) {
	if ($cur["Kod"] == "USD") {
		$usdAlis  = $cur -> ForexBuying;
		$usd = $cur -> ForexSelling;
		
	}

	if ($cur["Kod"] == "EUR") {
		$eurAlis  = $cur -> ForexBuying;
		$euro = $cur -> ForexSelling;
	}
}


$hakkimizda= $db->query("SELECT * FROM hakkimizda Where id='1'")->fetch(PDO::FETCH_ASSOC);

$panel= $db->query("SELECT * FROM panel Where id='1'")->fetch(PDO::FETCH_ASSOC);
$ayar= $db->query("SELECT * FROM ayarlar Where id='1'")->fetch(PDO::FETCH_ASSOC);
$paytr= $db->query("SELECT * FROM paytr Where id='1'")->fetch(PDO::FETCH_ASSOC);
$paymax= $db->query("SELECT * FROM paymax Where id='1'")->fetch(PDO::FETCH_ASSOC);
$odeme_tur= $db->query("SELECT * FROM odeme_secenek Where id='1'")->fetch(PDO::FETCH_ASSOC);
$netgsm= $db->query("SELECT * FROM netgsm Where id='1'")->fetch(PDO::FETCH_ASSOC);
$shopier= $db->query("SELECT * FROM shopier Where id='1'")->fetch(PDO::FETCH_ASSOC);


$izinler= $db->query("SELECT * FROM izinler Where id='1'")->fetch(PDO::FETCH_ASSOC);

$sayfa= $db->query("SELECT * FROM sayfalar Where seo='hakkimizda'")->fetch(PDO::FETCH_ASSOC);

$alt= $db->query("SELECT * FROM sayfalar Where id='19'")->fetch(PDO::FETCH_ASSOC);

$iletisim= $db->query("SELECT * FROM iletisimbilgileri Where id='1'")->fetch(PDO::FETCH_ASSOC);

$sosyal= $db->query("SELECT * FROM sosyalmedya Where id='1'")->fetch(PDO::FETCH_ASSOC);
$bead= $db->query("SELECT * FROM beadcrumb Where id='1'")->fetch(PDO::FETCH_ASSOC);
$modal= $db->query("SELECT * FROM modal Where id='1'")->fetch(PDO::FETCH_ASSOC);


$idd=$_SESSION['id'];
$hesabim=$db->query("select * from yonetici where id='$idd'")->fetch(PDO::FETCH_ASSOC);

$smtp=$db->query("select * from mail where id='1'")->fetch(PDO::FETCH_ASSOC);


$adi = $hakkimizda['adi'];
$footer_h = $hakkimizda['footer'];
$video = $hakkimizda['video'];
$hresim = $hakkimizda['resim'];
$aciklama = $hakkimizda['aciklama'];
$title = $ayar['site_title'];
$des = $ayar['site_description'];
$logo = $ayar['logo'];
$footerlogo = $ayar['footer_logo'];
$favicon  =$ayar['favicon'];
$author  =$ayar['site_author'];
$keyword  =$ayar['site_keyword'];
$copyright = $ayar['footer_copyright'];
$renk  =$ayar['renk'];
$header  =$ayar['header'];
$footer  =$ayar['footer'];
$renk2  =$ayar['renk2'];
$telefon1 = $iletisim['telefon1'];
$telefon2 = $iletisim['telefon2'];
$adres1 = $iletisim['adres1'];
$adres2 = $iletisim['adres2'];
$email1 = $iletisim['email1'];
$email2 = $iletisim['email2'];
$googlemaps = $iletisim['google_maps'];
$whatsapp=$iletisim['whatsapp'];
$wptext = $iletisim['wp_text'];
$wprenk = $iletisim['wp_renk'];

$onecikan= $db->query("SELECT * FROM onecikan Where id='1'")->fetch(PDO::FETCH_ASSOC);


$facebook = $sosyal['facebook'];
$twitter= $sosyal['twitter'];
$instagram= $sosyal['instagram'];
$telegram= $sosyal['telegram'];
$youtube= $sosyal['youtube'];
$pinterest= $sosyal['pinterest'];
$linkedin= $sosyal['linkedin'];


if(isset($_POST["panel-giris"])){
    
    
ob_start();
session_start();
   if($sec = $db->query("select * from yonetici where eposta='{$_POST["email"]}' and sifre='{$_POST["sifre"]}'")->fetch(PDO::FETCH_ASSOC)) {
    
    $_SESSION["ad_soyad"]=$sec["ad_soyad"];
    $_SESSION["eposta"]=$sec["eposta"];
    $_SESSION["id"] = $sec["id"];
    $_SESSION["tarih"] = $sec["tarih"];
    $_SESSION["telefon"] = $sec["telefon"];
    
    $guncelle = $db->prepare("update yonetici set son_giris=:son_giris,ip=:ip");
    $hemen = $guncelle->execute(array("son_giris"=>$tarih,"ip"=>$_SERVER["REMOTE_ADDR"]));
    
     header('location:../index.php?durum=Basarili');
    
   } else {
       
        header('location:'.$_POST['link'].'?durum=Hata');
   }
    
    
}


if(isset($_POST['hesabim-guncelle'])){
    
    if($_POST["sifre"]!=''){
        
         $ekle = $db->prepare("update uyeler set email=:email,telefon=:telefon,adsoyad=:adsoyad,sifre=:sifre where id=:id");
    $hemen = $ekle->execute(array("email"=>$_POST["email"],"telefon"=>$_POST["telefon"],"adsoyad"=>$_POST["adsoyad"],"sifre"=>$_POST["sifre"],"id"=>$_POST["uye"]));
     if($hemen){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    }else {
         $ekle = $db->prepare("update uyeler set email=:email,telefon=:telefon,adsoyad=:adsoyad where id=:id");
    $hemen = $ekle->execute(array("email"=>$_POST["email"],"telefon"=>$_POST["telefon"],"adsoyad"=>$_POST["adsoyad"],"id"=>$_POST["uye"]));
     if($hemen){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    }
   
}

if(isset($_POST['yonetici-ekle'])){
    
    $ekle = $db->prepare("insert into yonetici set ad_soyad=:ad_soyad,eposta=:eposta,sifre=:sifre,ilk_giris=:ilk_giris");
    $simdi = $ekle->execute(array("ad_soyad"=>$_POST["ad_soyad"],"eposta"=>$_POST["eposta"],"sifre"=>$_POST["sifre"],"ilk_giris"=>$tarih));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}

if(isset($_POST["menu-ekle"])){
    
    $ekle = $db->prepare("insert into  menu set footer=:footer,sira=:sira,adi=:adi,url=:url,kategori=:kategori,acilir=:acilir,durum=:durum,sekme=:sekme");
    $simdi = $ekle->execute(array("footer"=>$_POST["footer"],"sekme"=>$_POST["sekme"],"sira"=>$_POST["sira"],"adi"=>$_POST["adi"],"url"=>$_POST["url"],"acilir"=>$_POST["acilir"],"durum"=>$_POST["durum"],"kategori"=>$_POST["kategori"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}

if(isset($_POST["menu-guncelle"])){
    
    $ekle = $db->prepare("update   menu set footer=:footer,sekme=:sekme,sira=:sira,adi=:adi,url=:url,kategori=:kategori,acilir=:acilir,durum=:durum where id=:id");
    $simdi = $ekle->execute(array("footer"=>$_POST["footer"],"sekme"=>$_POST["sekme"],"sira"=>$_POST["sira"],"adi"=>$_POST["adi"],"url"=>$_POST["url"],"acilir"=>$_POST["acilir"],"durum"=>$_POST["durum"],"kategori"=>$_POST["kategori"],"id"=>$_POST["id"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}


if(isset($_POST['sube-ekle'])){
    
    $ekle = $db->prepare("insert into subeler set durum=:durum,dil=:dil,adi=:adi,telefon1=:telefon1,telefon2=:telefon2,adres=:adres,maps=:maps,email1=:email1,email2=:email2");
    $simdi = $ekle->execute(array("adi"=>$_POST["adi"],"durum"=>$_POST["durum"],"dil"=>$_POST["dil"],"telefon1"=>$_POST["telefon1"],"telefon2"=>$_POST["telefon2"],"adres"=>$_POST["adres"],"maps"=>$_POST["maps"],"email1"=>$_POST["email1"],"email2"=>$_POST["email2"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}


if(isset($_POST['sube-guncelle'])){
    
    $ekle = $db->prepare("update subeler set durum=:durum,dil=:dil,adi=:adi,telefon1=:telefon1,telefon2=:telefon2,adres=:adres,maps=:maps,email1=:email1,email2=:email2 where id=:id");
    $simdi = $ekle->execute(array("adi"=>$_POST["adi"],"durum"=>$_POST["durum"],"dil"=>$_POST["dil"],"telefon1"=>$_POST["telefon1"],"telefon2"=>$_POST["telefon2"],"adres"=>$_POST["adres"],"maps"=>$_POST["maps"],"email1"=>$_POST["email1"],"email2"=>$_POST["email2"],"id"=>$_POST["id"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}




if(isset($_POST['shopier-ayar'])){
    
    

$ekle = $db->prepare("update shopier set kullanici=:kullanici,sifre=:sifre where id=:id");

$simdi = $ekle->execute(array("kullanici"=>$_POST["kullanici"],"sifre"=>$_POST["sifre"],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST['paymax-ayar'])){
    
    

$ekle = $db->prepare("update paymax set api_user=:api_user,api_key=:api_key,api_magaza=:api_magaza,api_hash=:api_hash where id=:id");

$simdi = $ekle->execute(array("api_user"=>$_POST["api_user"],"api_key"=>$_POST["api_key"],"api_magaza"=>$_POST["api_magaza"],"api_hash"=>$_POST["api_hash"],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST['netgsm-ayar'])){
    
    

$ekle = $db->prepare("update netgsm set no=:no,gonderici=:gonderici,sifre=:sifre,mesaj=:mesaj,durum=:durum where id=:id");

$simdi = $ekle->execute(array("no"=>$_POST["no"],"gonderici"=>$_POST["gonderici"],"sifre"=>$_POST["sifre"],"durum"=>$_POST["durum"],"mesaj"=>$_POST["mesaj"],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST["odeme-turu-sec"])){
    
     $ekle = $db->prepare("update odeme_secenek set tur=:tur where id=:id");
    $simdi = $ekle->execute(array("tur"=>$_POST["tur"],"id"=>1));
     if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}

if(isset($_POST['yonetici-guncelle'])){
    
    if($_POST["sifre"]!=''){
        
        $ekle = $db->prepare("update yonetici set ad_soyad=:ad_soyad,eposta=:eposta,sifre=:sifre where id=:id");
    $simdi = $ekle->execute(array("ad_soyad"=>$_POST["ad_soyad"],"eposta"=>$_POST["eposta"],"sifre"=>$_POST["sifre"],"id"=>$_POST["id"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    }else {
        
        $ekle = $db->prepare("update yonetici set ad_soyad=:ad_soyad,eposta=:eposta where id=:id");
    $simdi = $ekle->execute(array("ad_soyad"=>$_POST["ad_soyad"],"eposta"=>$_POST["eposta"],"id"=>$_POST["id"]));
      if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    }
    
    
}

if(isset($_POST['modul-guncelle'])){
    
    $ekle = $db->prepare("update izinler set iyzico_durum=:iyzico_durum,netgsm_durum=:netgsm_durum,shopier_durum=:shopier_durum,paymax_durum=:paymax_durum,abone_durum=:abone_durum,modal_durum=:modal_durum,paket_durum=:paket_durum,banka_durum=:banka_durum,sube_durum=:sube_durum,katalog_durum=:katalog_durum,proje_durum=:proje_durum,proje_kategori_durum=:proje_kategori_durum,paytr_durum=:paytr_durum,banner_durum=:banner_durum,onecikan_durum=:onecikan_durum,destek_durum=:destek_durum,musteri_durum=:musteri_durum,siparis_durum=:siparis_durum,en=:en,urun_durum=:urun_durum,kategori_durum=:kategori_durum,istatik_durum=:istatik_durum,ref_durum=:ref_durum,hizmet_durum=:hizmet_durum,haber_durum=:haber_durum,sayfa_durum=:sayfa_durum,slider_durum=:slider_durum,sss_durum=:sss_durum,galeri_durum=:galeri_durum,video_durum=:video_durum,ekip_durum=:ekip_durum,yorum_durum=:yorum_durum,iletisim_durum=:iletisim_durum where id=:id");
	$simdi =$ekle->execute(array("iyzico_durum"=>$_POST["iyzico_durum"],"netgsm_durum"=>$_POST["netgsm_durum"],"shopier_durum"=>$_POST["shopier_durum"],"paymax_durum"=>$_POST["paymax_durum"],"abone_durum"=>$_POST["abone_durum"],"modal_durum"=>$_POST["modal_durum"],"paket_durum"=>$_POST["paket_durum"],"banka_durum"=>$_POST["banka_durum"],"sube_durum"=>$_POST["sube_durum"],"katalog_durum"=>$_POST["katalog_durum"],"proje_durum"=>$_POST["proje_durum"],"proje_kategori_durum"=>$_POST["proje_kategori_durum"],"paytr_durum"=>$_POST["paytr_durum"],"banner_durum"=>$_POST["banner_durum"],"onecikan_durum"=>$_POST["onecikan_durum"],"destek_durum"=>$_POST["destek_durum"],"musteri_durum"=>$_POST["musteri_durum"],"siparis_durum"=>$_POST["siparis_durum"],"en"=>$_POST['en'],"urun_durum"=>$_POST['urun_durum'],"kategori_durum"=>$_POST['kategori_durum'],"istatik_durum"=>$_POST['istatik_durum'],"ref_durum"=>$_POST['ref_durum'],"hizmet_durum"=>$_POST['hizmet_durum'],"haber_durum"=>$_POST['haber_durum'],"sayfa_durum"=>$_POST['sayfa_durum'],"slider_durum"=>$_POST['slider_durum'],"sss_durum"=>$_POST['sss_durum'],"galeri_durum"=>$_POST['galeri_durum'],"video_durum"=>$_POST['video_durum'],"ekip_durum"=>$_POST['ekip_durum'],"yorum_durum"=>$_POST['yorum_durum'],"iletisim_durum"=>$_POST['iletisim_durum'],"id"=>"1"));
	 if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}

if(isset($_POST["destek-olustur"])){
    
    $ekle = $db->prepare("insert into destek set uye=:uye,konu=:konu,mesaj=:mesaj,tarih=:tarih");
    $hemen  = $ekle->execute(array("uye"=>$_POST["uye"],"konu"=>$_POST["konu"],"mesaj"=>$_POST["mesaj"],"tarih"=>$tarih));
      if($hemen){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}


if(isset($_POST["destek-cevapla"])){
    
    $ekle = $db->prepare("update destek set cevap=:cevap,ctarih=:ctarih where id=:id");
    $hemen = $ekle->execute(array("cevap"=>$_POST["cevap"],"ctarih"=>$tarih,"id"=>$_POST["id"]));
     if($hemen){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}

if(isset($_POST["urun-yorum-guncelle"])){
    
     $ekle = $db->prepare("update urun_yorum set durum=:durum where id=:id");
    $simdi = $ekle->execute(array("durum"=>$_POST["durum"],"id"=>$_POST["id"]));
     if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}


if(isset($_POST["blog-yorum-guncelle"])){
    
     $ekle = $db->prepare("update blog_yorum set durum=:durum where id=:id");
    $simdi = $ekle->execute(array("durum"=>$_POST["durum"],"id"=>$_POST["id"]));
     if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}


if(isset($_POST['abone-ol'])){
    
    
    if($_POST["email"]==''){
          header('location:'.$_POST['link'].'?durum=Hata');
    }else {
        $ekle = $db->prepare("insert into abone set adi=:adi,email=:email,tarih=:tarih");
    $simdi = $ekle->execute(array("email"=>$_POST['email'],"adi"=>$_POST["adi"],"tarih"=>$tarih));
     if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    }
}
if(isset($_POST["one-cikan"])){
    
    $urunler = $_POST['urunler'];
    $urunler = implode(',',$urunler);
    $ekle = $db->prepare("update onecikan set urunler=:urunler where id=:id");
    $simdi = $ekle->execute(array("urunler"=>$urunler,"id"=>1));
     if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
}


if(isset($_POST["sepet-sil"])){
    
    $ekle = $db->prepare("delete from sepet where id=:id");
    $simdi = $ekle->execute(array("id"=>$_POST["id"]));
    
    if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}


if(isset($_POST["sepet-ekle"])){
    
    $ekle = $db->prepare("insert into sepet set urun_id=:urun_id,uye=:uye,fiyat=:fiyat,ip=:ip,adet=:adet");
    $simdi = $ekle->execute(array("urun_id"=>$_POST["urun_id"],"uye"=>$_POST["uye"],"fiyat"=>$_POST["fiyat"],"ip"=>$_POST["ip"],"adet"=>$_POST["adet"]));
    
    if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }
    else {
        header('location:'.$_POST['link'].'?durum=Hata');
    }
    
}

if(isset($_POST["urun-yorum-ekle"])){
    $ekle = $db->prepare("insert into urun_yorum set yorum=:yorum,uye=:uye,urun_id=:urun_id,tarih=:tarih,durum=:durum");
    $simdi = $ekle->execute(array("yorum"=>$_POST["yorum"],"uye"=>$_POST["uye"],"urun_id"=>$_POST["urun_id"],"tarih"=>$_POST["tarih"],"durum"=>1));
    
    if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }else{
         header('location:'.$_POST['link'].'?durum=Hata');
    }
}






if(isset($_POST["blog-yorum-ekle"])){
    $ekle = $db->prepare("insert into blog_yorum set yorum=:yorum,uye=:uye,urun_id=:urun_id,tarih=:tarih,durum=:durum,email=:email");
    $simdi = $ekle->execute(array("yorum"=>$_POST["yorum"],"uye"=>$_POST["uye"],"urun_id"=>$_POST["urun_id"],"tarih"=>$tarih,"email"=>$_POST["email"],"durum"=>1));
    
    if($simdi){
        header('location:'.$_POST['link'].'?durum=Basarili');
    }else{
         header('location:'.$_POST['link'].'?durum=Hata');
    }
}



if(isset($_POST["giris-yap"])){
    
    
ob_start();
session_start();
   if($sec = $db->query("select * from uyeler where email='{$_POST["email"]}' and sifre='{$_POST["sifre"]}'")->fetch(PDO::FETCH_ASSOC)) {
    
    $_SESSION["adsoyad"]=$sec["adsoyad"];
    $_SESSION["email"]=$sec["email"];
    $_SESSION["id"] = $sec["id"];
    $_SESSION["tarih"] = $sec["tarih"];
    $_SESSION["telefon"] = $sec["telefon"];
    
     header('location:../../hesabim?durum=Basarili');
    
   } else {
       
        header('location:'.$_POST['link'].'?durum=Hata');
   }
    
    
}


if(isset($_POST["kayit-ol"])){
    
    if($_POST['sifre']==$_POST['sifre_dogrula']){
        
        if($esle = $db->query("select * from uyeler where email='{$_POST['email']}'")->fetch(PDO::FETCH_ASSOC)){
          header('location:'.$_POST['link'].'?durum=MailKayitli');	
       
        
        }else {
            
             $ekle = $db->prepare("insert into uyeler set adsoyad=:adsoyad,telefon=:telefon,email=:email,tarih=:tarih,sifre=:sifre");
        $simdi = $ekle->execute(array("adsoyad"=>$_POST["adsoyad"],"telefon"=>$_POST["telefon"],"email"=>$_POST["email"],"tarih"=>$tarih,"sifre"=>$_POST["sifre"]));
        if($simdi){
              header('location:'.$_POST['link'].'?durum=Basarili');	
        }
           
        }
        
    }else {
        header('location:'.$_POST['link'].'?durum=Hata');	
    }
}

if(isset($_POST['iletisim-formu'])){
	

	    
	    	$ekle = $db->prepare("insert into iletisimler set adsoyad=:adsoyad,konu=:konu,telefon=:telefon,mesaj=:mesaj,email=:email,tarih=:tarih");
	$hemen = $ekle->execute(array("adsoyad"=>$_POST['adsoyad'],"konu"=>$_POST['konu'],"telefon"=>$_POST['telefon'],"mesaj"=>$_POST['mesaj'],"tarih"=>$tarih,"email"=>$_POST['email']));
	
	if($hemen){
	     include '../../class.phpmailer.php';
								$mail = new PHPMailer();
								$mail->IsSMTP();
								$mail->Host = $smtp['site_mail_host'];
                                $mail->Port = $smtp['site_mail_port'];
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
								$mail->Username = $smtp['site_mail'];
								$mail->Password = $smtp['site_mail_sifre'];
								$mail->SetFrom($mail->Username, "Yeni Form Bildirimi");
								$mail->AddAddress($smtp['gonderen_mail'], "Yeni Form Bildirimi");
								$mail->CharSet = 'UTF-8';
								$mail->Subject = "Yeni Form Bildirimi";
								$mail->MsgHTML('İsim:'.$_POST["adsoyad"].'<br/>
												E-mail:'.$_POST["email"].'<br/>
												Telefon:'.$_POST["telefon"].'<br/>
													Konu:'.$_POST["konu"].'<br/>
											
												Mesaj:' .$_POST["mesaj"]. '<br/>');
					if($mail->Send()) 
					
					{ $db= 
					
					' <br>  &nbsp;  &nbsp;&nbsp;  
					<font style="color:#24b802; font-size:16px;">  Mesajınız başarıyla gönderildi.   </font>
					<br><br>' 
					
					;} 
					
					
					else 
					{ 
					
					$db= '<br> &nbsp; &nbsp; 
					
					<font style="color:#FF0004; font-size:16px;">  Mesaj gönderirken bir hata oluştu ve girmiş olduğunuz bilgiler alınamadı. </font> 
					
					<br><br>'. $mail->ErrorInfo;  
 					}
 					
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	
	}
}

if(isset($_POST['rezervasyon-formu'])){
	

	    
	    	$ekle = $db->prepare("insert into rezervasyon set adsoyad=:adsoyad,saat=:saat,adet=:adet,date=:date,konu=:konu,telefon=:telefon,mesaj=:mesaj,email=:email,tarih=:tarih");
	$hemen = $ekle->execute(array("adsoyad"=>$_POST['adsoyad'],"konu"=>$_POST['konu'],"telefon"=>$_POST['telefon'],"saat"=>$_POST['saat'],"date"=>$_POST['date'],"adet"=>$_POST['adet'],"mesaj"=>$_POST['mesaj'],"tarih"=>$tarih,"email"=>$_POST['email']));
	
	if($hemen){
	     include '../../class.phpmailer.php';
								$mail = new PHPMailer();
								$mail->IsSMTP();
								$mail->Host = $smtp['site_mail_host'];
                                $mail->Port = $smtp['site_mail_port'];
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = 'ssl';
								$mail->Username = $smtp['site_mail'];
								$mail->Password = $smtp['site_mail_sifre'];
								$mail->SetFrom($mail->Username, "Yeni Form Bildirimi");
								$mail->AddAddress($smtp['gonderen_mail'], "Yeni Form Bildirimi");
								$mail->CharSet = 'UTF-8';
								$mail->Subject = "Yeni Form Bildirimi";
								$mail->MsgHTML('İsim:'.$_POST["adsoyad"].'<br/>
												E-mail:'.$_POST["email"].'<br/>
												Telefon:'.$_POST["telefon"].'<br/>
													Konu:'.$_POST["konu"].'<br/>
											
												Mesaj:' .$_POST["mesaj"]. '<br/>');
					if($mail->Send()) 
					
					{ $db= 
					
					' <br>  &nbsp;  &nbsp;&nbsp;  
					<font style="color:#24b802; font-size:16px;">  Mesajınız başarıyla gönderildi.   </font>
					<br><br>' 
					
					;} 
					
					
					else 
					{ 
					
					$db= '<br> &nbsp; &nbsp; 
					
					<font style="color:#FF0004; font-size:16px;">  Mesaj gönderirken bir hata oluştu ve girmiş olduğunuz bilgiler alınamadı. </font> 
					
					<br><br>'. $mail->ErrorInfo;  
 					}
 					
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');
		
	}
}

if(isset($_POST['genel-ayarlar'])){
    
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['site_title']);






	$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['logo']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$logo = $ayar_kaydi['logo'];
	}
	else
	{
		if ($_FILES["logo"]["type"] =="image/gif" || $_FILES["logo"]["type"] =="image/png"|| $_FILES["logo"]["type"] =="image/jpg"|| $_FILES["logo"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['logo']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['logo']);	  
			}
			
			$random = rand(0,995959999);
			
			$logo = $random."-".$seo.".".substr($_FILES['logo']['name'], -3);
			
			move_uploaded_file($_FILES['logo']['tmp_name'],$klasor."/".$logo);
			
			
		




			
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
	$resim_tmp1 = $_FILES['footer_logo']['tmp_name'];
	
	if(empty($resim_tmp1))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$footer_logo = $ayar_kaydi['footer_logo'];
	}
	else
	{
		if ($_FILES["footer_logo"]["type"] =="image/gif" || $_FILES["footer_logo"]["type"] =="image/png"|| $_FILES["footer_logo"]["type"] =="image/jpg"|| $_FILES["footer_logo"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['footer_logo']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['footer_logo']);	  
			}
			
			$random = rand(0,995959999);
			
			$footer_logo = $random."-".$seo.".".substr($_FILES['footer_logo']['name'], -3);
			
			move_uploaded_file($_FILES['footer_logo']['tmp_name'],$klasor."/".$footer_logo);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
	$resim_tmp2 = $_FILES['favicon']['tmp_name'];
	
	if(empty($resim_tmp2))
	{
		$duzenlenecek_id = 1;
		$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$favicon = $ayar_kaydi['favicon'];
	}
	else
	{
		if ($_FILES["favicon"]["type"] =="image/gif" || $_FILES["favicon"]["type"] =="image/png"|| $_FILES["favicon"]["type"] =="image/jpg"|| $_FILES["favicon"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM ayarlar WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['favicon']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['favicon']);	  
			}
			
			$random = rand(0,995959999);
			
			$favicon = $random."-".$seo.".".substr($_FILES['favicon']['name'], -3);
			
			move_uploaded_file($_FILES['favicon']['tmp_name'],$klasor."/".$favicon);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	

	
	
	$ekle  = $db->prepare("update ayarlar set p_renk1=:p_renk1,p_renk2=:p_renk2,header=:header,footer=:footer,renk2=:renk2,renk=:renk,footer_copyright=:footer_copyright,site_title=:site_title,site_description=:site_description,site_author=:site_author,site_meta=:site_meta,site_keyword=:site_keyword,logo=:logo,favicon=:favicon,footer_logo=:footer_logo where id=:id");
	
	$simdi = $ekle->execute(array("p_renk2"=>$_POST["p_renk2"],"p_renk1"=>$_POST["p_renk1"],"footer"=>$_POST["footer"],"header"=>$_POST["header"],"renk2"=>$_POST['renk2'],"renk"=>$_POST['renk'],"footer_copyright"=>$_POST['footer_copyright'],"site_title"=>$_POST['site_title'],"site_meta"=>$_POST['site_meta'],"site_description"=>$_POST['site_description'],"site_author"=>$_POST['site_author'],"site_keyword"=>$_POST['site_keyword'],"logo"=>$logo,"footer_logo"=>$footer_logo,"favicon"=>$favicon,"id"=>1));

    	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
    
}

if(isset($_POST["genel-ayarlar1"])){
    	$ekle  = $db->prepare("update panel set p_renk1=:p_renk1,p_renk2=:p_renk2 where id=:id");
	
	$simdi = $ekle->execute(array("p_renk2"=>$_POST["p_renk2"],"p_renk1"=>$_POST["p_renk1"],"id"=>1));

    	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST['kategori-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "urun_kategori";


$klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
			      	$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	  
	 $simdi = $db->prepare("insert into urun_kategori set title=:title,description=:description,etiket=:etiket,dil=:dilk,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST['adi'],"dil"=>$_POST["dil"],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"durum"=>$_POST['durum'],"eklenme_tarihi"=>$tarih));
	if($ekle){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}

if(isset($_POST['kategori-guncelle'])){
    
       function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);

$tur = "urun_kategori";



    $id = $_POST['id'];
		$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM urun_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM urun_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();

imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
		
		
		

		
		
		
	 $simdi1 = $db->prepare("update urun_kategori set title=:title,description=:description,etiket=:etiket,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST['adi'],"dil"=>$_POST["dil"],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$onaciklama,"durum"=>$_POST['durum'],"guncelleme_tarihi"=>$tarih,"id"=>$id));
		if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST['proje-kategori-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "proje_kategori";


$klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
	
			$random = rand(0,9999999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim);
			
			      
	
	}
	
	
$klasorbanka="../../resimler/";
	$resim_tmpbanka2 = $_FILES['resim2']['tmp_name'];
	if(empty($resim_tmpbanka2))
	{
		$resim2 = "resim-yok";
	}
	else
	{
	
			$random = rand(0,9999999);
			
			$resim2 = $random."-".$seo.".".substr($_FILES['resim2']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim);
			
			      
	
	}
	
	  
	 $simdi = $db->prepare("insert into proje_kategori set title=:title,description=:description,etiket=:etiket,aciklama2=:aciklama2,resim2=:resim2,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST['adi'],"dil"=>$_POST["dil"],"aciklama2"=>$_POST["aciklama2"],"resim2"=>$resim2,"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"durum"=>$_POST['durum'],"eklenme_tarihi"=>$tarih));
	if($ekle){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}

if(isset($_POST['proje-kategori-guncelle'])){
    
       function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);

$tur = "proje_kategori";



    $id = $_POST['id'];
		$klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM proje_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM proje_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
	$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
		
	
	
	}
	
			$klasord="../../resimler/";
	   $resim_tmpd2 = $_FILES['resim2']['tmp_name'];
	if(empty($resim_tmpd2))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM proje_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim2 = $ayar_kaydi['resim2'];
	}
	else
	{
		
		
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM proje_kategori WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim2']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim2']);	  
			}
			
			$random = rand(0,999);
			
	$resim2 = $random."-".$seo.".".substr($_FILES['resim2']['name'], -3);			
			move_uploaded_file($_FILES['resim2']['tmp_name'],$klasord."/".$resim2);
		
	
	
	}
		
		
		

		
		
		
	 $simdi1 = $db->prepare("update proje_kategori set title=:title,description=:description,etiket=:etiket,aciklama2=:aciklama2,resim2=:resim2,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST['adi'],"dil"=>$_POST["dil"],"resim2"=>$resim2,"aciklama2"=>$_POST["aciklama2"],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$onaciklama,"durum"=>$_POST['durum'],"guncelleme_tarihi"=>$tarih,"id"=>$id));
		if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}

if(isset($_POST['urun-ekle'])){
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    $tur = "urunler";
    $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	  
	  
	  
	 $simdi = $db->prepare("insert into urunler set title=:title,etiket=:etiket,description=:description,kur=:kur,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"etiket"=>$_POST["etiket"],"description"=>$_POST["description"],"indir"=>$_POST['indir'],"kur"=>$_POST["kur"],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"eklenme_tarihi"=>$tarih));
	if($ekle){
		
		
		
		  $sonid=$db->query("select * from urunler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}


if(isset($_POST['urun-guncelle'])){
    
    $id = $_POST['id'];
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    
    $tur = "urunler";
    
    		 $klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM urunler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM urunler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
		
		
		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	

		
		
		
	 $simdi1 = $db->prepare("update urunler set title=:title,etiket=:etiket,description=:description,kur=:kur,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"etiket"=>$_POST["etiket"],"description"=>$_POST["description"],"kur"=>$_POST["kur"],"indir"=>$_POST['indir'],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	if($ekle1){
		
		
		
	
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}



if(isset($_POST['paket-ekle'])){
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    $tur = "paketler";
    $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	  
	  
	  
	 $simdi = $db->prepare("insert into paketler set kur=:kur,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("indir"=>$_POST['indir'],"kur"=>$_POST["kur"],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"eklenme_tarihi"=>$tarih));
	if($ekle){
		
		
		
		  $sonid=$db->query("select * from paketler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}


if(isset($_POST['paket-guncelle'])){
    
    $id = $_POST['id'];
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    
    $tur = "paketler";
    
    		 $klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM paketler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM paketler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
		
		
		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	

		
		
		
	 $simdi1 = $db->prepare("update paketler set kur=:kur,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("kur"=>$_POST["kur"],"indir"=>$_POST['indir'],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	if($ekle1){
		
		
		
	
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}


if(isset($_POST['proje-ekle'])){
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    $tur = "projeler";
    $klasorbanka="../../resimler/";
	$resim_tmpbanka = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpbanka))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,9999999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasorbanka."/".$resim1);
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	  
	  
	  
	 $simdi = $db->prepare("insert into projeler set title=:title,description=:description,etiket=:etiket,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"indir"=>$_POST['indir'],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"eklenme_tarihi"=>$tarih));
	if($ekle){
		
		
		
		  $sonid=$db->query("select * from projeler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}


if(isset($_POST['proje-guncelle'])){
    
    $id = $_POST['id'];
    
           function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}
$seo= seflink($_POST['adi']);
    
    $tur = "projeler";
    
    		 $klasord="../../resimler/";
	   $resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
    	$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM projeler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
		    
		    	$ayar_kaydi = $db->query("SELECT * FROM projeler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.$_FILES['resim'];
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
		
		
		  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='projeler' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }
	

		
		
		
	 $simdi1 = $db->prepare("update projeler set title=:title,description=:description,etiket=:etiket,dil=:dil,indir=:indir,panel=:panel,videolinki=:videolinki,linki=:linki,fiyat=:fiyat,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"indir"=>$_POST['indir'],"dil"=>$_POST["dil"],"panel"=>$_POST['panel'],"videolinki"=>$_POST['videolinki'],"fiyat"=>$_POST['fiyat'],"adi"=>$_POST['adi'],"linki"=>$_POST['linki'],"sira"=>$_POST['sira'],"resim"=>$resim,"kategori"=>$_POST['kategori'],"aciklama"=>$_POST['aciklama'],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST['onaciklama'],"durum"=>$_POST['durum'],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	if($ekle1){
		
		
		
	
		
				header('location:'.$_POST['link'].'?durum=Basarili');
	
	}else {
	    		header('location:'.$_POST['link'].'?durum=Hata');
	}
}

if(isset($_POST['smtp-ayar'])){
    
    $ekle = $db->prepare("update mail set gonderen_mail=:gonderen_mail,site_mail=:site_mail,site_mail_sifre=:site_mail_sifre,site_mail_host=:site_mail_host,site_mail_port=:site_mail_port where id=:id");

$simdi = $ekle->execute(array("gonderen_mail"=>$_POST['gonderen_mail'],"site_mail"=>$_POST['site_mail'],"site_mail_sifre"=>$_POST['site_mail_sifre'],"site_mail_host"=>$_POST['site_mail_host'],"site_mail_port"=>$_POST['site_mail_port'],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}


if(isset($_POST['sosyal-medya'])){
    
    $ekle = $db->prepare("update sosyalmedya set instagram=:instagram,facebook=:facebook,twitter=:twitter,telegram=:telegram,linkedin=:linkedin,pinterest=:pinterest,youtube=:youtube where id=:id");

$simdi = $ekle->execute(array("instagram"=>$_POST["instagram"],"facebook"=>$_POST["facebook"],"twitter"=>$_POST["twitter"],"telegram"=>$_POST["telegram"],"linkedin"=>$_POST["linkedin"],"youtube"=>$_POST["youtube"],"pinterest"=>$_POST["pinterest"],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}


if(isset($_POST['iletisim-bilgileri'])){
    
  $simdi =$db->prepare("update iletisimbilgileri set wp_renk=:wp_renk,wp_text=:wp_text,whatsapp=:whatsapp,google_maps=:google_maps,telefon1=:telefon1,telefon2=:telefon2,adres1=:adres1,adres2=:adres2,email1=:email1,email2=:email2 where id=:id");
	$hemen = $simdi->execute(array("wp_renk"=>$_POST["wp_renk"],"wp_text"=>$_POST["wp_text"],"whatsapp"=>$_POST['whatsapp'],"google_maps"=>$_POST['google_maps'],"telefon1"=>$_POST['telefon1'],"telefon2"=>$_POST['telefon2'],"adres1"=>$_POST['adres1'],"adres2"=>$_POST['adres2'],"email1"=>$_POST['email1'],"email2"=>$_POST['email2'],"id"=>1));




	if($hemen){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}
}


if(isset($_POST['paytr-ayar'])){
    
    

$ekle = $db->prepare("update paytr set merchand_id=:merchand_id,merchand_key=:merchand_key,merchand_salt=:merchand_salt where id=:id");

$simdi = $ekle->execute(array("merchand_id"=>$_POST['merchand_id'],"merchand_key"=>$_POST['merchand_key'],"merchand_salt"=>$_POST['merchand_salt'],"id"=>1));
	if($simdi){
		header('location:'.$_POST['link'].'?durum=gonderildi');
	}else {
		header('location:'.$_POST['link'].'?durum=gonderilmedi');	
	}
}

if(isset($_POST['sayfa-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "sayfalar";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into sayfalar set title=:title,description=:description,etiket=:etiket,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$kategori,"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"eklenme_tarihi"=>$tarih));

    

	if($ekle){
	    
	      $sonid=$db->query("select * from sayfalar order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?, tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['sayfa-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "sayfalar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM sayfalar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM sayfalar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='sayfalar' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }

		
		
		
	 $simdi1 = $db->prepare("update sayfalar set title=:title,etiket=:etiket,description=:description,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$_POST["kategori"],"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		


if(isset($_POST['beadcrumb-duzenle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "sayfalar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM beadcrumb WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM beadcrumb WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  

		
		
		
	 $simdi1 = $db->prepare("update beadcrumb set adi=:adi,resim=:resim,durum=:durum where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"resim"=>$resim,"durum"=>$_POST["durum"],"id"=>1));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}


if(isset($_POST['hakkimizda-duzenle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "sayfalar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmpc = $_FILES['hresim']['tmp_name'];
	
	if(empty($resim_tmpc))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM hakkimizda WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["hresim"]["type"] =="image/gif" || $_FILES["hresim"]["type"] =="image/png"|| $_FILES["hresim"]["type"] =="image/jpg"|| $_FILES["hresim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM hakkimizda WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['hresim']['name'], -3);
			
			move_uploaded_file($_FILES['hresim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  

		
		
		
	 $simdi1 = $db->prepare("update hakkimizda set footer=:footer,video=:video,aciklama=:aciklama,adi=:adi,resim=:resim,durum=:durum where id=:id");
	$ekle1 = $simdi1->execute(array("footer"=>$_POST["footer"],"video"=>$_POST["video"],"aciklama"=>$_POST["aciklama"],"adi"=>$_POST["adi"],"resim"=>$resim,"durum"=>$_POST["durum"],"id"=>1));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}

if(isset($_POST['modal-duzenle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "sayfalar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM modal WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM modal WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".'modal'.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.'modal'.'.webp';
$resim=$random.'-'.'modal'.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  

		
		
		
	 $simdi1 = $db->prepare("update modal set adi=:adi,resim=:resim,durum=:durum where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"resim"=>$resim,"durum"=>$_POST["durum"],"id"=>1));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}

if(isset($_POST['haber-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "haberler";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into haberler set title=:title,description=:description,etiket=:etiket,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"dil"=>$_POST["dil"],"adi"=>$_POST["adi"],"etiket"=>$_POST["etiket"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$kategori,"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"eklenme_tarihi"=>$tarih));

    

	if($ekle){
	    
	      $sonid=$db->query("select * from haberler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?, tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['haber-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "haberler";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM haberler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM haberler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='haberler' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }

		
		
		
	 $simdi1 = $db->prepare("update haberler set title=:title,description=:description,etiket=:etiket,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("title"=>$_POST["title"],"description"=>$_POST["description"],"adi"=>$_POST["adi"],"etiket"=>$_POST["etiket"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$_POST["kategori"],"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	


if(isset($_POST['hizmet-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "hizmetler";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	$resim_tmpdd = $_FILES['icon']['tmp_name'];
	if(empty($resim_tmpdd))
	{
		$icon = "resim-yok";
	}
	else
	{
		
	
			$random = rand(0,999);
			
			$icon = $random."-".$seo.".".substr($_FILES['icon']['name'], -3);
			
			move_uploaded_file($_FILES['icon']['tmp_name'],$klasord."/".$icon);
			
		
	
	
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into hizmetler set title=:title,description=:description,icon=:icon,etiket=:etiket,dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("title"=>$_POST["title"],"icon"=>$icon,"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"dil"=>$_POST["dil"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$kategori,"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"eklenme_tarihi"=>$tarih));

    

	if($ekle){
	    
	      $sonid=$db->query("select * from hizmetler order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?, tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['hizmet-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "hizmetler";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	$resim_tmpd = $_FILES['icon']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$icon = $ayar_kaydi['icon'];
	}
	else
	{
		
			
			$ayar_kaydi = $db->query("SELECT * FROM hizmetler WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['icon']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['icon']);	  
			}
			
			$random = rand(0,999);
			
			$icon = $random."-".$adii.".".substr($_FILES['icon']['name'], -3);
			
			move_uploaded_file($_FILES['icon']['tmp_name'],$klasor."/".$icon);
			
			
						
	
	
	}
	
		
		 
	  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='hizmetler' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }

		
		
		
	 $simdi1 = $db->prepare("update hizmetler set title=:title,description=:description,etiket=:etiket,icon=:icon,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("icon"=>$icon,"title"=>$_POST["title"],"description"=>$_POST["description"],"etiket"=>$_POST["etiket"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$_POST["kategori"],"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		


if(isset($_POST['referans-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into referanslar set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['referans-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "referanslar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM referanslar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM referanslar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update referanslar set adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		

if(isset($_POST['dil-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		$resim_tmpd1 = $_FILES['resim1']['tmp_name'];
	if(empty($resim_tmpd1))
	{
		$resim1 = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim1"]["type"] =="image/gif" || $_FILES["resim1"]["type"] =="image/png"|| $_FILES["resim1"]["type"] =="image/jpg"|| $_FILES["resim1"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim1']['name'], -3);
			
			move_uploaded_file($_FILES['resim1']['tmp_name'],$klasord."/".$resim1);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		$resim_tmpd11 = $_FILES['resim2']['tmp_name'];
	if(empty($resim_tmpd11))
	{
		$resim2 = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim2"]["type"] =="image/gif" || $_FILES["resim2"]["type"] =="image/png"|| $_FILES["resim2"]["type"] =="image/jpg"|| $_FILES["resim2"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim2 = $random."-".$seo.".".substr($_FILES['resim2']['name'], -3);
			
			move_uploaded_file($_FILES['resim2']['tmp_name'],$klasord."/".$resim2);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into dil set resim2=:resim2,resim1=:resim1,urunler=:urunler,a_madde=:a_madde,b_madde=:b_madde,c_madde=:c_madde,d_madde=:d_madde,v_link=:v_link,v_baslik=:v_baslik,digerhizmetler=:digerhizmetler,adres=:adres,neden=:neden,footer_h=:footer_h,abone_a=:abone_a,ozgecmis=:ozgecmis,fiyatteklif=:fiyatteklif,hizliteklif=:hizliteklif,aboneol=:aboneol,ekipmanlar=:ekipmanlar,kariyer_aciklama=:kariyer_aciklama,onyazi=:onyazi,muhasebe=:muhasebe,satis=:satis,pazarlama=:pazarlama,operasyon=:operasyon,departman=:departman,calismak=:calismak,kariyer=:kariyer,subeler=:subeler,yorumatabilirsiniz=:yorumatabilirsiniz,blogyorumlari=:blogyorumlari,digerbloglar=:digerbloglar,etiketler=:etiketler,anadil=:anadil,alan=:alan,adsoyad=:adsoyad,telefon=:telefon,konu=:konu,mesaj=:mesaj,email=:email,iletisimbilgileri=:iletisimbilgileri,sosyalmedya=:sosyalmedya,urunler=:urunler,anasayfa=:anasayfa,hizliiletisim=:hizliiletisim,kurumsal=:kurumsal,galeri=:galeri,video=:video,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama,inceleyin=:inceleyin,iletisim=:iletisim,tumunuokuyun=:tumunuokuyun,tumunugor=:tumunugor,hizmetler=:hizmetler,ekibimiz=:ekibimiz,
	 projeler=:projeler,tumu=:tumu,sikcasorulansorular=:sikcasorulansorular,istatikler=:istatikler,gonder=:gonder,blog=:blog,yorumlar=:yorumlar,banner=:banner,bizimle=:bizimle,medya=:medya,urunbilgileri=:urunbilgileri,satinal=:satinal,sepeteekle=:sepeteekle,
	 sepetim=:sepetim,urunresmi=:urunresmi,urunadi=:urunadi,urunadet=:urunadet,urunfiyat=:urunfiyat,islem=:islem,siparisbilgileri=:siparisbilgileri,siparisitamamla=:siparisitamamla,bankahesaplari=:bankahesaplari,referanslar=:referanslar,kataloglar=:kataloglar
	 
	 ");
	$ekle = $simdi->execute(array("resim2"=>$resim2,"resim1"=>$resim1,"urunler"=>$_POST["urunler"],"a_madde"=>$_POST["a_madde"],"b_madde"=>$_POST["b_madde"],"c_madde"=>$_POST["c_madde"],"d_madde"=>$_POST["d_madde"],"v_link"=>$_POST["v_link"],"v_baslik"=>$_POST["v_baslik"],"digerhizmetler"=>$_POST["digerhizmetler"],"adres"=>$_POST["adres"],"neden"=>$_POST["neden"],"abone_a"=>$_POST["abone_a"],"footer_h"=>$_POST["footer_h"],"ozgecmis"=>$_POST["ozgecmis"],"hizliteklif"=>$_POST["hizliteklif"],"fiyatteklif"=>$_POST["fiyatteklif"],"kariyer_aciklama"=>$_POST["kariyer_aciklama"],"ekipmanlar"=>$_POST["ekipmanlar"],"aboneol"=>$_POST["aboneol"],"operasyon"=>$_POST["operasyon"],"onyazi"=>$_POST["onyazi"],"muhasebe"=>$_POST["muhasebe"],"satis"=>$_POST["satis"],"pazarlama"=>$_POST["pazarlama"],"subeler"=>$_POST["subeler"],"departman"=>$_POST["departman"],"calismak"=>$_POST["calismak"],"kariyer"=>$_POST["kariyer"],"blogyorumlari"=>$_POST["blogyorumlari"],"yorumatabilirsiniz"=>$_POST["yorumatabilirsiniz"],"digerbloglar"=>$_POST["digerbloglar"],"etiketler"=>$_POST["etiketler"],"anadil"=>$_POST["anadil"],"alan"=>$_POST["alan"],"adsoyad"=>$_POST["adsoyad"],"telefon"=>$_POST["telefon"],"konu"=>$_POST["konu"],"mesaj"=>$_POST["mesaj"],"email"=>$_POST["email"],"iletisimbilgileri"=>$_POST["iletisimbilgileri"],"sosyalmedya"=>$_POST["sosyalmedya"],"urunler"=>$_POST["urunler"],"anasayfa"=>$_POST["anasayfa"],"hizliiletisim"=>$_POST["hizliiletisim"],"kurumsal"=>$_POST["kurumsal"],"video"=>$_POST["video"],"galeri"=>$_POST["galeri"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"inceleyin"=>$_POST["inceleyin"],"iletisim"=>$_POST["iletisim"],"tumunuokuyun"=>$_POST["tumunuokuyun"],"tumunugor"=>$_POST["tumunugor"],
	"hizmetler"=>$_POST["hizmetler"],"ekibimiz"=>$_POST["ekibimiz"],"projeler"=>$_POST["projeler"],"tumu"=>$_POST["tumu"],"sikcasorulansorular"=>$_POST["sikcasorulansorular"],"istatikler"=>$_POST["istatikler"],"gonder"=>$_POST["gonder"],"blog"=>$_POST["blog"],
	"yorumlar"=>$_POST["yorumlar"],"banner"=>$_POST["banner"],"bizimle"=>$_POST["bizimle"],"medya"=>$_POST["medya"],"urunbilgileri"=>$_POST["urunbilgileri"],"satinal"=>$_POST["satinal"],"sepeteekle"=>$_POST["sepeteekle"],"sepetim"=>$_POST["sepetim"],"urunresmi"=>$_POST["urunresmi"],
	"urunadi"=>$_POST["urunadi"],"urunadet"=>$_POST["urunadet"],"urunfiyat"=>$_POST["urunfiyat"],"islem"=>$_POST["islem"],"siparisbilgileri"=>$_POST["siparisbilgileri"],"siparisitamamla"=>$_POST["siparisitamamla"],"bankahesaplari"=>$_POST["bankahesaplari"],"referanslar"=>$_POST["referanslar"],"kataloglar"=>$_POST["kataloglar"]
	
	
	));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['dil-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "dil";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		$resim_tmp1 = $_FILES['resim1']['tmp_name'];
	
	if(empty($resim_tmp1))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim1 = $ayar_kaydi['resim1'];
	}
	else
	{
		if ($_FILES["resim1"]["type"] =="image/gif" || $_FILES["resim1"]["type"] =="image/png"|| $_FILES["resim1"]["type"] =="image/jpg"|| $_FILES["resim1"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim1']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim1']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim1']['name'], -3);
			
			move_uploaded_file($_FILES['resim1']['tmp_name'],$klasor."/".$resim1);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
			$resim_tmp11 = $_FILES['resim2']['tmp_name'];
	
	if(empty($resim_tmp11))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim2 = $ayar_kaydi['resim2'];
	}
	else
	{
		if ($_FILES["resim2"]["type"] =="image/gif" || $_FILES["resim2"]["type"] =="image/png"|| $_FILES["resim2"]["type"] =="image/jpg"|| $_FILES["resim2"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM dil WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim2']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim2']);	  
			}
			
			$random = rand(0,999);
			
			$resim2 = $random."-".$adii.".".substr($_FILES['resim2']['name'], -3);
			
			move_uploaded_file($_FILES['resim2']['tmp_name'],$klasor."/".$resim2);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update dil set resim1=:resim1,resim2=:resim2,urunler=:urunler,a_madde=:a_madde,b_madde=:b_madde,c_madde=:c_madde,d_madde=:d_madde,v_link=:v_link,v_baslik=:v_baslik,digerhizmetler=:digerhizmetler,adres=:adres,neden=:neden,footer_h=:footer_h,abone_a=:abone_a,ozgecmis=:ozgecmis,fiyatteklif=:fiyatteklif,hizliteklif=:hizliteklif,ekipmanlar=:ekipmanlar,aboneol=:aboneol,kariyer_aciklama=:kariyer_aciklama,onyazi=:onyazi,muhasebe=:muhasebe,satis=:satis,pazarlama=:pazarlama,operasyon=:operasyon,departman=:departman,calismak=:calismak,kariyer=:kariyer,subeler=:subeler,digerbloglar=:digerbloglar,etiketler=:etiketler,anadil=:anadil,alan=:alan,adsoyad=:adsoyad,telefon=:telefon,konu=:konu,mesaj=:mesaj,email=:email,iletisimbilgileri=:iletisimbilgileri,sosyalmedya=:sosyalmedya,urunler=:urunler,anasayfa=:anasayfa,hizliiletisim=:hizliiletisim,kurumsal=:kurumsal,galeri=:galeri,video=:video,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama,inceleyin=:inceleyin,iletisim=:iletisim,tumunuokuyun=:tumunuokuyun,tumunugor=:tumunugor,hizmetler=:hizmetler,ekibimiz=:ekibimiz,
	 projeler=:projeler,tumu=:tumu,sikcasorulansorular=:sikcasorulansorular,istatikler=:istatikler,gonder=:gonder,blog=:blog,yorumlar=:yorumlar,banner=:banner,bizimle=:bizimle,medya=:medya,urunbilgileri=:urunbilgileri,satinal=:satinal,sepeteekle=:sepeteekle,
	 sepetim=:sepetim,urunresmi=:urunresmi,urunadi=:urunadi,urunadet=:urunadet,urunfiyat=:urunfiyat,islem=:islem,siparisbilgileri=:siparisbilgileri,siparisitamamla=:siparisitamamla,bankahesaplari=:bankahesaplari,referanslar=:referanslar,kataloglar=:kataloglar where id=:id");
	$ekle1 = $simdi1->execute(array("resim1"=>$resim1,"resim2"=>$resim2,"urunler"=>$_POST["urunler"],"a_madde"=>$_POST["a_madde"],"b_madde"=>$_POST["b_madde"],"c_madde"=>$_POST["c_madde"],"d_madde"=>$_POST["d_madde"],"v_link"=>$_POST["v_link"],"v_baslik"=>$_POST["v_baslik"],"adres"=>$_POST["adres"],"digerhizmetler"=>$_POST["digerhizmetler"],"neden"=>$_POST["neden"],"abone_a"=>$_POST["abone_a"],"footer_h"=>$_POST["footer_h"],"ozgecmis"=>$_POST["ozgecmis"],"hizliteklif"=>$_POST["hizliteklif"],"fiyatteklif"=>$_POST["fiyatteklif"],"ekipmanlar"=>$_POST["ekipmanlar"],"aboneol"=>$_POST["aboneol"],"operasyon"=>$_POST["operasyon"],"onyazi"=>$_POST["onyazi"],"muhasebe"=>$_POST["muhasebe"],"satis"=>$_POST["satis"],"pazarlama"=>$_POST["pazarlama"],"subeler"=>$_POST["subeler"],"departman"=>$_POST["departman"],"calismak"=>$_POST["calismak"],"kariyer"=>$_POST["kariyer"],"digerbloglar"=>$_POST["digerbloglar"],"etiketler"=>$_POST["etiketler"],"anadil"=>$_POST["anadil"],"alan"=>$_POST["alan"],"adsoyad"=>$_POST["adsoyad"],"telefon"=>$_POST["telefon"],"konu"=>$_POST["konu"],"mesaj"=>$_POST["mesaj"],"email"=>$_POST["email"],"iletisimbilgileri"=>$_POST["iletisimbilgileri"],"sosyalmedya"=>$_POST["sosyalmedya"],"urunler"=>$_POST["urunler"],"anasayfa"=>$_POST["anasayfa"],"hizliiletisim"=>$_POST["hizliiletisim"],"kurumsal"=>$_POST["kurumsal"],"video"=>$_POST["video"],"galeri"=>$_POST["galeri"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"inceleyin"=>$_POST["inceleyin"],"iletisim"=>$_POST["iletisim"],"tumunuokuyun"=>$_POST["tumunuokuyun"],"tumunugor"=>$_POST["tumunugor"],
	"hizmetler"=>$_POST["hizmetler"],"ekibimiz"=>$_POST["ekibimiz"],"kariyer_aciklama"=>$_POST["kariyer_aciklama"],"projeler"=>$_POST["projeler"],"tumu"=>$_POST["tumu"],"sikcasorulansorular"=>$_POST["sikcasorulansorular"],"istatikler"=>$_POST["istatikler"],"gonder"=>$_POST["gonder"],"blog"=>$_POST["blog"],
	"yorumlar"=>$_POST["yorumlar"],"banner"=>$_POST["banner"],"bizimle"=>$_POST["bizimle"],"medya"=>$_POST["medya"],"urunbilgileri"=>$_POST["urunbilgileri"],"satinal"=>$_POST["satinal"],"sepeteekle"=>$_POST["sepeteekle"],"sepetim"=>$_POST["sepetim"],"urunresmi"=>$_POST["urunresmi"],
	"urunadi"=>$_POST["urunadi"],"urunadet"=>$_POST["urunadet"],"urunfiyat"=>$_POST["urunfiyat"],"islem"=>$_POST["islem"],"siparisbilgileri"=>$_POST["siparisbilgileri"],"siparisitamamla"=>$_POST["siparisitamamla"],"bankahesaplari"=>$_POST["bankahesaplari"],"referanslar"=>$_POST["referanslar"],"kataloglar"=>$_POST["kataloglar"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		
if(isset($_POST['katalog-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
	
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
	
	}
	
	$resim_tmpd2 = $_FILES['pdf']['tmp_name'];
	if(empty($resim_tmpd2))
	{
		$pdf = "resim-yok";
	}
	else
	{
		
	
			$random = rand(0,999);
			
			$pdf = $random."-".$seo.".".substr($_FILES['pdf']['name'], -3);
			
			move_uploaded_file($_FILES['pdf']['tmp_name'],$klasord."/".$pdf);
			

	
	
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into katalog set dil=:dil,pdf=:pdf,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"pdf"=>$_POST["pdf"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['katalog-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "katalog";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM katalog WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
	
			$ayar_kaydi = $db->query("SELECT * FROM katalog WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		
	}
	$resim_tmp2 = $_FILES['pdf']['tmp_name'];
	
	if(empty($resim_tmp2))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM katalog WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$pdf = $ayar_kaydi['pdf'];
	}
	else
	{
	
			$ayar_kaydi = $db->query("SELECT * FROM katalog WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['pdf']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['pdf']);	  
			}
			
			$random = rand(0,999);
			
			$pdf = $random."-".$seo.".".substr($_FILES['pdf']['name'], -3);
			
			move_uploaded_file($_FILES['pdf']['tmp_name'],$klasor."/".$pdf);
			
			
						
		
		
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update katalog set dil=:dil,pdf=:pdf,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"pdf"=>$pdf,"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		




if(isset($_POST['banka-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into banka set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['banka-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "banka";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM banka WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM banka WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update banka set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		




if(isset($_POST['istatik-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into istatik set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['istatik-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "istatik";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM istatik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM istatik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update istatik set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}		


if(isset($_POST['ozellik-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim);
			

	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into ozellik set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['ozellik-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "ozellik";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM ozellik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM ozellik WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim);
			
			
						
		
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update ozellik set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,linki=:linki,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"linki"=>$_POST["linki"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}


if(isset($_POST['slider-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
$klasord="../../resimler/";
	$resim_tmpdd = $_FILES['icon']['tmp_name'];
	if(empty($resim_tmpdd))
	{
		$icon = "resim-yok";
	}
	else
	{
		
	
			$random = rand(0,999);
			
			$icon = $random."-".$seo.".".substr($_FILES['icon']['name'], -3);
			
			move_uploaded_file($_FILES['icon']['tmp_name'],$klasord."/".$icon);
			
		
	
	
	}
	
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into slider set icon=:icon,dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama,linki=:linki");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"icon"=>$icon,"linki"=>$_POST["linki"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['slider-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
	
	
	
	$resim_tmp1 = $_FILES['icon']['tmp_name'];
	
	if(empty($resim_tmp1))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$icon = $ayar_kaydi['icon'];
	}
	else
	{
	
			$ayar_kaydi = $db->query("SELECT * FROM slider WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['icon']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['icon']);	  
			}
			
			$random = rand(0,999);
			
			$icon = $random."-".$seo.".".substr($_FILES['icon']['name'], -3);
			
			move_uploaded_file($_FILES['icon']['tmp_name'],$klasor."/".$icon);
			
			
						
	
	}
	
		
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update slider set icon=:icon,linki=:linki,dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"icon"=>$icon,"linki"=>$_POST["linki"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	


if(isset($_POST['galeri-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into galeri set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['galeri-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM galeri WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM galeri WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update galeri set dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}




if(isset($_POST['video-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into video set linki=:linki,dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama");
	$ekle = $simdi->execute(array("linki"=>$_POST["linki"],"adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['video-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "slider";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM video WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM video WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	
		
		
		
	 $simdi1 = $db->prepare("update video set linki=:linki,dil=:dil,adi=:adi,sira=:sira,resim=:resim,durum=:durum,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("linki"=>$_POST["linki"],"adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	


if(isset($_POST['ekibimiz-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "ekibimiz";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into ekibimiz set dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$kategori,"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"eklenme_tarihi"=>$tarih));

    

	if($ekle){
	    
	      $sonid=$db->query("select * from ekibimiz order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?, tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['ekibimiz-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "ekibimiz";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM ekibimiz WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM ekibimiz WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='ekibimiz' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }

		
		
		
	 $simdi1 = $db->prepare("update ekibimiz set dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$_POST["kategori"],"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	




if(isset($_POST['yorum-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "yorumlar";

$klasord="../../resimler/";
	$resim_tmpd = $_FILES['resim']['tmp_name'];
	if(empty($resim_tmpd))
	{
		$resim = "resim-yok";
	}
	else
	{
		
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			$random = rand(0,999);
			
			$resim1 = $random."-".$seo.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasord."/".$resim1);
			
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
	
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into yorumlar set dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,eklenme_tarihi=:eklenme_tarihi");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$kategori,"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"eklenme_tarihi"=>$tarih));

    

	if($ekle){
	    
	      $sonid=$db->query("select * from yorumlar order by id desc")->fetch(PDO::FETCH_ASSOC);
				
$yeni =$sonid['id'];
    if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?, tur=?");
        	$islem = $islem->execute(array($yeni,$img,$tur));
    	}}
		
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['yorum-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "yorumlar";
    
    $id = $_POST['id'];
    
			$klasor="../../resimler/";
	
	$resim_tmp = $_FILES['resim']['tmp_name'];
	
	if(empty($resim_tmp))
	{
		$duzenlenecek_id = $_GET['id'];
		$ayar_kaydi = $db->query("SELECT * FROM yorumlar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
		$resim = $ayar_kaydi['resim'];
	}
	else
	{
		if ($_FILES["resim"]["type"] =="image/gif" || $_FILES["resim"]["type"] =="image/png"|| $_FILES["resim"]["type"] =="image/jpg"|| $_FILES["resim"]["type"] =="image/jpeg") 
		{
			
			$ayar_kaydi = $db->query("SELECT * FROM yorumlar WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
  			if($ayar_kaydi['resim']!="resim-yok")
			{
			  unlink("../../resimler/".$ayar_kaydi['resim']);	  
			}
			
			$random = rand(0,999);
			
			$resim1 = $random."-".$adii.".".substr($_FILES['resim']['name'], -3);
			
			move_uploaded_file($_FILES['resim']['tmp_name'],$klasor."/".$resim1);
			
			
						
			$file = "../../resimler/".$resim1;
$image = imagecreatefromstring(file_get_contents($file));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
$randomm=rand(0,965465465465456);
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = '../../resimler/'.$random.'-'.$seo.'.webp';
$resim=$random.'-'.$seo.'.webp';
imagewebp($content,$output);
imagedestroy($content);
	unlink ('../../resimler/'.$resim1);
		}
		else
		{
			$bilgi = '<div class="alert alert-error">
										<button class="close" data-dismiss="alert">×</button>
										<strong>Hata !</strong> Lütfen  Uygun Formatta Bir Resim Dosyası Seçiniz ( .jpg - .gif - .png ).
			</div>';
		}
	}
	
		
		 
	  $deleteee = $db->exec("DELETE FROM urun_img WHERE urun_id = '$id' and tur='yorumlar' ");
        
	if(isset($_POST['img'])){
    	foreach ($_POST['img'] as $img) {
			
	
    		$islem = $db->prepare("INSERT INTO urun_img SET urun_id = ?, img = ?,tur=?");
        	$islem = $islem->execute(array($id,$img,$tur));
    	}
    }

		
		
		
	 $simdi1 = $db->prepare("update yorumlar set dil=:dil,adi=:adi,sira=:sira,resim=:resim,kategori=:kategori,durum=:durum,onaciklama=:onaciklama,aciklama=:aciklama,seo=:seo,tur=:tur,guncelleme_tarihi=:guncelleme_tarihi where id=:id");
	$ekle1 = $simdi1->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"resim"=>$resim,"kategori"=>$_POST["kategori"],"aciklama"=>$_POST["aciklama"],"seo"=>$seo,"tur"=>$tur,"onaciklama"=>$_POST["onaciklama"],"durum"=>$_POST["durum"],"guncelleme_tarihi"=>$tarih,"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	

if(isset($_POST['sss-ekle'])){
    
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);




	
      
	  
	  
	  
	 $simdi = $db->prepare("insert into sss set dil=:dil,adi=:adi,sira=:sira,durum=:durum,aciklama=:aciklama");
	$ekle = $simdi->execute(array("adi"=>$_POST["adi"],"dil"=>$_POST["dil"],"sira"=>$_POST["sira"],"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"]));

    

	if($ekle){
	    
	     
	    
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}


}



if(isset($_POST['sss-guncelle'])){
    
    
        
    function seflink($string){
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$string = strtolower(str_replace($find, $replace, $string));
$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
$string = trim(preg_replace('/\s+/', ' ', $string));
$string = str_replace(' ', '-', $string);
return $string;
}

$seo= seflink($_POST['adi']);


$tur = "yorumlar";
    
    $id = $_POST['id'];
    


		
	

		
		
		
	 $simdi1 = $db->prepare("update sss set dil=:dil,adi=:adi,sira=:sira,durum=:durum,aciklama=:aciklama where id=:id");
	$ekle1 = $simdi1->execute(array("dil"=>$_POST["dil"],"adi"=>$_POST["adi"],"sira"=>$_POST["sira"],"aciklama"=>$_POST["aciklama"],"durum"=>$_POST["durum"],"id"=>$id));
	
    if($ekle1){
		header('location:'.$_POST['link'].'?durum=Basarili');
	}else {
		header('location:'.$_POST['link'].'?durum=Hata');	
	}

}	

/*
$idd=$hizmetd_dizi["id"];
$ip=$_SERVER["REMOTE_ADDR"];
$sor=$db->query("select * from ip_adresi where ip='$ip' and urun_id='$idd'")->fetch(PDO::FETCH_ASSOC);
	if($sor==false){
		if($sor["urun_id"]!=$hizmetd_dizi["id"]){
		$urun_id=$hizmetd_dizi["id"];
		$query=$db->prepare("insert into ip_adresi set ip = :ip, urun_id = :urun_id, zaman = :zaman");
		$insert=$query->execute(array("ip" =>$ip, "urun_id" =>$urun_id, "zaman" =>$tarih ));	
		
		$hitsayisi=$hizmetd_dizi["hit"]+1;
		
		
		$artir = $db->prepare("UPDATE hizmetler SET
		hit = :hit
		WHERE id = :id");
		$update = $artir->execute(array(
			 "hit" => $hitsayisi,
			 "id" => $id
		));
		}
	}
*/



?>