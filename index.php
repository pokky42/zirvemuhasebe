<?php
include("admin/include/baglan.php");
include("admin/include/fonksiyonlar.php");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<meta name="description" content="<?=$des?>">
	<meta name="keywords" content="<?=$keyword?>">
	<meta name="author" content="themexriver">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="resimler/<?=$favicon?>">
    <link rel="manifest" href="resimler/<?=$favicon?>">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<?=$header?>
</head>

<body class="home-1">
	<div id="preloader"></div>
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>


<?php
        include("inc/header.php");
        include("inc/slider.php");
        include("inc/hizmetler.php");
        include("inc/hakkimizda.php");
        include("inc/projeler.php");
        include("inc/referanslar.php");
        include("inc/ekibimiz.php");
        include("inc/yorum.php");
        include("inc/iletisim.php");
        include("inc/blog.php");
        include("inc/footer.php");
        
        
		
		?>



		 <?=$footer?>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jarallax.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/appear.js"></script>
		<script src="assets/js/Chart.min.js"></script>
		<script src="assets/js/utils.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/jquery.filterizr.js"></script>
		<script src="assets/js/circle-progress.js"></script>
		<script src="assets/js/tilt.jquery.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/gmap3.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>
	</body>
	
</html>
