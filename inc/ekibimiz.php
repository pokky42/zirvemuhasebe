		<section id="team" class="team-section relative-position">
			<div class="container">
				<div class="section-title-area section-left-title">
					<div class="section-title headline relative-position">
						<h2 class="title-bg relative-position  text-center text-uppercase">team</h2>
						<div class="title-head pera-content">
							<h2>Danışmanlarımız</h2>
							<p>Ekibimiz</p>
						</div>
					</div>
				</div>
				<!-- /section-title --> 
				<div class="team_content">
					<div id="team_slide" class="team_slide_area">
						<?php
                        $cek = $db->query("select * from ekibimiz where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
						foreach($cek as $goster){
						?>
						<div class="team-member relative-position  wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="member-img">
								<img src="resimler/<?=$goster["resim"]?>" alt="img_not_found">
							</div>
							<div class="member-details headline text-center">
								<h3 class="member-name"><?=$goster["adi"]?></h3>
								<span class="member-designation text-uppercase"><?=$goster["onaciklama"]?></span>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</section>
