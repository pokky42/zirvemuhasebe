		<section id="get-touch" class="get-touch-section">
			<div class="container">
				<div class="section-title-area text-center">
					<div class="section-title headline relative-position">
						<div class="title-head pera-content">
							<h2>Bize Ulaşın</h2>
							<p>İletişim Bilgileri</p>
						</div>
					</div>
				</div>
				<!-- /section-title -->
				<div class="get-touch-content">
					<div class="row">
						<div class="col-md-4 colmd4  wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="get-touch-icon-text text-center">
								<div class="get-touch-icon">
									<span class="flaticon-email"></span>
								</div>
								<div class="get-touch-text headline">
									<h3>E-mail</h3>
									<span><?=$email1?></span>
									<span><?=$email2?></span>
								</div>
							</div>
						</div>
						<div class="col-md-4 colmd4  wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="get-touch-icon-text text-center">
								<div class="get-touch-icon">
									<span class="flaticon-call"></span>
								</div>
								<div class="get-touch-text headline">
									<h3>Telefon</h3>
									<span><?=$telefon1?></span>
									<span><?=$telefon2?></span>
								</div>
							</div>
						</div>
						<div class="col-md-4 colmd4  wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
							<div class="get-touch-icon-text text-center">
								<div class="get-touch-icon">
									<span class="flaticon-location"></span>
								</div>
								<div class="get-touch-text headline">
									<h3>Adres</h3>
									<span><?=$adres1?></span>
									<span><?=$adres2?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
			<div class="contact_page_form">
				<div class="get-quote-section">
					<div class="container">
						<div class="section-title-area">
							<div class="section-title headline relative-position text-center">
								<h2 class="title-bg relative-position text-uppercase">contact</h2>
								<div class="title-head pera-content">
									<h2>Get In Touch</h2>
									<p>Write here</p>
								</div>
							</div>
						</div>
						<!-- /section title -->
						<div class="quote_content">
							<div class="quote_form">
								<form id="contact_form" action="admin/include/fonksiyonlar.php" method="post" enctype="multipart/form-data">
								    <input type="hidden" name="link" value="../../iletisim">
									<div class="row">
										<div class="col-md-6">
											<div class="contact-info">
												<label>Ad Soyad</label>
												<input class="adsoyad" name="adsoyad" type="text" placeholder="AdSoyad">
												<div class="icon-bg">
													<i class="far fa-user"></i>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="contact-info">
												<label>E-mail</label>
												<input class="Email" name="Email" type="email" placeholder="E-mail">
												<div class="icon-bg">
													<i class="far fa-envelope"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="contact-info">
										<label>Enter your message</label>
										<textarea id="mesaj" name="mesaj" placeholder="Mesajınızz"></textarea>
										<div class="icon-bg">
											<i class="far fa-edit"></i>
										</div>
									</div>
									<div class="sub-button text-center text-capitalize">
										<button class="hover-btn" type="submit" name="iletisim-formu" value="Submit">Gönder</button> 
									</div> 

								</form>
							</div>
						</div>
						<!-- /qoute form -->
					</div>
				</div>
			</div>
		</section>