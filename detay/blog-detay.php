<section id="blog_details" class="blog_news_post_section blog_details_area">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="blog_details_content headline">
							<div class="blog_details_text headline">
								<h2><?=$haberler["adi"]?></h2>
								<div class="blog-meta ul-li">
									<a href="#"><i class="far fa-user"></i>Admin</a>
									<a href="#"><i class="fas fa-calendar-alt"></i><?=$haberler["eklenme_tarihi"]?></a>
								</div>
								<article>
<?=$haberler["aciklama"]?>								</article>
								<div class="blog_details_imgfull">
									<img src="resimler/<?=$haberler["resim"]?>" alt="">
								</div>
							</div>
						</div>
					</div>
											<div class="col-md-4">
							<div class="single-sidebar blog_sidebar">
							
								<div class="single_widget">
									<h3 class="widget-title">Diğer Haberler</h3>
									<div class="latest-blog-widget">
									<?php
                        $cek = $db->query("select * from haberler where durum='0' and not id='$id' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
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

				</div>
			</div>
		</section>