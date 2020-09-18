<main>

	<script type="text/javascript">

		var id_materi;

		var id_sub_materi = null;

		var id_sub_materi_ser;

		$(document).ready(function() {

	        var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

	        var pathArray = window.location.pathname.split( '/' );

	        id_materi = pathArray[4];

	        id_sub_materi = pathArray[5];

        	document.getElementById("id_mata_pelajaran").value=id_materi;

	        // alert(id_materi);

	        console.log(id_materi);



		    $.ajax({

		        url : "<?php echo site_url('index.php/Belajar/get_sub_materi_by_id_materi')?>/"+id_materi,

		        type: "GET",

		        dataType: "JSON",

		        success: function(response){

		        	$('#matapelajaran').html(response.matapelajaran);

		        	$('#ringkasan').html(response.ringkasan);

		        	$('#tinjauan').html(response.tinjauan);

		        	if (response.harga == '0') {

		        		$('#harga').html('Gratis');

		        	}else{

		        		$('#harga').html(response.harga);

		        	};



		        	var id_materi_button = null;

		        	var jml_mtr_selesai = 0;


		            response.forEach(function(element) {



		            	id_sub_materi_ser = element.id_sub_materi;



		            	if (element.status == '0') {

		            		// $('#list_pelajaran').append('<li>'+ element.sub_materi +'<span><a><i class="icon-videocam"></i></a></span></li>');

		            		// $('#list_program').append('<li>'+ element.sub_materi +'<span><a><i class="icon_download"></i> PDF</a></span></li>');

		            		// $('#list_pelajaran_m').append('<li>'+ element.sub_materi +'<span><a><i class="icon-videocam"></i></a></span></li>');

		            		// $('#list_program_m').append('<li>'+ element.sub_materi +'<span><a><i class="icon_download"></i> PDF</a></span></li>');

		            		$('#list_pelajaran').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><i class="icon-videocam"></i></td></tr>');

		            		$('#list_program').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><i class="icon_download"></i></td></tr>');

		            	}else if (element.status == '1'){

		            		// $('#list_pelajaran').append('<li>'+ element.sub_materi +'<span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_matapelajaran +'/'+ element.id_materi +'"><i style="color: #ff5419;" class="icon-spin3"></i></a></span></li>');

		            		// $('#list_program').append('<li>'+ element.sub_materi +'<span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></li>');

		            		// $('#list_pelajaran_m').append('<li>'+ element.sub_materi +'<span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_matapelajaran +'/'+ element.id_materi +'"><i style="color: #ff5419;" class="icon-spin3"></i></a></span></li>');

		            		// $('#list_program_m').append('<li>'+ element.sub_materi +'<span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></li>');


		            		$('#list_pelajaran').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_materi +'/'+ element.id_sub_materi +'"><i style="color: #ff5419;" class="icon-spin3"></i></a></span></td></tr>');

		            		$('#list_program').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></td></tr>');


		            		if (id_sub_materi == null) {

		            			id_materi_button = element.id_sub_materi;

		            			id_sub_materi = element.id_sub_materi;

		            		}else{

		            			id_materi_button = id_sub_materi;

		            			id_sub_materi = id_sub_materi;

		            		};


		            	}else{

		            		jml_mtr_selesai++;

		            		// $('#list_pelajaran').append('<li>'+ element.materi +'<span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_matapelajaran +'/'+ element.id_materi +'"><i style="color: #72cc3c;" class="icon-ok-circled"></i></a></span></li>');

		            		// $('#list_program').append('<li>'+ element.materi +'<span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></li>');

		            		// $('#list_pelajaran_m').append('<li>'+ element.materi +'<span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_matapelajaran +'/'+ element.id_materi +'"><i style="color: #72cc3c;" class="icon-ok-circled"></i></a></span></li>');

		            		// $('#list_program_m').append('<li>'+ element.materi +'<span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></li>');
		            		

		            		$('#list_pelajaran').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_materi +'/'+ element.id_sub_materi +'"><i style="color: #72cc3c;" class="icon-ok-circled"></i></a></span></td></tr>');

		            		$('#list_program').append('<tr><td valign="top" width="7%"><i class="ti-control-record"></i></td valign="top"><td width="90%">'+ element.sub_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>assets/document/PROPOSAL PENGAJUAN HRIS - PT Multi Hidrachrome Industri.pdf" target="_blank"><i class="icon_download"></i> PDF</a></span></td></tr>');
		            		

		            	};



		            });

					

					

					if (jml_mtr_selesai < response.length ) {

						$('#button_kuis').append('<a style="background: #662d91;width: 80%;margin-left: 9%;margin-bottom: 6%;margin-top: 6%;" href="<?php echo base_url();?>index.php/Kuis/get_kuis/'+ id_materi_button +'/'+ id_materi +'" class="btn_1 full-width">Kuis</a>');

					}else{

						if (id_sub_materi == null) {

	            			id_sub_materi = id_sub_materi_ser;

	            		}else{

	            			id_sub_materi = id_sub_materi;

	            		};

					};



					$.ajax({

				        url : "<?php echo site_url('index.php/Belajar/get_sub_materi_by_id_sub_materi')?>/"+id_sub_materi,

				        type: "GET",

				        dataType: "JSON",

				        success: function(response_sub_materi){


				        	// $('#video').html('<iframe allow="camera; microphone; display-capture" src="https://meet.jit.si/edumediaallowfullscreen="true" style="height: 100%; width: 100%; border: 0px;"></iframe>');


				        	$('#video').html('<figure style="height: 400px;"><iframe src="'+ response_sub_materi.path +'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>');

				        	$('#description').html(response_sub_materi.description);

				        },

				        error: function (jqXHR, textStatus, errorThrown){

				            alert('terjadi kesalahan, coba beberapa saat lagi');

				        }

				    });



		        },

		        error: function (jqXHR, textStatus, errorThrown){

		            alert('terjadi kesalahan, coba beberapa saat lagi');

		        }

		    });

	    });

	</script>

	<div class="">

		<div style="background-color: #0b0015;">

			<div class="container margin_60_35" style="padding-top: 82px;">

				<div class="row">

					<div class="col-lg-8">

						<!-- /top-wizard -->

						<form name="form_mendaftar" id="form_mendaftar" >

							<input id="id_mata_pelajaran" name="id_mata_pelajaran" type="hidden">

						</form>

						<section id="video">

						</section>

						<section id="description" style="color: #ffffff;">

						</section>

					</div>				

					<aside class="col-lg-4" id="sidebar1">

						<div class="card" style="background: #5e5e5e;">

							<div class="list_lessons_2" style="padding: 3%;height: 412px;overflow: auto;">

								<!-- <ul id="list_pelajaran" style="height: 412px;overflow: auto;color: #ffffff;">

								</ul> -->

								<table style="color: #ffffff;" width="100%">
									<tbody id="list_pelajaran">
									</tbody>
								</table>

							</div>

							<div id="button_kuis"> </div>

						</div>

					</aside>

				</div>

				<!-- /row -->

			</div>

			<!-- /container -->

		</div>

		<!-- /bg_color_1 -->
		
	</div>

</main>

<!--/main-->