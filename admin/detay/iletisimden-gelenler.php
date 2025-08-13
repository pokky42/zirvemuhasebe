<div class="content">
                    <div class="container">

<?php
if($_GET['sil']){
	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from iletisimler where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	 unlink('../resimler/'.$resim_sorgu['resim']);
	$simdi=$db->query("delete from iletisimler where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	
	


}
?>

                    


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">İletişimden Gelenler</h3>
                                    </div>
                                    <div class="panel-body">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Konu</th>
                                                    <th>Telefon</th>
                                                    <th>Email</th>
                                                    <th>Mesaj</th>
                                                    <th>Tarih</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                
                                                <?php
                                                $cek = $db->query("select * from iletisimler order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($cek as $goster){
                                                ?>
                                                <tr>
                                                    <td><?=$goster["id"]?></td>
                                                    <td><?=$goster["adsoyad"]?></td>
                                                    <td><?=$goster["konu"]?></td>
                                                  <td><?=$goster["telefon"]?></td>
                                                  <td><?=$goster["email"]?></td>
                                                  <td><?=$goster["mesaj"]?></td>
                                                  <td><?=$goster["tarih"]?></td>
                                                    <td>
                                                        
                                                        <div class="btn-group">
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