<section id="team" class="team_section">
			<div class="container">
				<div class="team_people">
					<div class="row">
						<?php
                $cek = $db->query("select * from ekibimiz where durum='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($cek as $goster) {
                ?>
						<div class="col-md-4">
							<div class="team-member relative-position">
								<div class="member-img">
									<img src="resimler/<?=$goster["resim"]?>" alt="img_not_found">
								</div>
								<div class="member-details headline text-center">
									<h3 class="member-name"><?=$goster["adi"]?></h3>
									<span class="member-designation text-uppercase"><?=$goster["onaciklama"]?></span>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>