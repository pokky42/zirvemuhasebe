  <div class="content">
      
      <form method="post" action="include/fonksiyonlar.php" enctype="multipart/form-data">
                    <div class="container">

                       


                    


                        <div class="row">
                            
                             <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Şuan ki Logo</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                               <img src="../resimler/<?=$logo?>" width="100%">
                                            </div>
                                            
                                          
                                           
                                    </div>
                                </div> 
                            </div> 
                            
                             <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Şuan ki Footer Logo</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                               <img src="../resimler/<?=$footerlogo?>" width="100%">
                                            </div>
                                            
                                          
                                           
                                    </div>
                                </div> 
                            </div> 
                             <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Şuan ki Favicon</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                               <img src="../resimler/<?=$favicon?>" width="100%">
                                            </div>
                                            
                                          
                                           
                                    </div>
                                </div> 
                            </div> 
                          
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Telefon Numaraları</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telefon 1</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="telefon1" value="<?=$telefon1?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Telefon 2</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="telefon2" value="<?=$telefon2?>">
                                            </div>
                                           
                                            <button type="submit" name="iletisim-bilgileri" class="btn btn-dark waves-effect waves-light">Numaraları Güncelle</button>
                                    </div>
                                </div> 
                            </div> 
                            
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Email Hesapları</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email 1</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="email1" value="<?=$email1?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Email 2</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="email2" value="<?=$email2?>">
                                            </div>
                                           
                                             <button type="submit" name="iletisim-bilgileri" class="btn btn-dark waves-effect waves-light">Email Güncelle</button>
                                         
                                    </div>
                                </div> 
                            </div> 
                            
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Adres Bilgileri</h3></div>
                                    <div class="panel-body">
                                       
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Adres 1</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="adres1" value="<?=$adres1?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Adres 2</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="adres2" value="<?=$adres2?>">
                                            </div>
                                              <button type="submit" name="iletisim-bilgileri" class="btn btn-dark waves-effect waves-light">Adresleri Güncelle</button>
                                           
                                      
                                    </div>
                                </div> 
                            </div> 
                            
                             <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Site Bilgileri</h3></div>
                                    <div class="panel-body">
                                        
                                          
                                       
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Site Title</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_title" value="<?=$title?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Keyword</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_keyword" value="<?=$keyword?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Author</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="site_author" value="<?=$author?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Site Description</label>
                                             <textarea class="form-control" rows="5" name="site_description"><?=$des?></textarea>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Footer Copyright</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="footer_copyright" value="<?=$copyright?>">
                                            </div>
                                             <button type="submit" name="genel-ayarlar" class="btn btn-dark waves-effect waves-light">Bilgileri Güncelle </button>
                                    </div>
                                </div> 
                            </div> 
                            
                             <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Site Renkleri</h3></div>
                                    <div class="panel-body">
                                      
                                             <div class="form-group">
                                                <label>Renk 1</label>
                                                <input type="color" class="colorpicker-default form-control" name="renk" value="<?=$renk?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Renk 2</label>
                                                <input type="color" class="colorpicker-default form-control" name="renk2" value="<?=$renk2?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" class="colorpicker-default form-control" name="logo" >
                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Footer Logo</label>
                                                <input type="file" class="colorpicker-default form-control" name="footer_logo" >
                                            </div>
                                             <div class="form-group">
                                                <label>Favicon</label>
                                                <input type="file" class="colorpicker-default form-control" name="favicon" >
                                            </div>
                                            
                                          
                                             <button type="submit" name="genel-ayarlar" class="btn btn-dark waves-effect waves-light">Logoları & Renkleri Güncelle</button>
                                        
                                    </div>
                                </div> 
                            </div> 
                            
                              <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Ek Kod Alanları</h3></div>
                                    <div class="panel-body">
                                        
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Google Harita Kodu</label>
                                             <textarea class="form-control" rows="5" name="google_maps"><?=$googlemaps?></textarea>
                                            </div>
                                        <button type="submit" name="iletisim-bilgileri" class="btn btn-dark waves-effect waves-light">Google Mapsı Güncelle</button>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Header Kod Alanı</label>
                                             <textarea class="form-control" rows="5" name="header"><?=$ayar["header"]?></textarea>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Footer Kod Alanı</label>
                                             <textarea class="form-control" rows="5" name="footer"><?=$ayar["footer"]?></textarea>
                                            </div>
                                            
                                          <input type="hidden" name="link" value="../ayarlar">
                                            <button type="submit" name="genel-ayarlar" class="btn btn-dark waves-effect waves-light">Güncelle</button>
                                 
                                    </div>
                                </div> 
                            </div> 

                         

                        </div> 


                    </div> 
 </form>
                </div> 
                
                      