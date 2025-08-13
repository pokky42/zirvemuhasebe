		<header id="header-id" class="main-header prime_header">
			<div class="brand-logo float-left ">
				<a href="index.php"><img src="resimler/<?=$logo?>" alt="logo"></a>
			</div>
			<div class="header-right float-right ul-li">
				<ul>
					<li>
						<i class="open_bar fas fa-th"></i>
						<div  class="wide_sidebar">
							<div class="side_bar_overlay open_bar"></div>
							<div class="wide_sidebar_content headline">
								<div class="w-brand-logo">
									<a href="index.php"><img src="resimler/<?=$logo?>" alt="logo"></a>
								</div>
								<div class="wide_sidebar_text headline pera-content">
									<h3>Hakkimizda</h3>
									<p><?=$hakkimizda["aciklama"]?></p>
									<div class="side_bar_btn text-center">
										<a class="block-display" href="hakkimizda">Hakkimizda</a>
									</div>
									<h3>Bizi Takip Edin</h3>
									<div class="pro_social clearfix ul-li">
										<ul>
											<li><a href="<?=$facebook?>"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="<?=$twitter?>"><i class="fab fa-twitter"></i></a></li>
											<li><a href="<?=$youtube?>"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="side_copyright"><?=$copyright?></div>
								<div class="wide_sidebar_collapse open_bar">
									<i class="fas fa-arrow-right"></i>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="container">
				<div class="main-menu-header relative-position">
					<div class="header-top primary-bg">
						<div class="row">
							<div class="col-md-9">
								<div class="header_contact ul-li">
									<ul>
										<li><i class="far fa-envelope"></i> <span><?=$email1?></span></li>
										<li><i class="fas fa-phone"></i> <span><?=$telefon1?></span></li>
										<li><i class="fas fa-map-marker-alt"></i> <span><?=$adres1?></span></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="header_social float-right ul-li">
									<ul>
										<li class="h-fb"><a href="<?=$facebook?>"><i class="fab fa-facebook-f"></i></a></li>
										<li class="h-tw"><a href="<?=$twitter?>"><i class="fab fa-twitter"></i></a></li>
										<li class="h-lk"><a href="<?=$linkedin?>"><i class="fab fa-linkedin"></i></a></li>
										<li class="h-yo"><a href="<?=$youtube?>"><i class="fab fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<nav class="main-navigation  nav-menu-1 stricky clearfix slideIn animated ul-li">
						<ul id="main-nav" class="nav navbar-nav clearfix">
							<?php
                                    $cek = $db->query("select * from menu where durum='0' and kategori='0' and footer='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
									foreach($cek as $goster){
									?>
							<li <?php if($goster["acilir"]==0){?>class="menu-item-has-child"<?php }?>>
								<a href="<?=$goster["url"]?>"><?=$goster["adi"]?></a>
								<?php if($goster["acilir"]==0){?>
								<ul class="sub-menu clearfix">
								    <?php
                                    $cek = $db->query("select * from menu where durum='0' and kategori='{$goster["id"]}' and footer='0' order by sira asc")->fetchAll(PDO::FETCH_ASSOC);
									foreach($cek as $goster){
									?>
									<li><a href="<?=$goster["url"]?>"><?=$goster["adi"]?></a></li>
									<?php }?>
								</ul>
								<?php }?>
							</li>
						<?php }?>
						</ul>
					</nav>
					<div class="q-btn_1 position-absolute text-center">
						<a class="block-display" href="iletisim">İletişim</a>
					</div>
				</div>
			</div>

			<div class="mobile_menu">
    <div class="mobile_menu_wrap">
        <i class="open_bar menu_trigger fas fa-list-ul"></i>
        <div class="wide_sidebar">
            <div class="side_bar_overlay"></div>
            <div class="wide_sidebar_content pera-content headline">
                <div class="w-brand-logo">
                    <a href="index.php"><img src="resimler/<?=$logo?>" alt="logo"></a>
                </div>
                <br>
                <div class="pages-list">
                    <ul class="list-unstyled components">
                        <?php
                        $cek = $db->query("SELECT * FROM menu WHERE durum='0' AND kategori='0' AND footer='0' ORDER BY sira ASC")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($cek as $goster) {
                        ?>
                        <li class="<?= $goster["acilir"] == 0 ? 'menu-item-has-child' : '' ?>">
                            <a href="<?=$goster["seo"]?>" data-toggle="collapse" aria-expanded="false" data-target="#sub-menu-<?=$goster["id"]?>">
                                <span class="menu_icon text-center"><i class="fas fa-file-alt"></i></span>
                                <?=$goster["adi"]?>
                            </a>
                            <?php if ($goster["acilir"] == 0) { ?>
                            <ul class="sub-menu collapse list-unstyled" id="sub-menu-<?=$goster["id"]?>">
                                <?php
                                $subMenu = $db->query("SELECT * FROM menu WHERE durum='0' AND kategori='{$goster["id"]}' AND footer='0' ORDER BY sira ASC")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($subMenu as $subItem) {
                                ?>
                                <li><a href="<?=$subItem["seo"]?>"><?=$subItem["adi"]?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <p class="page_headline">İletişim Bilgileri</p>
                <div class="mobile_menu_contact ul-li-block">
                    <ul>
                        <li><i class="far fa-envelope"></i> <span><?=$email1?> </span></li>
                        <li><i class="fas fa-phone"></i> <span><?=$telefon1?></span></li>
                        <li><i class="fas fa-map-marker-alt"></i> <span><?=$adres1?></span></li>
                    </ul>
                </div>
                <p class="page_headline">Follow Us On:</p>
                <div class="mobile_menu_follow clearfix ul-li">
                    <ul>
                        <li class="h-fb"><a href="<?=$facebook?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="h-tw"><a href="<?=$twitter?>"><i class="fab fa-twitter"></i></a></li>
                        <li class="h-lk"><a href="<?=$linkedin?>"><i class="fab fa-linkedin"></i></a></li>
                        <li class="h-yo"><a href="<?=$youtube?>"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="side_copyright"><?=$copyright?></div>
                <div class="wide_sidebar_collapse open_bar">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>

		</header>
