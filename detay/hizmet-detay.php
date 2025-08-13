<section id="service_details" class="service_details_section">
			<div class="container">
				<div class="service_details_content">
					<div class="row">
						<div class="col-md-8">
							<div class="service_details_left headline">
								<img src="resimler/<?=$hizmetler["resim"]?>" alt="">
								<h2><?=$hizmetler["adi"]?></h2>
								<article>
<?=$hizmetler["aciklama"]?>								</article>
							</div>
						</div>
						<!-- /single left content -->
						<div class="col-md-4">
							<div class="single-sidebar">
								<div class="single_widget">
									<div class="service_itemlist ul-li-block">
										<ul>
											<?php
                        $cek = $db->query("select * from hizmetler where durum='0' and not id='$id' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
						foreach($cek as $goster){
						?>
											<li><a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></li>
										<?php }?>	
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>