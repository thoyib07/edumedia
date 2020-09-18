<script type="text/javascript">

  $(document).ready(function() {

      var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

      var pathArray = window.location.pathname.split( '/' );

      var id_materi = pathArray[4];

      $.ajax({

          url : "<?php echo site_url('index.php/Chat_mentor/get_all_mentor_aktif')?>",

          type: "GET",

          dataType: "JSON",

          success: function(response){

                response.data.forEach(function(element) {

                  // $('#kategori_show_home').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;background-color: #282828;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'"><img src="http://edumedia.id/'+ element.foto +'" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small style="color: #ffffff;font-size: 113%;">'+ element.no_hp_show +'</small><h3 style="color: #ffffff;">'+ element.nama +'</h3></div><ul><li style="color: #ffffff;"><li></li><li><a style="background: #01e675;color: #ffffff;" href="https://api.whatsapp.com/send?phone=62' + element.no_hp + '&text=Hello Kak '+ element.nama +'"><i style="margin-right: 3%;margin-left: -3%;"><img src="<?php echo base_url();?>assets/images/WA.png" class="img-fluid" alt="" style="margin-right: -3px;" width="17"></i>Chat</a></p></li></ul></div></div>');

                  $('#mentor_show').append('<div class="col-xl-12 col-lg-12 col-md-12"><div class="box_grid wow animated" style="visibility: visible;background-color: #3f3f3f;"><table width="100%" border="0"><tbody><tr><td width="25%" style="padding: 3%;"><i style="margin-left: 8%;"><img src="<?php echo base_url();?>assets/images/822762_user_512x512.png" class="img-fluid" alt="" style="margin-right: -3px;width: 100%;" width="17"></i></td><td width="75%"><div class="wrapper"><h5 style="color: #ffffff;font-size: 1.5rem;margin-bottom: unset;">'+ element.nama +'</h5><p style="color: #ffffff;margin-bottom: unset;">' + element.deskripsi + '</p><p style="color: #ffffff;margin-bottom: unset;font-size: 19px;">' + element.perusahaan + '</p></div></td></tr></tbody></table><ul><li style="color: #ffffff;"><li style="color: #ffffff;"><i class="icon-thumbs-up-alt"></i>890</li><li style="color: #ffffff;"><i class="icon-briefcase"></i>10 Tahun</li><li><a style="background: #01dd96;border: 2px solid #01dd96;color: #ffffff;border-radius: .25rem !important;padding: 8px;" href="https://api.whatsapp.com/send?phone=62' + element.no_hp + '&text=Hello Kak '+ element.nama +'">Chat</a></li></li></ul></div></div>');

                });

              

          },

          error: function (jqXHR, textStatus, errorThrown){

              alert('terjadi kesalahan, coba beberapa saat lagi');

          }

      });

  });



  function mendaftar(id_materi){ 

        $.ajax({

            url : "<?php echo site_url('index.php/Kursus/save_mendaftar_edit')?>/"+id_materi,

            type: "GET",

            contentType: false,

            processData: false,

            dataType: "JSON",

            success: function(data)

            {   

                if (data.status == true) {

                     location.replace("<?php echo base_url();?>index.php/Belajar/detail/"+id_matapelajaran)

                     // location.reload();

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

<main style="background-color: #000000;">

  <section class="hero_single version_2">

  </section>

  <div class="container margin_30_95" style="padding-top: 75px;">
	  
	  <div class="row">
	    
	    <div class="col-xs-12 col-md-6 col-md-6" style="text-align: center;">
	    
	    	<div  style="background-color: white;text-align: center;padding: 40px;padding-top: 68px;padding-bottom: 68px;">

	    		<h4 style="font-size: 2rem;"><b>Chat mentor kamu</b></h4>
	    		
	    		<h5 style="font-size: 1rem;">untuk konsultasi pelajaran apa yang<br> kamu senangi</h5>

            	<img style="width: 71%;margin-top: 7%;" src="<?php echo base_url();?>assets/images/chat_mentor_bgputih.png">

            	<h5 style="font-size: 1rem;margin-top: 7%;">anda akan segera terhubung langsung melalui<br> aplikasi whatsapp</h5>

            	<div style="margin-top: 12%;text-align: initial;margin-left: 8%;">
            		
            		<h5>
            			
            			<b>Kami Pastikan</b>

            		</h5>

            		<div style="margin-top: 7%;">

            			<table width="100%" border="0">
            				
            				<tbody>
            				
            					<tr>
            				
            						<td width="20%" valign="top">
            							
            							<img style="width: 59%;" src="<?php echo base_url();?>assets/images/icon1.png">

            						</td>
            				
            						<td width="80%" valign="top">
            							
            							<h5 style="font-size: 0.9rem;margin-bottom: 5%;">Chat dengan mentor berpengalaman<br>dan tersertifikasi dengan beragam<br>pilihan profesi dan keahlian di seluruh<br>Indonesia.</h5>

            						</td>
            				
            					</tr>
            				
            					<tr>
            				
            						<td width="20%" valign="top">
            							
            							<img style="width: 59%;" src="<?php echo base_url();?>assets/images/icon2.png">

            						</td>
            				
            						<td width="80%" valign="top">
            							
            							<h5 style="font-size: 0.9rem;margin-bottom: 5%;">Mendapatkan penjelasan dan saran<br>serta tips & trik yang terbaik dari<br>sumber profesional.</h5>

            						</td>
            				
            					</tr>
            				
            					<tr>
            				
            						<td width="20%" valign="top">
            							
            							<img style="width: 59%;" src="<?php echo base_url();?>assets/images/icon3.png">

            						</td>
            				
            						<td width="80%" valign="top">
            							
            							<h5 style="font-size: 0.9rem;margin-bottom: 5%;">Bimbingan sesuai dengan skill<br>yang kamu senangi.</h5>

            						</td>
            				
            					</tr>
            				
            				</tbody>
            			
            			</table>

            		</div>

            	</div>
	    	
	    	</div>
	    
	    </div>
	    
	    <div class="col-xs-12 col-md-6 col-md-6">

	    	<div class="col-xl-12 col-lg-12 col-md-12" style="padding: 5%;padding-top: 3%;padding-right: 0%;">
	    		
	    		<form method="POST" action="#0">
	                
	                <span class="input-group">
	                
	                    <input style="width: 291px;" data-purpose="search-input" name="matapelajaran" maxlength="200" placeholder="Apa yang ingin kamu pelajari. . ." autocomplete="off" id="header-search-field" class="form-control" value="">
	                
	                    <span class="input-group-btn" style="background: #fff;">
	                
	                        <button aria-label="Search for anything" type="submit" class="btn btn-link">
	                
	                            <span style="color: #000000;" class="icon-search"></span>
	                
	                        </button>
	                
	                    </span>
	                
	                </span>
	            
	            </form>

	    	</div>

	    	<hr style="margin-left: 5%;margin-top: unset;margin-bottom: 5%;">

            <div class="col-xl-12 col-lg-12 col-md-12" style="height: 865px;overflow-y: auto;" id="mentor_show">

            <!-- <div class="col-xl-12 col-lg-12 col-md-12"> -->

		    	<!-- <div class="col-xl-12 col-lg-12 col-md-12">

		    		<div class="box_grid wow animated" style="visibility: visible;background-color: #3f3f3f;">

		    			<table width="100%" border="0">
		    				
		    				<tbody>
		    					
		    					<tr>
		    						
		    						<td width="25%" style="padding: 3%;">
		    							
		    							<i style="margin-left: 8%;">

		    								<img src="<?php echo base_url();?>assets/images/822762_user_512x512.png" class="img-fluid" alt="" style="margin-right: -3px;width: 100%;" width="17">

		    							</i>

		    						</td>

		    						<td width="75%">
		    							
		    							<div class="wrapper">

						    				<h5 style="color: #ffffff;font-size: 1.5rem;margin-bottom: unset;">Chandra Kirana</h5>

						    				<p style="color: #ffffff;margin-bottom: unset;">Interior Design</p>

						    				<p style="color: #ffffff;margin-bottom: unset;font-size: 19px;">PT. Holomoc</p>

						    			</div>

		    						</td>

		    					</tr>

		    				</tbody>

		    			</table>

		    			<ul>

		    				<li style="color: #ffffff;">

		    					<li style="color: #ffffff;">

		    						<i class="icon-thumbs-up-alt"></i> 

		    						890

		    					</li>

		    					<li style="color: #ffffff;">

		    						<i class="icon-briefcase"></i> 
		    					
		    						10 Tahun

		    					</li>

		    					<li>

		    						<a style="background: #01dd96;border: 2px solid #01dd96;color: #ffffff;border-radius: .25rem !important;padding: 8px;" href="https://api.whatsapp.com/send?phone=62' + element.no_hp + '&text=Hello Kak '+ element.nama +'">

		    							Chat

		    						</a>


		    					</li>
		    				
		    				</li>

		    			</ul>

		    		</div>

		    	</div> -->

            </div>

	    </div>
	  
	  </div>

      <!-- /row -->

  </div>

  <div class="container margin_30_95" style="text-align: center;">

      <p style="margin-bottom: 3px;font-size: 124%;color: #ffffff;">Menghubungkan siswa di seluruh indonesia dengan instruktur terbaik,</p>
      <p style="margin-bottom: 3px;font-size: 124%;color: #ffffff;">Edumedia.id membantu individu mencapai tujuan mereka dan mengejar impian mereka.</p>

  </div>

  <!-- /container -->

  <!-- <div class="container margin_30_95">

      <div class="main_title_2">

          <span><em></em></span>

          <h2>Ayoo Belajar</h2>

          <p>Pilih sesuai keinginan anda..!</p>

      </div>

  <div class="container margin_60_35">

      <div class="row" id="matapelajaran_all">



      </div>

      <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>

  </div> -->



</main>

<!-- /main -->