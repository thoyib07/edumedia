<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Udema a modern educational site template">

    <meta name="author" content="Ansonika">

    <title>Edumedia | Intuition - Creative - Emotion</title>



    <!-- Favicons-->

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/menu1/img/LOGO_4.png" type="image/x-icon">

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



	



	<script type="text/javascript">

		// $(document).ready(function() {

	 //        var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

	 //        var pathArray = window.location.pathname.split( '/' );

	 //        id_materi = pathArray[7];

	 //        console.log(id_materi);

	 //    });

	</script>

	

	<div id="preloader">

		<div data-loader="circle-side"></div>

	</div>

	<!-- End Preload -->

	

	<div id="form_container" class="clearfix">

		<figure style="background: #E6E6FA;">

			<a href="<?php echo base_url();?>index.php/Home"><img src="<?php echo base_url();?>assets/images/LOGO_6.png" width="149" data-retina="true" alt=""></a>

		</figure>

		<div id="wizard_container">

			<div id="top-wizard">

				<div id="progressbar"></div>

			</div>

			<!-- /top-wizard -->

			<form method="POST" action="<?php echo site_url('index.php/Belajar/detail/'.$id_materi); ?>">

				<input id="website" name="website" type="text" value="">

				<input id="id_materi" name="id_materi" type="hidden" value="<?php echo $id_materi;?>">

				<!-- <input id="id_matapelajaran" name="id_matapelajaran" type="hidden" value="<?php echo $id_matapelajaran;?>"> -->

				<!-- Leave for security protection, read docs for details -->

				<div id="middle-wizard">

					<!-- /step-->

					<?php $no = 1;?>

					<div class="submit step">

						<center><h3 style="font-size: 33px;" class="main_question">Poin</h3></center>

						<center><h2 style="font-size: 60px;"><b><?php echo $poin;?></b></h2></center>

						<!-- <div class="form-group radio_input">

							<table width="100%">

								<tbody>

									<?php foreach ($data_soal as $row_soal) { ?>



										<tr>

											<td><label><?php echo $no++.'. '.$row_soal['soal'];?></label></td>

										</tr>

									<?php } ?>

								</tbody>	

							</table>							

						</div> -->

					</div>

					<!-- /step-->

				</div>

				<!-- /middle-wizard -->

				<div id="bottom-wizard">

					<button type="button" name="backward" class="backward">Backward </button>

					<button type="button" name="forward" class="forward">Forward</button>

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