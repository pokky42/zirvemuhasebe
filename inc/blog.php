		<section id="blog-area" class="blog-section background-style relative-position">
			<div class="background-overlay"></div>
			<div class="container">
				<div class="section-title-area relative-position section-left-title">
					<div class="section-title headline relative-position">
						<div class="title-head pera-content">
							<h2>Haber Akışları</h2>
							<p>Blog & Haberler</p>
						</div>
					</div>
					<div class="news_btn text-center hover-btn">
						<a class="block-display" href="blog">Tüm Haberler</a>
					</div>
				</div>
				<!-- /section-title -->
				<div class="blog-content">
					<div class="row">
						 <?php
            $cek = $db->query("select * from haberler where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($cek as $goster) {
            ?>
						<div class="col-md-4  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="blog-img-text relative-position">
								<div class="blog-img">
									<img src="assets/img/blog/b1.jpg" alt="">
									<div class="blog-text">
										<div class="blog-tag text-uppercase">
										<h5><?=$goster["onaciklama"]?><h5>
										</div>
										<div class="blog-title headline">
											<h2><a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></h2>
										</div>
										<div class="blog-meta ul-li">
											<a href="#"><i class="far fa-user"></i>Admin</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>	
					</div>
				</div>
			</div>
		</section>
