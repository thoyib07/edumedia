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

                  // $('#kategori_show_home').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;background-color: #282828;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'"><img src="http://admin.edumedia.id/assets/images/card_materi/Tutorial OneNote 2016_20200129160834.png" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small style="color: #ffffff;font-size: 113%;">'+ element.no_hp_show +'</small><h3 style="color: #ffffff;">'+ element.nama +'</h3></div><ul><li style="color: #ffffff;"><li></li><li><a style="background: #01e675;color: #ffffff;" href="https://api.whatsapp.com/send?phone=62' + element.no_hp + '&text=Hello Kak '+ element.nama +'"><i style="margin-right: 3%;margin-left: -3%;"><img src="<?php echo base_url();?>assets/images/WA.png" class="img-fluid" alt="" style="margin-right: -3px;" width="17"></i>Chat by whatsapp</a></p></li></ul></div></div>');

                });

              

          },

          error: function (jqXHR, textStatus, errorThrown){

              alert('terjadi kesalahan, coba beberapa saat lagi');

          }

      });

  });

</script>

<main style="background-color: #000000;">

  <!-- <section class="hero_single version_2" style="background: url(<?php echo base_url();?>assets/images/Asset-01-2.jpg) center center no-repeat fixed;">

      

  </section> -->

  <section class="hero_single version_2">

      <!-- <img style="width: 100%;" src="<?php echo base_url();?>assets/images/virtual reality.png"> -->

  </section>

  <!-- /hero_single -->



  <div class="container margin_30_95" style="padding-top: 75px;">

      <div class="main_title_2">

          <!-- <span><em></em></span> -->

          <!-- <h2 style="margin: 15px 0px 25px 0;color: #04a4c2;">Kategori <strong style="color: #7333b8;">Kursus</strong></h2> -->

          <!-- <p>Pilih sesuai passion anda..!</p> -->

      </div>

      <div class="row" id="kategori_show_home">

          <div class="col-xl-4 col-lg-6 col-md-6">
            
            <div class="box_grid wow animated" style="visibility: visible;background-color: #282828;">
              
              <figure class="block-reveal">
                
                <div class="block-horizzontal"></div>
                
                <a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'">
                  
                  <img src="http://edumedia.id/assets/images/digital_marketing.jpg" class="img-fluid" alt="">
                
                </a>
                
                <div class="preview">
                  
                  <span>Lihat program</span>
                
                </div>
              
              </figure>
              
              <div class="wrapper">
              
                <small style="color: #ffffff;">Nama Mentor</small>
              
                <h3 style="color: #ffffff;">Digital Marketing 101</h3>
              
                <p style="color: #ffffff;height: 197px;">
              
                  Modul ini akan memberikan Anda gambaran bagaimana Digtial Marketing bekerja dan juga terminologi yang perlu Anda ketahui dalam dunia Digital Marketing.
              
                </p>
                
                <a style="color: #ffffff;">
              
                  25 feb 2020 s/d 28 feb 2020

                </a>

              </div>
              
              <ul>
              
                <li style="color: #ffffff;">

                    <i class="icon_clock_alt"></i> 19.20 – 22.00

                </li>
              
                <li></li>
              
                <li>
              
                  <a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p>
              
                </li>
              
              </ul>
            
            </div>
          
          </div>

          <!-- BATAS DISINI -->

          <div class="col-xl-4 col-lg-6 col-md-6">
            
            <div class="box_grid wow animated" style="visibility: visible;background-color: #282828;">
              
              <figure class="block-reveal">
                
                <div class="block-horizzontal"></div>
                
                <a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'">
                  
                  <img src="http://edumedia.id/assets/images/oscial_media.jpg" class="img-fluid" alt="">
                
                </a>
                
                <div class="preview">
                  
                  <span>Lihat program</span>
                
                </div>
              
              </figure>
              
              <div class="wrapper">
              
                <small style="color: #ffffff;">Nama Mentor</small>
              
                <h3 style="color: #ffffff;">Social Media 101</h3>
              
                <p style="color: #ffffff;height: 197px;">
              
                  Pada modul ini, Anda akan mengetahui platform Social Media apa saja yang dapat digunakan untuk kegiatan Digital Marketing. Anda akan belajar setiap karakteristik dari platform tersebut, bagaimana menciptakan Social Media calendar, dan masih banyak lagi.
              
                </p>
                
                <a style="color: #ffffff;">
              
                  25 feb 2020 s/d 28 feb 2020

                </a>

              </div>
              
              <ul>
              
                <li style="color: #ffffff;">

                    <i class="icon_clock_alt"></i> 19.20 – 22.00

                </li>
              
                <li></li>
              
                <li>
              
                  <a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p>
              
                </li>
              
              </ul>
            
            </div>
          
          </div>

          <!-- BATAS DISINI -->

          <div class="col-xl-4 col-lg-6 col-md-6">
            
            <div class="box_grid wow animated" style="visibility: visible;background-color: #282828;">
              
              <figure class="block-reveal">
                
                <div class="block-horizzontal"></div>
                
                <a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'">
                  
                  <img src="http://edumedia.id/assets/images/storyteling.jpg" class="img-fluid" alt="">
                
                </a>
                
                <div class="preview">
                  
                  <span>Lihat program</span>
                
                </div>
              
              </figure>
              
              <div class="wrapper">
              
                <small style="color: #ffffff;">Nama Mentor</small>
              
                <h3 style="color: #ffffff;">Storytelling & Persuasion Marketing</h3>
              
                <p style="color: #ffffff;height: 173px;">
              
                  Pada modul ini Anda akan belajar bagaimana menciptakan storytelling yang baik , konten marketing dan native ads, belajar untuk memiliki pemikiran yang kreatif ketika Anda menciptakan sebuah konten marketing, belajar tentang Social Media campaign dan menciptakan digital ...
              
                </p>
                
                <a style="color: #ffffff;">
              
                  25 feb 2020 s/d 28 feb 2020

                </a>

              </div>
              
              <ul>
              
                <li style="color: #ffffff;">

                    <i class="icon_clock_alt"></i> 19.20 – 22.00

                </li>
              
                <li></li>
              
                <li>
              
                  <a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p>
              
                </li>
              
              </ul>
            
            </div>
          
          </div>

          <!-- BATAS DISINI -->

          <div class="col-xl-4 col-lg-6 col-md-6">
            
            <div class="box_grid wow animated" style="visibility: visible;background-color: #282828;">
              
              <figure class="block-reveal">
                
                <div class="block-horizzontal"></div>
                
                <a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'">
                  
                  <img src="http://edumedia.id/assets/images/seo.jpg" class="img-fluid" alt="">
                
                </a>
                
                <div class="preview">
                  
                  <span>Lihat program</span>
                
                </div>
              
              </figure>
              
              <div class="wrapper">
              
                <small style="color: #ffffff;">Nama Mentor</small>
              
                <h3 style="color: #ffffff;">SEO & Website Optimization</h3>
              
                <p style="color: #ffffff;height: 197px;">
              
                  Anda akan belajar tentang Search Engine Optimization atau lebih dikenal dengan istilah SEO, belajar menciptakan strategi SEO, menemukan keyword yang tepat untuk bisnis Anda, dan juga belajar tentang bagaimana mengoptimisasi website Anda.
              
                </p>
                
                <a style="color: #ffffff;">
              
                  25 feb 2020 s/d 28 feb 2020

                </a>

              </div>
              
              <ul>
              
                <li style="color: #ffffff;">

                    <i class="icon_clock_alt"></i> 19.20 – 22.00

                </li>
              
                <li></li>
              
                <li>
              
                  <a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p>
              
                </li>
              
              </ul>
            
            </div>
          
          </div>

          <!-- BATAS DISINI -->

          <div class="col-xl-4 col-lg-6 col-md-6">
            
            <div class="box_grid wow animated" style="visibility: visible;background-color: #282828;">
              
              <figure class="block-reveal">
                
                <div class="block-horizzontal"></div>
                
                <a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_mentor +'">
                  
                  <img src="http://edumedia.id/assets/images/gg.jpg" class="img-fluid" alt="">
                
                </a>
                
                <div class="preview">
                  
                  <span>Lihat program</span>
                
                </div>
              
              </figure>
              
              <div class="wrapper">
              
                <small style="color: #ffffff;">Nama Mentor</small>
              
                <h3 style="color: #ffffff;">Google Ads & Social Ads</h3>
              
                <p style="color: #ffffff;height: 197px;">
              
                  Anda akan belajar menciptakan Google Ads (SEM dan GDN) campaign, mengelola Social Media campaign untuk Facebook, Instagram , Twitter dan Youtube, menciptakan dan mendistribusikan UTM (Unified Tag Machine) dan bagaimana menggunakan Social Media influencer juga mengukur keberhasilannya.
              
                </p>
                
                <a style="color: #ffffff;">
              
                  25 feb 2020 s/d 28 feb 2020

                </a>

              </div>
              
              <ul>
              
                <li style="color: #ffffff;">

                    <i class="icon_clock_alt"></i> 19.20 – 22.00

                </li>
              
                <li></li>
              
                <li>
              
                  <a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p>
              
                </li>
              
              </ul>
            
            </div>
          
          </div>

          <!-- BATAS DISINI -->

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