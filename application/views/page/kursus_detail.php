<main style="background-color: #000000;">

	<script type="text/javascript">

		var id_materi;

		$(document).ready(function() {

	        $("body").removeClass("loaded");

	        var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

	        var pathArray = window.location.pathname.split( '/' );

	        id_materi = pathArray[4];

        	document.getElementById("id_materi").value=id_materi;

	        // alert(id_materi);

	        // console.log(id_materi);



		    $.ajax({

		        url : "<?php echo site_url('index.php/Kursus_detail/by_id_materi')?>/"+id_materi,

		        type: "GET",

		        dataType: "JSON",

		        success: function(response){



		        	$('#matapelajaran').html(response.matapelajaran);

		        	$('#ringkasan').html(response.ringkasan);

		        	$('#tinjauan').html(response.tinjauan);

		        	$('#video_materi').html('<iframe width="560" height="315" src="'+ response.path +'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

		        	$('#info_lessons').append('<li style="color: #ffffff;">'+ response.totoal_lessons +' lessons</li>');

		        	$('#info_lessons').append('<li style="color: #ffffff;">'+ response.durasi +' lessons</li>');

		        	if (response.harga == '0') {

		        		$('#harga').html('Gratis');

		        	}else{

		        		$('#harga').html(response.harga);

		        	};



		        	if (response.status_kursus == '0') {

		        		if (response.status_user == '0') {

		        			// $('#tombol_daftar').html('<p style="margin-bottom: unset;" class="text-center"><a href="<?php echo base_url();?>index.php/Login" style="color: #fff;" class="btn_1 full-width">Mendaftar</a></p><a href="#0" class="btn_1 full-width outline"><i class="icon_heart"></i> Tambah ke wishlist</a>');

		        			$('#tombol_daftar').html('<p style="margin-bottom: unset;" class="text-center"><a href="<?php echo base_url();?>index.php/Login" style="color: #fff;background: #6a25b3;" class="btn_1 full-width">Mendaftar</a></p>');

		        		}else{

		        			// $('#tombol_daftar').html('<p style="margin-bottom: unset;" class="text-center" onclick="mendaftar('+ response.id_materi +')"><a style="color: #fff;" class="btn_1 full-width">Mendaftar</a></p><a href="#0" class="btn_1 full-width outline"><i class="icon_heart"></i> Tambah ke wishlist</a>');

		        			$('#tombol_daftar').html('<p style="margin-bottom: unset;" class="text-center" onclick="mendaftar('+ id_materi +')"><a style="color: #fff;background: #6a25b3;" class="btn_1 full-width">Ambil</a></p>');

		        		}

		        		

		        	}else{

		        		$('#tombol_daftar').html('<p style="margin-bottom: unset;" class="text-center"><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ id_materi +'" style="color: #fff;background: #6a25b3;" class="btn_1 full-width">Kursus saya</a></p>');

		        	};



		            response.pelajaran.forEach(function(element) {

		            	if (element.sub_sub_materi == '0') {

		            		$('#matapelajaran_all_sub_materi').hide();

		            		$('#matapelajaran_all').show();

				            $('#sub_sub_materi_tampil').append('<li style="background-color: #424242;color: #ffffff;"><a style="color: #ffffff;" class="video">'+ element.sub_materi +'</a><span>'+ element.waktu +'</span></li>');

		            	}else{

		            		$('#matapelajaran_all_sub_materi').show();

		            		$('#matapelajaran_all').hide();

		            		$('#matapelajaran_all_sub_materi').append('<div class="card"><div style="background-color: #424242;border-radius: unset;" class="card-header" role="tab" id="heading'+ element.id_sub_materi +'"><h5 class="mb-0"><a style="color: #ffffff;" class="collapsed" data-toggle="collapse" href="#collapse'+ element.id_sub_materi +'" aria-expanded="false" aria-controls="collapse"'+ element.id_sub_materi +'"><i style="color: #ffffff;" class="indicator ti-plus"></i>'+ element.sub_materi +'</a></h5></div><div style="background: #424242;" id="collapse'+ element.id_sub_materi +'" class="collapse" role="tabpanel" aria-labelledby="heading'+ element.id_sub_materi +'" data-parent="#accordion_lessons"><div class="card-body"><div class="list_lessons"><ul id="sub_sub_materi_tampil'+ element.id_sub_materi +'"></ul></div></div></div></div>');

		            		element.sub_sub_materi.forEach(function(element_sub) {

				                $('#sub_sub_materi_tampil'+ element.id_sub_materi +'').append('<li style="background-color: #424242;color: #ffffff;"><a style="color: #ffffff;" class="video">'+ element_sub.sub_materi +'</a><span>'+ element_sub.waktu +'</span></li>');

				            });
		            	};
		                
		            });



		        },

		        error: function (jqXHR, textStatus, errorThrown){

		            alert('terjadi kesalahan, coba beberapa saat lagi');

		        }

		    });

	    });



		function mendaftar(){

            var form = document.getElementById("form_mendaftar");

            var fd = new FormData(form);

	        $.ajax({

	            url : "<?php echo site_url('index.php/Kursus/save_mendaftar')?>",

	            type: "POST",

	            data: fd,

	            contentType: false,

	            processData: false,

	            dataType: "JSON",

	            success: function(data)

	            {   

	                if (data.status == true) {

                     	location.replace("<?php echo base_url();?>index.php/Belajar/detail/"+id_materi)

	                }else{

	                    swal({

	                        type: 'warning',

	                        title: '',

	                        text: 'Terjadi Kesalahan, Silahkan Cobalagi Nanti',

	                        footer: '<a href>Why do I have this issue?</a>',

	                    });

	                }

	            },

	            error: function (jqXHR, textStatus, errorThrown)

	            {

	                swal({

	                    type: 'warning',

	                    title: '',

	                    text: 'Terjadi Kesalahan, Silahkan Cobalagi Nanti',

	                    footer: '<a href>Why do I have this issue?</a>',

	                    });

	     

	            }

	        });	

		}

	</script>

  <!-- <section class="hero_single version_2" style="background: url(<?php echo base_url();?>assets/images/a1600x1067.jpg) center center no-repeat fixed;">

      

  </section> -->

	<section id="hero_in" class="courses">

		<div class="wrapper">

			<img style="width: 100%;position: absolute;margin-top: 35px;height: 100%;object-fit: cover;" src="<?php echo base_url();?>assets/images/banner_web.png">

			<div class="container" style="">

				<div>

					<h1 style="color: #00387e;font-size: 280%;margin-top: -20px;" class="fadeInUp">Detail Kursus</h1>

				</div>

			</div>

		</div>

	</section>

  <!-- /hero_single -->



  <div style="background-color: #0b0015;">

		<!-- <nav class="secondary_nav sticky_horizontal" style="background: #afddff;">

			<div class="container">

				<ul class="clearfix">

					<li><a href="#description" class="active">Description</a></li>

					<li><a href="#lessons" >Lessons</a></li>

					<li><a href="#reviews" >Reviews</a></li>

				</ul>

			</div>

		</nav> -->

		<div class="container margin_60_35">

			<div class="row">

				<div class="col-lg-8">

					<section id="description" style="border-bottom: 3px solid #5e5e5e;">

						<!-- <h2>Description</h2> -->

		              	<h2 id="matapelajaran" style="color: #ffffff;"> </h2>

		              	<p id="ringkasan" style="color: #ffffff;"> </p>

					</section>

					<!-- /section -->

					

					<section id="lessons" style="border-bottom: 3px solid #5e5e5e;">

						<div class="intro_title">

							<h2 style="color: #ffffff;">Lessons</h2>

							<ul id="info_lessons">

							</ul>

						</div>

						<div id="accordion_lessons" role="tablist" class="add_bottom_45">

							<div id="matapelajaran_all_sub_materi">

							</div>

							<div id="matapelajaran_all">

								<div class="card">

									<div style="background-color: #424242;border-radius: unset;" class="card-header" role="tab" id="heading'+ element.id_sub_materi +'">

										<h5 class="mb-0">

											<a style="color: #ffffff;" class="collapsed" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
												
												<i style="color: #ffffff;" class="indicator ti-plus"></i>

												Lessons
											
											</a>
									
										</h5>

									</div>

									<div style="background: #424242;" id="collapse" class="collapse" role="tabpanel" aria-labelledby="heading" data-parent="#accordion_lessons">
										
										<div class="card-body">
											
											<div class="list_lessons">
												
												<ul id="sub_sub_materi_tampil">
													

												</ul>
											
											</div>
										
										</div>
									
									</div>
								
								</div>

							</div>

							<!-- /card -->

						</div>

						<!-- /accordion -->

					</section>

					<!-- /section -->

					

					

					<!-- /section -->

				</div>

				<!-- /col -->

				

				<aside class="col-lg-4" id="sidebar1">

					<div class="box_detail" style="background-color: #424242;border: 1px solid #5e5e5e;">

						<figure>

							<div id="video_materi">
								
							</div>

						</figure>

						<div class="price" id="harga" style="color: #FFEB3B;border-bottom: 1px solid #5e5e5e;">

							<!-- free<span class="original_price"><em>$49</em>100% discount price</span> -->

						</div>

						

						<!-- /top-wizard -->

						<form name="form_mendaftar" id="form_mendaftar" >

							<input id="id_materi" name="id_materi" type="hidden">

						</form>

						<div id="tombol_daftar">

							

						</div>

						<div style="color: #ffffff;" id="list_feat">

							<h3 style="color: #ffffff;">Sudah Termasuk</h3>

							<ul>

								<li><i class="icon_mobile"></i>Dapat di buka di handphone</li>

								<li><i class="icon_archive_alt"></i>Dapat diunduh</li>

								<li><i class="icon_chat_alt"></i>Chat Mentor</li>

								<li><i class="icon_document_alt"></i>Sertifikat</li>

							</ul>

						</div>

					</div>

				</aside>

			</div>

			<!-- /row -->

		</div>

		<!-- /container -->

	</div>

	<!-- /bg_color_1 -->



</main>

<!-- /main -->