		<footer id="footer-area" class="footer-section">
			<div class="container">
				<div class="newslatter-wrap">
					<div class="row">
						<div class="col-md-3">
							<div class="newslatter-logo">
								<a href="index.php"><img src="resimler/<?=$footerlogo?>" alt="logo"></a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="newslatter-form float-right relative-position">
								<form action="#">
									<input class="email" name="email" type="email" placeholder="E-posta adresinizi giriniz">
									<div class="nws-button position-absolute text-capitalize">
										<button class="hover-btn" type="submit" value="Submit">Şimdi Abone Ol</button> 
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-widget-wrap">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="site-widget headline pera-content">
								<h3 class="widget-title">Hakkimizda</h3>
								<p>
								<?=$hakkimizda["footer"]?>
								</p>
								<div class="opening-time">
									<div class="opening-time-icon float-left">
										<span class="flaticon-calendar"></span>
									</div>
									<h3 class="widget-title">Açılış saatleri</h3>
									<div class="time-schedule">
										<span>Pazartesi - Cumartesi 8:00 - 17:30,</span>
										<span>Pazar - KAPALI</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="site-widget headline footer-menu-widget pera-content">
								<h3 class="widget-title">Hizmetler</h3>
								<div class="footer-menu ul-li-block">
									<ul>
									 <?php
            $cek = $db->query("select * from hizmetler where durum='0' order by id desc limit 6")->fetchAll(PDO::FETCH_ASSOC);
            foreach($cek as $goster) {
            ?>
										<li><a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="site-widget headline footer-menu-widget pera-content">
								<h3 class="widget-title">Projeler</h3>
								<div class="footer-menu ul-li-block">
									<ul>
									 <?php
            $cek = $db->query("select * from projeler where durum='0' order by id desc limit 6")->fetchAll(PDO::FETCH_ASSOC);
            foreach($cek as $goster) {
            ?>
										<li><a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="site-widget headline footer-menu-widget pera-content">
								<h3 class="widget-title">Haberler</h3>
								<div class="footer-menu ul-li-block">
									<ul>
									 <?php
            $cek = $db->query("select * from haberler where durum='0' order by id desc limit 6")->fetchAll(PDO::FETCH_ASSOC);
            foreach($cek as $goster) {
            ?>
										<li><a href="<?=$goster["seo"]?>"><?=$goster["adi"]?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-text text-center">
				<span><?=$copyright?></span>
			</div>
		</footer>
