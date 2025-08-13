<div class="content">
                    <div class="container">

                      
<?php
if($_GET["islem"]=='duzenle'){
    $guncelle = $db->query("select * from menu where id='{$_GET["id"]}'")->fetch(PDO::FETCH_ASSOC);
}
?>

                           <div class="row">
               
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Menü Ekle</h3></div>
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
                                                <label class="col-md-2 control-label" for="example-email">Linki</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="url" class="form-control" value="<?=$guncelle["url"]?>">
                                                </div>
                                            </div>
                                          
                                          
                                          <div class="form-group">
                                                <label class="col-sm-2 control-label">Açılır Menü</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="acilir">
                                                        <option value="0" <?php if($guncelle["acilir"]==0){ echo ' selected';}?>>Açılsın</option>
                                                        <option value="1" <?php if($guncelle["acilir"]==1){ echo ' selected';}?>>Açılmasın</option>
                                                     
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Menü Konum</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="footer">
                                                        <option value="0" <?php if($guncelle["footer"]==0){ echo ' selected';}?>>Header de Göster</option>
                                                        <option value="1" <?php if($guncelle["footer"]==1){ echo ' selected';}?>>Footer da Göster</option>
                                                     
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Menü Yeri</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kategori">
                                                        <option value="0" <?php if($guncelle["kategori"]==0){ echo ' selected';}?>>Ana Menü</option>
                                                        <?php
                                                        $cek = $db->query("select * from menu where not id='{$guncelle["id"]}' order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($cek as $goster){
                                                        ?>
                                                        <option value="<?=$goster["id"]?>" <?php if($goster["id"]==$guncelle["kategori"]){ echo ' selected';}?>><?=$goster["adi"]?></option>
                                                     <?php }?>
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                          
                                            
                                          
                                            
                                          
                                            
                                            
                                           <div class="form-group">
                                                <label class="col-sm-2 control-label">Sekme</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="sekme">
                                                        <option value="0" <?php if($guncelle["sekme"]==0){ echo ' selected';}?>>Aynı Sekmede Aç</option>
                                                        <option value="1" <?php if($guncelle["sekme"]==1){ echo ' selected';}?>>Yeni Sekmede Aç</option>
                                                     
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            
                                            

                                          
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
                                                    <input type="hidden" name="link" value="../menu-ekle?islem=duzenle&id=<?=$guncelle["id"]?>">
                                                    <input type="hidden" name="id" value="<?=$guncelle["id"]?>">
                                                  <button type="submit" name="menu-guncelle" class="btn btn-info waves-effect waves-light">Güncelle</button>
                                                  <?php } else {?>
                                                  <input type="hidden" name="link" value="../menu-ekle">
                                                  <button type="submit" name="menu-ekle" class="btn btn-info waves-effect waves-light">Ekle</button>
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