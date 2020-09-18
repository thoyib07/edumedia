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



	<script type="text/javascript">

		$(document).ready(function() {



        	$("#div_kelas").hide();

			// alert("masuk bosku");

		    $('[name="konfirmasi_kata_sandi"]').change(function(){



		    	var kata_sandi=document.getElementById("kata_sandi").value;

	        	var konfirmasi_kata_sandi=document.getElementById("konfirmasi_kata_sandi").value;



	        	if (kata_sandi != konfirmasi_kata_sandi) {

	        		$('[name="kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').next().text("Sandi tersebut tidak cocok, Coba lagi.");

	        	}else{

	        		$(this).parent().parent().removeClass('has-error');

			        $(this).next().empty();

			        $('[name="kata_sandi"]').next().empty();

	        	};

		    });



		    $('[name="kata_sandi"]').change(function(){



		    	var kata_sandi=document.getElementById("kata_sandi").value;

	        	var konfirmasi_kata_sandi=document.getElementById("konfirmasi_kata_sandi").value;



	        	if (kata_sandi != konfirmasi_kata_sandi) {

	        		$('[name="kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').next().text("Sandi tersebut tidak cocok, Coba lagi.");

	        	}else{

			        $(this).parent().parent().removeClass('has-error');

			        $(this).next().empty();

			        $('[name="konfirmasi_kata_sandi"]').next().empty();

	        	};

		    });



		    $('[name="nama_lengkap"]').change(function(){

		        $(this).parent().parent().removeClass('has-error');

		        $(this).next().empty();

		    });



		    $('[name="email"]').change(function(){

		        $(this).parent().parent().removeClass('has-error');

		        $(this).next().empty();

		    });



		    $('[name="handphone"]').change(function(){

		        $(this).parent().parent().removeClass('has-error');

		        $(this).next().empty();

		    });



		    $('[name="kelas"]').change(function(){

		        $(this).parent().parent().removeClass('has-error');

		        $(this).next().empty();

		    });



		    $('[name="kata_sandi"]').change(function(){

		        $(this).parent().parent().removeClass('has-error');

		        $(this).next().empty();

		    });

	    });



		function simpan_data(){



	        var kata_sandi=document.getElementById("kata_sandi").value;

	        var konfirmasi_kata_sandi=document.getElementById("konfirmasi_kata_sandi").value;



	        if (kata_sandi && konfirmasi_kata_sandi) {

	        	if (kata_sandi != konfirmasi_kata_sandi) {

	        		$('[name="kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').parent().parent().addClass('has-error');

	                $('[name="konfirmasi_kata_sandi"]').next().text("sandi tersebut tidak cocok, Coba lagi.");

	        	}else{

	        		url = "<?php echo site_url('index.php/Registrasi_murid/ajax_save')?>";

		            misage_success = "Cek email untuk menyelsaikan pendaftaran..!";

		            misage_error = "Terjadi Kesalahan, Silahkan Cobalagi Nanti";



			        swal({

			            title: "Pastikan data yang anda isi sudah benar!",

			            type: "info",

			            showCancelButton: true,

			            closeOnConfirm: false,

			            showLoaderOnConfirm: true

			        }, function () {

			            setTimeout(function () {

			                var form = document.getElementById("formulir_pendaftaran");

			                var fd = new FormData(form);

			                $.ajax({

			                    url : url,

			                    type: "POST",

			                    data: fd,

			                    contentType: false,

			                    processData: false,

			                    dataType: "JSON",

			                    success: function(data)

			                    {   

			                        if (data.status == true) {

			                            swal({

			                                title: misage_success,

			                                type: "success",

			                                confirmButtonClass: "btn-danger",

			                                confirmButtonText: "Ya, Selesai",

			                                closeOnConfirm: true

			                            },

			                            function(){

			                                // reload_table();

			                                // location.reload();

			                                location.replace("<?php echo base_url();?>index.php/Home")

			                                $('#myModal').modal('hide'); // show bootstrap modal

			                            });

			                        } else {

			                      //       $('[name="nama_lengkap"]').parent().parent().addClass('has-error');

					                    // $('[name="nama_lengkap"]').next().text(data.error_string['nama_lengkap']);

					                    

					                    // $('[name="email"]').parent().parent().addClass('has-error');

					                    // $('[name="email"]').next().text(data.error_string['email']);

					                    

					                    // $('[name="handphone"]').parent().parent().addClass('has-error');

					                    // $('[name="handphone"]').next().text(data.error_string['handphone']);

					                    

					                    // $('[name="kata_sandi"]').parent().parent().addClass('has-error');

					                    // $('[name="kata_sandi"]').next().text(data.error_string['kata_sandi']);

					                    

					                    // $('[name="konfirmasi_kata_sandi"]').parent().parent().addClass('has-error');

					                    // $('[name="konfirmasi_kata_sandi"]').next().text(data.error_string['konfirmasi_kata_sandi']);

					                    swal({

	                                        type: 'warning',

	                                        title: '',

	                                        text: 'Yang ber tanda (*) wajib di isi!',

	                                        footer: '<a href>Why do I have this issue?</a>',

                                        });

			                        }

			                    },

			                    error: function (jqXHR, textStatus, errorThrown)

			                    {

			                        swal({

			                            type: 'warning',

			                            title: '',

			                            text: misage_error,

			                            footer: '<a href>Why do I have this issue?</a>',

			                            });

			             

			                    }

			                });

			            }, 2000);

			        });

	        	};

	        }else{

	    		$('[name="kata_sandi"]').parent().parent().addClass('has-error');

	            $('[name="kata_sandi"]').parent().parent().addClass('has-error');

	            $('[name="kata_sandi"]').next().text("kata sandi harus di isi.");

	        };	

		}

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

			<form name="formulir_pendaftaran" id="formulir_pendaftaran" >

				<input id="website" name="website" type="text" value="">

				<!-- Leave for security protection, read docs for details -->

				<div id="middle-wizard">

					<div class="step">

						<center><h4 class="main_question">Daftar Sebagai Murid</h4></center>

						<center><p>Isi data kamu di bawah dengan lengkap untuk mulai merasakan #BelajarJadiLuarBiasa!</p></center>

						<div class="form-group">

							<input style="margin-bottom: unset;" type="text" name="nama_lengkap" class="form-control required" placeholder="*Nama Lengkap">

							<span class="help-block" style="color: #ff0000"></span>

						</div>

						<div class="form-group has-error">

							<input style="margin-bottom: unset;" type="text" name="email" class="form-control required" placeholder="*Email">

							<span class="help-block" style="color: #ff0000"></span>

						</div>

						<div class="form-group">

							<input style="margin-bottom: unset;" type="text" name="handphone" class="form-control" placeholder="*Nomor Handphone">

							<span class="help-block" style="color: #ff0000"></span>

						</div>

						<div class="form-group select" id="div_kelas" type="hidden">

							<div class="styled-select">

								<select class="required" name="kelas" id="kelas">

									<option value="I">Kelas I</option>

									<option value="II">Kelas II</option>

									<option value="III">Kelas III</option>

									<option value="IV">Kelas IV</option>

									<option value="V">Kelas V</option>

									<option value="VI">Kelas VI</option>

									<option value="VII">Kelas VII</option>

									<option value="VIII">Kelas VIII</option>

									<option value="IX">Kelas IX</option>

									<option value="X IPA">Kelas X IPA</option>

									<option value="XI IPA">Kelas XI IPA</option>

									<option value="XII IPA">Kelas XIII IPA</option>

									<option value="X IPS">Kelas X IPS</option>

									<option value="XI IPS">Kelas XI IPS</option>

									<option value="XII IPS">Kelas XIII IPS</option>

								</select>

							</div>

						</div>

						<div class="form-group">

							<input style="margin-bottom: unset;" type="password" name="kata_sandi" id="kata_sandi" class="form-control required" placeholder="*Kata Sandi (minimal 6 karakter)">

							<span class="help-block" style="color: #ff0000"></span>

						</div>

						<div class="form-group">

							<input style="margin-bottom: unset;" type="password" name="konfirmasi_kata_sandi" id="konfirmasi_kata_sandi" class="form-control required" placeholder="*Konfirmasi Kata Sandi">

							<span class="help-block" style="color: #ff0000"></span>

						</div>

					</div>

					<!-- /step-->

				</div>

				<!-- /middle-wizard -->

				<div id="bottom-wizard">

					<!-- <button type="button" name="backward" class="backward">Backward </button>

					<button type="button" name="forward" class="forward">Forward</button> -->

					<!-- <button type="submit" name="process" class="">Submit</button> -->

					<p class="text-center" onclick="simpan_data()"><i class="fa fa-google-plus"></i><a style="width: 100%;background: #92278f;" href="#0" class="btn_1 rounded">Submit</a></p>

					<!-- <div style="margin: 0 0 30px 0;" class="divider"><span>Or</span></div> -->

					<!-- <a href="#0" class="social_bt google">Registrasi with Google</a>

					<a href="#0" class="social_bt facebook">Registrasi with Facebook</a> -->

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