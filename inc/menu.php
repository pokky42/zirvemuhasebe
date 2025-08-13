<style>
    
    :root{
        
        --renk1:<?=$panel["p_renk1"]?>;
        --renk2:<?=$panel["p_renk2"]?>;
    }
</style>

   <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="./" class="logo"><img src="../resimler/<?=$logo?>" height="28"></a>
                        <a href="./" class="logo-sm"><img src="../resimler/<?=$favicon?>" height="36"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                           
                            <ul class="nav navbar-nav navbar-right pull-right">
                              
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>
                                </li>
                                
                                <li class="hidden-xs">
                                    <a href="../" target="_blank" class="waves-effect waves-light"><i class="fa fa-eye"></i>Siteye Geç</a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="../resimler/<?=$favicon?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="yonetici-ekle?islem=duzenle&id=<?=$_SESSION["id"]?>">Hesabı Düzenle</a></li>
                                        <li><a href="ayarlar"> Ayarlar </a></li>
                                        <li class="divider"></li>
                                        <li><a href="include/cikis.php"> Çıkış Yap</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            


           

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="text-center">
                            <img src="../resimler/<?=$favicon?>" alt="" class="img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?=$_SESSION["ad_soyad"]?></a>
                               
                            </div>

                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Çevrimiçi</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="./" class="waves-effect"><i class="ti-home"></i><span> Anasayfa </span></a>
                            </li>

                            <li>
                                <a href="iletisimden-gelenler" class="waves-effect"><i class="ti-ruler-pencil"></i><span> İletişimden Gelenler </span></a>
                            </li>
                            
                            
                                <li>
                                <a href="rezervasyon-gelenler" class="waves-effect"><i class="ti-ruler-pencil"></i><span> <b>Rezervasyon</b> Gelenler </span></a>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu"></i><span> Menü Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="menu-ekle"> Menü Ekle</a></li>
                                    <li><a href="menu-listele?footer=0">Menü Listele</a></li>
                                </ul>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-gallery"></i><span> Slider Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="slider-ekle"> Slider Ekle</a></li>
                                    <li><a href="slider-listele">Slider Listele</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-ruler-pencil"></i><span> İstatistik Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="istatik-ekle"> İstatistik Ekle</a></li>
                                    <li><a href="istatik-listele">İstatistik Listele</a></li>
                                </ul>
                                </li>
                            
                            
                              <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-packets"><i class="ti-menu"></i><span> Paket Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="paket-ekle"> Paket Ekle</a></li>
                                    <li><a href="paket-listele">Paket Listele</a></li>
                                </ul>
                            
                                 </li>
                                          <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-ruler-pencil"></i><span> Özellik Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ozellik-ekle"> Özellikler Ekle</a></li>
                                    <li><a href="ozellik-listele">Özellikler Listele</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i><span> Ürün Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="urun-ekle"> Ürün Ekle</a></li>
                                    <li><a href="urun-listele">Ürün Listele</a></li>
                                    <li><a href="kategori-ekle"> Kategori Ekle</a></li>
                                    <li><a href="kategori-listele">Kategori Listele</a></li>
                                </ul>
                            </li>




                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i><span> S.S.S Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="sss-ekle"> S.S.S Ekle</a></li>
                                    <li><a href="sss-listele">S.S.S Listele</a></li>
                                </ul>
                            </li>

                          

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-write"></i><span> Haber Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="haber-ekle"> Haber Ekle</a></li>
                                    <li><a href="haber-listele">Haber Listele</a></li>
                                </ul>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-image"></i><span> Galeri Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="galeri-ekle"> Galeri Ekle</a></li>
                                    <li><a href="galeri-listele">Galeri Listele</a></li>
                                </ul>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-control-play"></i><span> Video Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="video-ekle"> Video Ekle</a></li>
                                    <li><a href="video-listele">Video Listele</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Ekibimiz Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ekibimiz-ekle"> Ekibimiz Ekle</a></li>
                                    <li><a href="ekibimiz-listele">Ekibimiz Listele</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Sayfa Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="sayfa-ekle"> Sayfa Ekle</a></li>
                                    <li><a href="sayfa-listele">Sayfa Listele</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-ruler-pencil"></i><span> Proje Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="proje-ekle"> Proje Ekle</a></li>
                                    <li><a href="proje-listele">Proje Listele</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-heart"></i><span> Yorum Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="yorum-ekle"> Yorum Ekle</a></li>
                                    <li><a href="yorum-listele">Yorum Listele</a></li>
                                </ul>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i><span> Hizmet Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="hizmet-ekle"> Hizmet Ekle</a></li>
                                    <li><a href="hizmet-listele">Hizmet Listele</a></li>
                                </ul>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-layers-alt"></i><span> Referans Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="referans-ekle"> Referans Ekle</a></li>
                                    <li><a href="referans-listele">Referans Listele</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="ayarlar" class="waves-effect"><i class="ti-settings"></i><span> Site Ayarları </span></a>
                            </li>
                            
                             <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Admin Yönetimi </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="yonetici-ekle"> Yönetici Ekle</a></li>
                                    <li><a href="yonetici-listele">Yönetici Listele</a></li>
                                </ul>
                            </li>

                         

                          
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>