<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>Belajar Online | Intuisi - Kreatif - Renjana</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/menu1/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url();?>assets/menu1/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url();?>assets/menu1/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url();?>assets/menu1/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url();?>assets/menu1/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo base_url();?>assets/menu1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/menu1/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/menu1/css/vendors.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/menu1/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
	
	<!-- SPECIFIC CSS -->
	<link href="<?php echo base_url();?>assets/menu1/css/skins/square/grey.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/menu1/css/wizard.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url();?>assets/menu1/css/custom.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/menu1/js/jquery-2.2.4.min.js"></script>

</head>

<body id="admission_bg">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="form_container" class="clearfix">
		<figure style="background: #4a71f1;">
			<a href="<?php echo base_url();?>index.php/Home"><img src="<?php echo base_url();?>assets/images/logo-01.png" width="149" data-retina="true" alt=""></a>
		</figure>
		<div id="wizard_container">
			<div id="top-wizard">
				<div id="progressbar"></div>
			</div>
			<!-- /top-wizard -->
			<form name="example-1" id="wrapped" method="POST">
				<input id="website" name="website" type="text" value="">
				<!-- Leave for security protection, read docs for details -->
				<div id="middle-wizard">
					<div class="step">
						<div id="intro">
							<figure><img src="img/wizard_intro_icon.svg" alt=""></figure>
							<h1>Formulir Pendaftaran Pengajar</h1>
							<p>Isilah formulir pendaftaran berikut dengan data yang sebenar-benarnya untuk menjadi pengajar di Ruangguru. Pastikan Anda telah menyiapkan dokumen-dokumen terkait untuk diunggah di formulir ini! </p>
							<!-- <p><strong>Mel erant legere iuvaret ea. At eum doctus voluptatibus, has id veritus constituam.</strong></p> -->
						</div>
					</div>

					<div class="step">
						<h3 class="main_question"><strong>1/3</strong>Bagikan pengetahuan Anda</h3>
						<p>Kursus Udemy adalah pengalaman berbasis video yang memberikan siswa kesempatan untuk mempelajari keterampilan yang dapat ditindaklanjuti. Apakah Anda memiliki pengalaman mengajar, atau ini adalah pertama kalinya Anda, kami akan membantu Anda mengemas pengetahuan Anda ke dalam kursus online yang meningkatkan kehidupan siswa.</p>
						<div class="form-group radio_input">
							<label>Pengajaran seperti apa yang telah Anda lakukan sebelumnya?</label>
							<label><input type="radio" value="Male" name="gender" class="icheck">Secara pribadi, secara informal</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Secara pribadi, secara profesional</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Online</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Other</label>
						</div>
					</div>
					<!-- /step-->

					<div class="step">
						<h3 class="main_question"><strong>2/3</strong>Buat kursus</h3>
						<p>Selama bertahun-tahun kami telah membantu ribuan instruktur mempelajari cara merekam di rumah. Tidak masalah tingkat pengalaman Anda, Anda dapat menjadi pro video juga. Kami akan membekali Anda dengan sumber daya, kiat, dan dukungan terbaru untuk membantu Anda sukses.</p>
						<div class="form-group radio_input">
							<label>Berapa banyak video "pro" Anda?</label>
							<label><input type="radio" value="Male" name="gender" class="icheck">Saya seorang pemula</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Saya memiliki pengetahuan</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Saya berpengalaman</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Saya punya video yang siap diunggah</label>
						</div>
					</div>
					<!-- /step-->

					<div class="submit step">
						<h3 class="main_question"><strong>3/3</strong>Perluas jangkauan Anda</h3>
						<p>Setelah Anda mempublikasikan kursus Anda, Anda dapat menumbuhkan audiensi siswa Anda dan membuat dampak dengan dukungan promosi pasar Udemy dan juga melalui upaya pemasaran Anda sendiri. Bersama-sama, kami akan membantu siswa yang tepat menemukan kursus Anda.</p>
						<div class="form-group radio_input">
							<label>Apakah Anda memiliki audiens untuk berbagi kursus?</label>
							<label><input type="radio" value="Male" name="gender" class="icheck">Tidak saat ini</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Saya punya pengikut kecil</label><br>
							<label><input type="radio" value="Female" name="gender" class="icheck">Saya memiliki pengikut yang cukup besar</label><br>
						</div>
					</div>
					<!-- /step-->
				</div>
				<!-- /middle-wizard -->
				<div id="bottom-wizard">
					<button type="button" name="backward" class="backward">Previous </button>
					<button type="button" name="forward" class="forward">Continue</button>
					<button type="submit" name="process" class="submit">Submit</button>
				</div>
				<!-- /bottom-wizard -->
			</form>
		</div>
		<!-- /Wizard container -->
	</div>
	<!-- /Form_container -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
    <script src="<?php echo base_url();?>assets/menu1/js/common_scripts.js"></script>
    <script src="<?php echo base_url();?>assets/menu1/js/main_admission.js"></script>
	<script src="<?php echo base_url();?>assets/menu1/assets/validate.js"></script>

	<script src="<?php echo base_url();?>assets/sweetalert/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="<?php echo base_url();?>assets/menu1/js/jquery-ui-1.8.22.min.js"></script>
	<script src="<?php echo base_url();?>assets/menu1/js/jquery.wizard.js"></script>
	<script src="<?php echo base_url();?>assets/menu1/js/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>assets/menu1/js/admission_func.js"></script>
  
</body>
</html>