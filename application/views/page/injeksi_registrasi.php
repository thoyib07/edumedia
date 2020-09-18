<main style="background-color: #000000;">

	<script type="text/javascript">

		function simpan_data(){

	        		url = "<?php echo site_url('index.php/injeksi_registrasi/ajax_save')?>";

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

		}

	</script>

	<!-- <section id="hero_in" class="courses">

		<div class="wrapper">

			<img style="width: 100%;position: absolute;margin-top: 35px;height: 100%;object-fit: cover;" src="<?php echo base_url();?>assets/images/banner_web.png">

			<div class="container" style="">

				<div>

					<h1 style="color: #00387e;font-size: 280%;margin-top: -20px;" class="fadeInUp">Detail Kursus</h1>

				</div>

			</div>

		</div>

	</section> -->

  	<div style="background-color: #0b0015;">

		<div class="container margin_60_35" style="margin-top: 26px;">

			<div class="row">
				
				<div class="col-lg-12" style="padding-right: 15%;padding-left: 15%;">

					<form name="formulir_pendaftaran" id="formulir_pendaftaran" >
					
						<div class="box_cart" style="background-color: #16121a;border: unset;">
							
							<!-- <hr> -->
							
							<div class="form_title">
							
								<h3 style="color: #fff;">Pendaftaran Injeksi LMS</h3>
							
								<!-- <p>
							
									Mussum ipsum cacilds, vidis litro abertis.
							
								</p> -->
							
							</div>
							
							<div class="step" style="margin-bottom: 0px;">
								
								<div class="row" style="margin-top: 30px;">
							
									<div class="col-sm-12">
							
										<span class="input">
							
											<input style="color: #fff;" class="input_field" type="text" name="nama" id="nama">
							
											<label class="input_label">
							
												<span style="color: #fff;" class="input__label-content">Nama</span>
							
											</label>
										</span>
							
									</div>
							
									<div class="col-sm-12">
							
										<span class="input">
							
											<input style="color: #fff;" class="input_field" type="text" name="jabatan" id="jabatan">
							
											<label class="input_label">
							
												<span style="color: #fff;" class="input__label-content">Jabatan</span>
							
											</label>
										</span>
							
									</div>
							
									<div class="col-sm-12">
							
										<span class="input">
							
											<input style="color: #fff;" class="input_field" type="email" name="email" id="email">
							
											<label class="input_label">
							
												<span style="color: #fff;" class="input__label-content">Email</span>
							
											</label>
										</span>
							
									</div>
							
									<div class="col-sm-12">
							
										<span class="input">
							
											<input style="color: #fff;" class="input_field" type="text" name="no_telpon_sekolah" id="no_telpon_sekolah">
							
											<label class="input_label">
							
												<span style="color: #fff;" class="input__label-content">No Telpon </span>
							
											</label>
										</span>
							
									</div>
								
									<div class="col-md-6 add_top_30">
								
										<label style="color: #fff;">Nama Sekolah/Universitas</label>
								
										<div class="row">
								
											<div class="col-md-12 select">

												<div class="styled-select" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">

													<select class="required" name="jenjang_pendidikan" id="kelas">

														<option value="0" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;"> --> Pilih <-- </option>

														<option value="SD" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">SD</option>

														<option value="SMP" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">SMP</option>

														<option value="SMA" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">SMA</option>

														<option value="SMK" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">SMK</option>

														<option value="Univ" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">Universitas/Institut</option>

														<option value="Univ" style="margin-bottom: unset;background-color: #332f37;border-bottom: 2px solid #332f37;color: #fff;">Lainnya . . .</option>

													</select>

												</div>
								
											</div>
								
										</div>
								
									</div>
							
									<div class="col-sm-6" style="margin-top: 40px;">
							
										<span class="input">
							
											<input style="color: #fff;" class="input_field" type="text" name="nama_sekolah" placeholder="Isi Nama Sekolah/Universitas" id="nama_sekolah">
							
											<label class="input_label">
							
												<!-- <span style="color: #fff;" class="input__label-content">pakai hint</span> -->
							
											</label>
										</span>
							
									</div>
							
									<div class="col-sm-12">
							
										<span class="input">
							
											<textarea style="color: #fff;" class="input_field" type="text" name="alamat_sekolah" id="alamat_sekolah"></textarea>
							
											<label class="input_label">
							
												<span style="color: #fff;" class="input__label-content">Alamat Sekolah/Universitas</span>
							
											</label>
										</span>
							
									</div>
								
									<div class="col-md-12 add_top_30">
								
										<label style="color: #fff;margin-bottom: unset;">Apakah Sekolah/Universitas Anda Sudah Memiliki Domain dan Hosting ?</label>
								
										<p style="color: #def140;margin-bottom: unset;">
										
											<i style="font-size: 10px;">Domain dan hosting adalah website sekolah/universitas yang dapat di akses secara online</i>
										
										</p>
								
										<div class="row">

											<div class="col-sm-9">

												<label style="color: #fff;"><input style="color: #fff;" type="radio" name="domain" id="domain" value="0" checked=""> Ya</label>

												<label style="color: #fff;"><input style="color: #fff;margin-left: 20px;" type="radio" name="domain" id="domain" value="1"> Tidak</label>

												<span class="help-block" style="color: #ff0000"></span>

											</div>
								
										</div>
								
									</div>
								
									<div class="col-md-12 add_top_30">
								
										<label style="color: #fff;margin-bottom: unset;">Apakah Sekolah/Universitas Anda memiliki Tim Konten Kreator ? </label>
								
										<p style="color: #def140;margin-bottom: unset;">
										
											<i style="font-size: 10px;">Tim konten kreator adalah tim yang membuat digitalisasi materi dalam bentuk video pembelajaran</i>
										
										</p>
								
										<div class="row">

											<div class="col-sm-9" style="margin-bottom: 10px;color: #fff;">

												<label style="color: #fff;"><input style="color: #fff;" type="radio" name="tim_content" id="tim_content" value="0" checked=""> Ya </label>

												<label style="color: #fff;"><input style="color: #fff;margin-left: 20px;" type="radio" name="tim_content" id="tim_content" value="1"> Tidak</label>

												<span class="help-block" style="color: #ff0000"></span>

											</div>
								
										</div>
								
									</div>
							
									<div class="float-left fix_mobile" style="margin-left: 2%;">
									
										<p style="margin-top: 41%;" class="text-center" onclick="simpan_data()"><i class="fa fa-google-plus"></i><a style="width: 100%;background: #f14068;padding: 9px 30px;" href="#0" class="btn_1 rounded">Kirim</a></p>
								
									</div>
								
								</div>

							</div>

							<!-- <div class="cart-options clearfix">
							
								<div class="float-right fix_mobile">
							
									<p class="text-center" onclick="simpan_data()"><i class="fa fa-google-plus"></i><a style="width: 100%;background: #f14068;" href="#0" class="btn_1 rounded">Kirim</a></p>
							
								</div>
							
							</div> -->
						
						</div>

					</form>
				
				</div>

			</div>

		</div>

	</div>

</main>

<!-- /main -->