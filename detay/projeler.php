<section id="blog_post" class="blog_news_post_section">
			<div class="container">
				<div class="blog_post_content">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<?php
            $cek = $db->query("select * from projeler where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($cek as $goster) {
            ?>
								<div class="col-md-6">
									<div class="blog-img-text relative-position">
										<div class="blog-img">
											<img src="resimler/<?=$goster["resim"]?>" alt="">
											<div class="blog-text">
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
						<!-- /news_post -->
						<div class="col-md-4">
							<div class="single-sidebar blog_sidebar">
							
								<div class="single_widget">
									<h3 class="widget-title">Diğer Projeler</h3>
									<div class="latest-blog-widget">
									<?php
                        $cek = $db->query("select * from projeler where durum='0' and not id='$id' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
						foreach($cek as $goster){
						?>
										<div class="blog-img-content">
											<div class="blog-text headline">
												<h3> <a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></h3>
												<span class="blog-meta"><i class="fas fa-calendar-alt"></i><?=$goster["eklenme_tarihi"]?></span>
											</div>
										</div>
										<?php }?>
									</div>
								</div>
								
							</div>
						</div>
						<!-- /side bar -->
					</div>
				</div> 
			</div>
		</section>