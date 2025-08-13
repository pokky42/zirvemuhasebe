<div class="content">
                    <div class="container">

                      
<?php
if($_GET["islem"]=='duzenle'){
    $guncelle = $db->query("select * from urunler where id='{$_GET["id"]}'")->fetch(PDO::FETCH_ASSOC);
}
?>

                           <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Ürün Ekle</h3></div>
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
                                                <label class="col-md-2 control-label" for="example-email">Gün Sayısı</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="panel" class="form-control" value="<?=$guncelle["panel"]?>">
                                                </div>
                                            </div>
                                            
                                              <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Fiyat</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="fiyat" class="form-control" value="<?=$guncelle["fiyat"]?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Kategori</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kategori">
                                                        <?php
                                                        $cek = $db->query("select * from urun_kategori where durum='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($cek as $goster){
                                                        ?>
                                                        <option value="<?=$goster["id"]?>" <?php if($guncelle["kategori"]==$goster["id"]){ echo ' selected';}?>><?=$goster["adi"]?></option>
                                                        
                                                     <?php }?>
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                          
                                          
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Ön Açıklama</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="5" name="onaciklama"><?=$guncelle["onaciklama"]?></textarea>
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
                                                <label class="col-md-2 control-label">Açıklama</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control ckeditor" rows="5" name="aciklama"><?=$guncelle["aciklama"]?></textarea>
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
                                                  
                                            
                        <div class="row" id="resimler">
                            
                            	<div class="form-group row col-sm-12" id="resimler">
                            
                            
                            	<?php
									$i = 0;
									
									$iddd=$_GET['id'];
									if($_GET['islem']=='duzenle'){
										$cek = $db->query("SELECT * FROM urun_img WHERE urun_id = '$iddd' and tur='urunler' order by id asc", PDO::FETCH_ASSOC);
										if($cek->rowCount()){
											foreach( $cek as $c ){
												echo '<div class="col-md-3" data-resim-dis-id="'.$i.'">
									                    <div class="uploaddis pasif" style="float:left;">
									        			  <div class="yuklendi">
									        				  <img src="../resimler/'.$c['img'].'" width="100%">
									        				  <div class="icon" data-resim-sil-id="'.$i.'"><span class="fa fa-trash"></span></div>
									        				  <input type="hidden" name="img[]" value="'.$c['img'].'" required="">
									        			  </div>
									        			</div>
									                </div>';
									            $i++;
											}
										}
									}
								?>
                            </div>
                            
                            	<div class="form-group row col-md-12">
                             <div class="col-md-4 " style="margin:auto;padding:auto;">
				                    <div class="uploaddis aktif" data-id="1" style="margin:0 auto;">
				        			  <div class="upload1">
				        				  <span class="metin" style="width: 100%;float: left;">Ürün Resimi Yükle</span>
				        				  <div class="icon"><span class="fa fa-upload" data-id="1"></span></div>
				        			  </div>
				        			</div>
				                </div>
                            
                            
                            </div>
                            
                            
                            
                            
                            
                            
				
					
				</div>
<div id="queue"></div>
                           
                                            
                                             <div class="form-group ">
                                                <div class="col-sm-offset-11 col-sm-1">
                                                    <?php if($_GET["islem"]=='duzenle'){?>
                                                    <input type="hidden" name="link" value="../urun-ekle?islem=duzenle&id=<?=$guncelle["id"]?>">
                                                    <input type="hidden" name="id" value="<?=$guncelle["id"]?>">
                                                  <button type="submit" name="urun-guncelle" class="btn btn-info waves-effect waves-light">Güncelle</button>
                                                  <?php } else {?>
                                                  <input type="hidden" name="link" value="../urun-ekle">
                                                  <button type="submit" name="urun-ekle" class="btn btn-info waves-effect waves-light">Ekle</button>
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