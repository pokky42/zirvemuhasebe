<div class="content">
                    <div class="container">

<?php
if($_GET['sil']){
	$idd=$_GET['sil'];
	 
	 $resim_sorgu=$db->query("select * from menu where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	 unlink('../resimler/'.$resim_sorgu['resim']);
	$simdi=$db->query("delete from menu where id='$idd'")->fetch(PDO::FETCH_ASSOC);
	
	


}
?>

                    


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Menü Listele</h3>
                                    </div>
                                    <div class="panel-body">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Adı</th>
                                                    <th>Menü Yeri</th>
                                                   
                                                    <th>Durum</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                
                                                <?php
                                                $cek = $db->query("select * from menu where footer='{$_GET["footer"]}' order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($cek as $goster){
                                                ?>
                                                <tr>
                                                    <td><?=$goster["id"]?></td>
                                                    <td><?=$goster["adi"]?></td>
                                                    <td><?php 
                                                        if($goster["kategori"]==0){ echo" Ana Menü"; }
                                                        else {
                                                            $menu = $db->query("select * from menu where id='{$goster["kategori"]}'")->fetch(PDO::FETCH_ASSOC);
                                                            echo $menu["adi"];
                                                        }
                                                    ?></td>
                                              
                                                    <td><?php if($goster["durum"]==0){ echo 'Aktif';} else { echo 'pasif';}?></td>
                                                  
                                                    <td>
                                                        
                                                        <div class="btn-group">
                                                        <a href="menu-ekle?islem=duzenle&id=<?=$goster["id"]?>" class="btn btn-default waves-effect">Düzenle</a>
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