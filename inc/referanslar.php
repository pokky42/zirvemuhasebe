		<section id="feature" class="feature-section background-style relative-position">
			<div class="banner_parallax">
				<div class="background-overlay"></div>
				<div class="section-title-area">
					<div class="section-title headline relative-position text-center">
						<h2 class="title-bg relative-position text-uppercase">Referanslar</h2>
						<div class="title-head pera-content">
							<h2>Neden Bizi Seçmelisiniz?</h2>
							<p>Referanslar</p>
						</div>
					</div>
				</div>
				<!-- /section-title -->
				<div class="feature-content">
					<div class="container">
						<div class="row">
							<div class="col-xl-6 col-lg-6 mx-auto">
								<div class="feature-content-area clearfix text-center ul-li">
									<ul>
										<?php
                     $cek = $db->query("select * from ozellik where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
                     foreach($cek as $goster){
                     ?>
										<li class="feature-icon-text pera-content">
											<span class="<?=$goster["sira"]?>"></span>
											<p><?=$goster["adi"]?></p>
											<div class="feature-hover">
												<span class="<?=$goster["sira"]?>"></span>
												<p><?=$goster["adi"]?></p>
												<div class="icon-bg"><span class="<?=$goster["sira"]?>"></span></div>
											</div>
										</li>
										<?php }?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
