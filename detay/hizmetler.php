		<section id="service" class="service-section">
			<div class="section-title-area">
				<div class="section-title headline relative-position text-center">
					<h2 class="title-bg relative-position text-uppercase">Hizmetler</h2>
					<div class="title-head pera-content">
						<h2>Ne Yapıyoruz?</h2>
						<p>Hizmetler</p>
					</div>
				</div>
			</div>
			<!-- /section-title -->
			<div class="container">
				<div class="row">
					<?php
            $cek = $db->query("select * from hizmetler where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($cek as $goster) {
            ?>
					<div class="col-md-4 colmd4 wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="service-icon-text relative-position text-center">
							<div class="service-icon">
								<img src="resimler/<?=$goster["icon"]?>" alt="img">
							</div>
							<div class="service-text headline pera-content">
								<h3><?= $goster["adi"] ?></h3>
								<p><?= $goster["onaciklama"] ?></p>
								<div class="btn-more">
									<a href="<?= $goster["seo"] ?>">İnceleyin</a>
								</div>
							</div>
						</div>
					</div>

<?php } ?>
				</div>
			</div>
		</section>
