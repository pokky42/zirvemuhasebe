<div class="content">
                    <div class="container">

                      
<?php
if($_GET["islem"]=='duzenle'){
    $guncelle = $db->query("select * from yonetici where id='{$_GET["id"]}'")->fetch(PDO::FETCH_ASSOC);
}
?>

                           <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Yönetici Ekle</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="include/fonksiyonlar.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Ad Soyad</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="ad_soyad" value="<?=$guncelle["ad_soyad"]?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Eposta</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="eposta" class="form-control" value="<?=$guncelle["eposta"]?>">
                                                </div>
                                            </div>
                                            
                                              <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Şifre</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="sifre" class="form-control" value="<?=$guncelle["sifre"]?>">
                                                </div>
                                            </div>
                                          
                                          
                                            
                                          
                                            
                                        
                                       
                                        
                                            

                                          
                   
                           
                                            
                                             <div class="form-group ">
                                                <div class="col-sm-offset-11 col-sm-1">
                                                    <?php if($_GET["islem"]=='duzenle'){?>
                                                    <input type="hidden" name="link" value="../yonetici-ekle?islem=duzenle&id=<?=$guncelle["id"]?>">
                                                    <input type="hidden" name="id" value="<?=$guncelle["id"]?>">
                                                  <button type="submit" name="yonetici-guncelle" class="btn btn-info waves-effect waves-light">Güncelle</button>
                                                  <?php } else {?>
                                                  <input type="hidden" name="link" value="../yonetici-ekle">
                                                  <button type="submit" name="yonetici-ekle" class="btn btn-info waves-effect waves-light">Ekle</button>
                                                  <?php }?>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> 



                    </div> <!-- container -->

                </div>