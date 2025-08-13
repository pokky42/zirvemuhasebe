		<section id="slider" class="slider-section home_slide1">
			<div id="slide_wrapper" class="slide-area-content">
				<?php
			$cek = $db->query("select * from slider where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
			foreach($cek as $goster){
			?>
				<div class="slider-layer ">
					<div class="slider-img img-zooming" data-background="resimler/<?=$goster["resim"]?>"></div>
					<div class="container">
						<div class="slider-text">
							<div class="slider_text-box slider_wrap1 headline pera-content">
								<div class="content-area">
									<h1><?=$goster["adi"]?></h1>
									<p><?=$goster["aciklama"]?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</section>
