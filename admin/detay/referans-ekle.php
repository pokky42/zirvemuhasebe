<div class="content">
                    <div class="container">

                      
<?php
if($_GET["islem"]=='duzenle'){
    $guncelle = $db->query("select * from referanslar where id='{$_GET["id"]}'")->fetch(PDO::FETCH_ASSOC);
}
?>

                           <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Referans Ekle</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="include/fonksiyonlar.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Sıra</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="sira" value="<?=$guncelle["sira"]?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Adı</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="adi" class="form-control" value="<?=$guncelle["adi"]?>">
                                                </div>
                                            </div>
                                          
                                          
                                          
                                            
                                             <div class="form-group">
                                                <label class="col-md-2 control-label">Resim</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" name="resim" placeholder="placeholder">
                                                </div>
                                            </div>
                                            <?php if($_GET["islem"]=='duzenle'){?>
                                             <div class="form-group">
                                                <label class="col-md-2 control-label">Şuan ki Resim</label>
                                                <div class="col-md-10">
                                                   <img src="../resimler/<?=$guncelle["resim"]?>" width="200">
                                                </div>
                                            </div>
                                            <?php }?>
                                            
                                            
                                        
                                            

                                          
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Durum</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="durum">
                                                        <option value="0" <?php if($guncelle["durum"]==0){ echo ' selected';}?>>Göster</option>
                                                        <option value="1" <?php if($guncelle["durum"]==1){ echo ' selected';}?>>Gizli</option>
                                                     
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                                  
                   
                           
                                            
                                             <div class="form-group ">
                                                <div class="col-sm-offset-11 col-sm-1">
                                                    <?php if($_GET["islem"]=='duzenle'){?>
                                                    <input type="hidden" name="link" value="../referans-ekle?islem=duzenle&id=<?=$guncelle["id"]?>">
                                                    <input type="hidden" name="id" value="<?=$guncelle["id"]?>">
                                                  <button type="submit" name="referans-guncelle" class="btn btn-info waves-effect waves-light">Güncelle</button>
                                                  <?php } else {?>
                                                  <input type="hidden" name="link" value="../referans-ekle">
                                                  <button type="submit" name="referans-ekle" class="btn btn-info waves-effect waves-light">Ekle</button>
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