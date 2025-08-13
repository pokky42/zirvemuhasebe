		<section id="project" class="project-section background-style">
			<div class="section-title-area">
				<div class="section-title headline relative-position text-center">
					<h2 class="title-bg relative-position text-uppercase">Projeler</h2>
					<div class="title-head pera-content">
						<h2>Biz yaptık</h2>
						<p>Projeler</p>
					</div>
				</div>
			</div>
			<!-- /section-title -->
			<div class="project-content">
				<div id="project_slide" class="project_slide_area">
					<?php
                $cek = $db->query("select * from projeler where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cek as $goster) {
                ?>
					<div class="project-slider-item relative-position">
						<div class="project-img">
							<img src="resimler/<?=$goster["resim"]?>" alt="img_not_found">
						</div>
						<div class="project-text position-absolute headline">
							<h3 class="nio-title text-capitalize"><?=$goster["onaciklama"]?></h3>
							<span class="nio-meta relative-position text-uppercase"><?=$goster["adi"]?></span>
							<div class="project_more position-absolute text-center">
								<a class="block-display" href="<?=$goster["seo"]?>"><i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div id="client_slide" class="client-list clearfix text-center">
				<?php
                    $cek = $db->query("select * from referanslar where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($cek as $goster) {
                    ?> 
				<div class="client_show"><img src="resimler/<?=$goster["resim"]?>" alt="img_not_found"></div>
				<?php } ?>
			</div>
		</section>
