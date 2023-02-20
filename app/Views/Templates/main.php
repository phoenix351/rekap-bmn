<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= esc(base_url()); ?>/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 6 Solid", "Font Awesome 6 Regular", "Font Awesome 6 Brands", "simple-line-icons"], urls: ['<?= esc(base_url()); ?>/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= esc(base_url()); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= esc(base_url()); ?>/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= esc(base_url()); ?>/assets/css/demo.css">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= esc(base_url()); ?>/assets/css/select2-bs.min.css">

</head>
<body>
	<div class="wrapper">
        <!-- Navbar -->
        <?= $this->include('components/navbar')?>
        <!-- End Navbar -->

        <!-- Sidebar -->
        <?= $this->include('components/sidebar')?>
        <!-- End Sidebar -->

        <!-- Sidebar -->
        <?= $this->include('components/main_panel')?>
        <!-- End Sidebar -->
        </div>

	<!--   Core JS Files   -->
	<script src="<?= esc(base_url()); ?>/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="<?= esc(base_url()); ?>/assets/js/core/popper.min.js"></script>
	<script src="<?= esc(base_url()); ?>/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= esc(base_url()); ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= esc(base_url()); ?>/assets/js/atlantis.min.js"></script>
    <?= $this->renderSection('js')?>

    
</body>
</html> 



