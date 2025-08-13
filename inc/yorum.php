		<section id="testimonial" class="testimonial-section background-style relative-position">
			<div class="background-overlay"></div>
			<div class="container">
				<div class="section-title-area section-left-title">
					<div class="section-title headline relative-position">
						<div class="title-head pera-content">
							<h2>Müşteri Yorumları</h2>
							<p>Görüşler</p>
						</div>
					</div>
				</div>
				<!-- /section-title -->
				<div id="testimonial_slide" class="testimonial-content">
					<?php
                            $cek = $db->query("select * from yorumlar where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($cek as $goster) {
                            ?>
					<div class="testimonial-text-pic">
						<div class="testimonial-img-name relative-position">
							<div class="testimonial-img position-absolute">
								<img src="resimler/<?=$goster["resim"]?>" alt="img_not_found">
							</div>
							<div class="testimonial-name headline float-left">
								<h3 class="nio-title"><?= $goster["adi"] ?></h3>
								<span class="nio-meta relative-position text-uppercase"><?= $goster["onaciklama"] ?></span>
							</div>
							<div class="testimonial-icon float-right">
								<span class="flaticon-comment"></span>
							</div>
						</div>
						<div class="testimonial-text pera-content">
							<p><?= $goster["aciklama"] ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
