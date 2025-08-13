<?php
include("include/baglan.php");
include("include/fonksiyonlar.php");
ob_start();
session_start();
oturumkontrolana();

$uye = $db->query("select * from yonetici where id='{$_SESSION["id"]}'")->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?=$description?>" name="description" />
        <meta content="<?=$author?>" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../resimler/<?=$favicon?>">

        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>


        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>



    <body class="fixed-left">

        <div id="wrapper">
<?php include("inc/menu.php")?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
              <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Yönetim</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#"><?=$title?></a></li>
                                        <li class="active">Yönetim Paneli</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        
                     


                          <form method="post" action="include/fonksiyonlar.php" enctype="multipart/form-data">
                               <div class="row">
                                   <div class="col-sm-6 col-lg-6">

<div class="panel panel-primary text-center">

<div class="panel-heading"><h4 class="panel-title">Tema Ana Renk</h4>
</div>

<div class="panel-body"><input type="color" name="p_renk1" size="100" value="<?=$panel["p_renk1"]?>"> 

</div>
</div>
</div>
   <div class="col-sm-6 col-lg-6">

<div class="panel panel-primary text-center">

<div class="panel-heading"><h4 class="panel-title">Tema 2. Renk</h4>
</div>

<div class="panel-body"><input type="color" name="p_renk2" value="<?=$panel["p_renk2"]?>">

</div>
</div>
</div>
 <div class="col-sm-12 col-lg-12">

<div class="panel panel-primary text-center">
<br>

  <button type="submit" name="genel-ayarlar1" class="btn btn-info waves-effect waves-light">Panel Renklerini Güncelle</button>
<br><br>
</div>
</div>
                            <div class="col-lg-12">
                                
                               
          
                                <ul class="nav nav-tabs navtab-bg">
                                    
                                    
                                    <li class="active">
                                        <a href="#home" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                            <span class="hidden-xs">Anasayfa Hakkımızda</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true">
                                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                                            <span class="hidden-xs">Banner</span>
                                        </a>
                                    </li>
                                   
                                    <li class="">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                            <span class="hidden-xs">Sosyal Medya</span>
                                        </a>
                                    </li>
                                    
                                      <li class="">
                                        <a href="#mail" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                            <span class="hidden-xs">SMTP Ayarları</span>
                                        </a>
                                    </li>
                                </ul>
                                
                              
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Başlık</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="adi" value="<?=$adi?>">
                                            </div>



                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Açıklama</label>
                                             <textarea class="form-control" rows="5" name="aciklama"><?=$aciklama?></textarea>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Video Linki</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="video" value="<?=$video?>">
                                            </div>
                                            
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Footer Açıklama</label>
                                             <textarea class="form-control" rows="5" name="footer"><?=$footer_h?></textarea>
                                            </div>
                                            
                                            
                                               <div class="form-group">
                                                <label>Resim</label>
                                                <input type="file" class="colorpicker-default form-control" name="hresim" >
                                            </div>
                                            
                                            <div class="form-group">
                                               <img src="../resimler/<?=$hresim?>" width="200">
                                            </div>
                                            
                                             <button type="submit" name="hakkimizda-duzenle" class="btn btn-info waves-effect waves-light">Hakkımızda Güncelle</button>
                                            
                                    </div>
                                    <div class="tab-pane " id="profile">
                                           <div class="form-group">
                                                <label>Resim</label>
                                                <input type="file" class="colorpicker-default form-control" name="resim" >
                                            </div>
                                            
                                            <div class="form-group">
                                               <img src="../resimler/<?=$bead["resim"]?>" width="200">
                                            </div>
                                            <input type="hidden" name="link" value="../">
                                            <button type="submit" name="beadcrumb-duzenle" class="btn btn-info waves-effect waves-light">Banner Güncelle</button>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Facebook</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="facebook" value="<?=$facebook?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">İnstagram</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="instagram" value="<?=$instagram?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Youtube</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="youtube" value="<?=$youtube?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Twitter</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="twitter" value="<?=$twitter?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Linkedin</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="linkedin" value="<?=$linkedin?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Pinterest</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="pinterest" value="<?=$pinterest?>">
                                            </div>
                                            
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Telegram</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="telegram" value="<?=$telegram?>">
                                            </div>
                                            
                                              <button type="submit" name="sosyal-medya" class="btn btn-info waves-effect waves-light">Sosyal Medya Güncelle</button>
                                    </div>
                                    <div class="tab-pane" id="mail">
                                        
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Site Mail</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_mail" value="<?=$smtp["site_mail"]?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Mail Şifre</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_mail_sifre" value="<?=$smtp["site_mail_sifre"]?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Mail Host</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_mail_host" value="<?=$smtp["site_mail_host"]?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Mail Port</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_mail_port" value="<?=$smtp["site_mail_port"]?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Gönderen Mail</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="gonderen_mail" value="<?=$smtp["gonderen_mail"]?>">
                                            </div>
                                             
                                            
                                            
                                              <button type="submit" name="smtp-ayar" class="btn btn-info waves-effect waves-light">SMTP Güncelle</button>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
</form>
                      

                    </div> 

                </div> 

                <?php include("inc/footer.php");?>

            </div>

        </div>


        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>