		<section id="about" class="about-us-section background-style relative-position">
			<div class="banner_parallax">
				<div class="background-overlay"></div>
				<div class="container">
					<div class="about_content">
						<div class="row">
							<div class="col-md-6 colmd6">
								<div class="about-text-area">
									<div class="section-title-area section-left-title">
										<div class="section-title headline relative-position">
											<div class="title-head pera-content">
												<h2>Hakkimizda</h2>
												<p><?=$hakkimizda["adi"]?></p>
											</div>
										</div>
									</div>
									<div class="about_details_content pera-content">
										<p><?=$hakkimizda["aciklama"]?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6 colmd6">
								<div class="about_img relative-position">
									<div class="about_top_img relative-position">
										<img src="resimler/<?=$hakkimizda["resim"]?>" alt="img_not_found">
									</div>
									<div class="about_bottom_img position-absolute">
										<img data-tilt data-tilt-max="20" src="resimler/<?= $bead["resim"] ?>" alt="img_not_found">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
