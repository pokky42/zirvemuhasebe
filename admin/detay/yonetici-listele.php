<div class="content">
                    <div class="container">

<?php
if($_GET['sil']){
	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from yonetici where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	 unlink('../resimler/'.$resim_sorgu['resim']);
	$simdi=$db->query("delete from yonetici where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	
	


}
?>

                    


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Yönetici Listele</h3>
                                    </div>
                                    <div class="panel-body">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Eposta</th>
                                                   
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                
                                                <?php
                                                $cek = $db->query("select * from yonetici order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($cek as $goster){
                                                ?>
                                                <tr>
                                                    <td><?=$goster["id"]?></td>
                                                    <td><?=$goster["ad_soyad"]?></td>
                                                   
                                                      <td><?=$goster["eposta"]?></td>
                                          
                                                  
                                                    <td>
                                                        
                                                        <div class="btn-group">
                                                        <a href="yonetici-ekle?islem=duzenle&id=<?=$goster["id"]?>" class="btn btn-default waves-effect">Düzenle</a>
                                                        <a href="?sil=<?=$goster["id"]?>"  class="btn btn-default waves-effect">Sil</a>
                                                       
                                                    </div>
                                                        
                                                    </td>
                                                  
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>




                    </div> 

                </div>