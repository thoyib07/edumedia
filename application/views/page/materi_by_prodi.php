<script type="text/javascript">

  $(document).ready(function() {

      var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

      var pathArray = window.location.pathname.split( '/' );

      var id_prodi = pathArray[4];

      $.ajax({

          url : "<?php echo site_url('index.php/Materi/get_materi_by_id_prodi')?>/"+id_prodi,

          type: "GET",

          dataType: "JSON",

          success: function(response){

              if (response.id_user) {

                  response.data_materi.forEach(function(element) {

                    if (element.status_kursus == '0') {

                        $('#kategori_show_home').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;background-color: #282828;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_materi +'"><img src="http://admin.edumedia.id/'+ element.background +'" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small style="color: #ffffff;">'+ element.nama +'</small><h3 style="color: #ffffff;">'+ element.materi +'</h3></div><ul><li style="color: #ffffff;"><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li></li><li><a style="background: #662d91;color: #ffffff;" href=""  onclick="mendaftar('+ element.id_materi +')">Ambil</a></p></li></ul></div></div>');

                    }else{

                        $('#kategori_show_home').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;background-color: #282828;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_materi +'"><img src="http://admin.edumedia.id/'+ element.background +'" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small style="color: #ffffff;">'+ element.nama +'</small><h3 style="color: #ffffff;">'+ element.materi +'</h3></div><ul><li style="color: #ffffff;"><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li></li><li><a style="background: #662d91;color: #ffffff;" href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_materi +'">Kursus saya</a></p></li></ul></div></div>');

                    };

                  });

              }else{

                  response.data_materi.forEach(function(element) {

                      $('#kategori_show_home').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;background-color: #282828;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_materi +'"><img src="http://admin.edumedia.id/'+ element.background +'" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small style="color: #ffffff;">'+ element.nama +'</small><h3 style="color: #ffffff;">'+ element.materi +'</h3></div><ul><li style="color: #ffffff;"><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li></li><li><a style="background: #662d91;color: #ffffff;" href="<?php echo base_url();?>index.php/Login">Mendaftar</a></p></li></ul></div></div>');

                  });

              };

          },

          error: function (jqXHR, textStatus, errorThrown){

              alert('terjadi kesalahan, coba beberapa saat lagi');

          }

      });



      $.ajax({

          url : "<?php echo site_url('index.php/Matapelajaran/all_aktif')?>",

          type: "GET",

          dataType: "JSON",

          success: function(response){



              response.forEach(function(element) {

                  // $('#product_tampil').append('<div class="col-md-4 col-sm-4 col-xs-12"><div class="product-item"><div class="product-img"><a href="single-product.html"><img src="<?php echo base_url();?>assets/template/img/product/12.jpg" alt=""/></a></div><div class="product-info"><h6 class="product-title"><a href="single-product.html">Product Name</a></h6><div class="pro-rating"><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star-half"></i></a><a href="#"><i class="zmdi zmdi-star-outline"></i></a></div><h3 class="pro-price">$ 869.00</h3><ul class="action-button"><li><a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a></li><li><a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a></li><li><a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a></li><li><a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a></li></ul></div></div></div>');

                  // $('#kategori_show_mobile').append('<li style="width: 100%;"><span><a href="#0" style="font-size: small;color: #6f6c6c;">'+ element.nama_kategori +'</a></span></li>');

                  if (element.status_kursus == '0') {

                    if (element.status_user == '0') {

                      $('#matapelajaran_all').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_matapelajaran +'"><img src="<?php echo base_url();?>assets/menu1/img/flex_slides/85-Matematika.jpg" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small>'+ element.nama_lengkap +'</small><h3>'+ element.matapelajaran +'</h3><p>'+ element.ringkasan +'</p><h4>'+ element.harga +'</h4></div><ul><li><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li><i class="icon_like"></i> '+ element.like +'</li><li><a href="<?php echo base_url();?>index.php/Login">Mendaftar</a></p></li></ul></div></div>');

                    }else{

                      $('#matapelajaran_all').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_matapelajaran +'"><img src="<?php echo base_url();?>assets/menu1/img/flex_slides/85-Matematika.jpg" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small>'+ element.nama_lengkap +'</small><h3>'+ element.matapelajaran +'</h3><p>'+ element.ringkasan +'</p><h4>'+ element.harga +'</h4></div><ul><li><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li><i class="icon_like"></i> '+ element.like +'</li><li><input id="id_mata_pelajaran" name="id_mata_pelajaran" type="hidden" value="'+ element.id_matapelajaran +'"><p style="margin-bottom: unset;" class="text-center" onclick="mendaftar('+ element.id_matapelajaran +')"><a class="btn_1 full-width">Ambil</a></p></li></ul></div></div>');

                    };

                  }else{

                    if (element.status_user == '0') {

                      $('#matapelajaran_all').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_matapelajaran +'"><img src="<?php echo base_url();?>assets/menu1/img/flex_slides/85-Matematika.jpg" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small>'+ element.nama_lengkap +'</small><h3>'+ element.matapelajaran +'</h3><p>'+ element.ringkasan +'</p><h4>'+ element.harga +'</h4></div><ul><li><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li><i class="icon_like"></i> '+ element.like +'</li><li><a href="<?php echo base_url();?>index.php/Login">Kursus saya</a></p></li></ul></div></div>');

                    }else{

                      $('#matapelajaran_all').append('<div class="col-xl-4 col-lg-6 col-md-6"><div class="box_grid wow animated" style="visibility: visible;"><figure class="block-reveal"><div class="  block-horizzontal"></div><a href="<?php echo base_url();?>index.php/Kursus_detail/view_detail/'+ element.id_matapelajaran +'"><img src="<?php echo base_url();?>assets/menu1/img/flex_slides/85-Matematika.jpg" class="img-fluid" alt=""></a><div class="preview"><span>Lihat Kursus</span></div></figure><div class="wrapper"><small>'+ element.nama_lengkap +'</small><h3>'+ element.matapelajaran +'</h3><p>'+ element.ringkasan +'</p><h4>'+ element.harga +'</h4></div><ul><li><i class="icon_clock_alt"></i> '+ element.durasi +'</li><li><i class="icon_like"></i> '+ element.like +'</li><li><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_matapelajaran +'"">Kursus saya</a></li></ul></div></div>');

                    };

                  };

              });



          },

          error: function (jqXHR, textStatus, errorThrown){

              alert('terjadi kesalahan, coba beberapa saat lagi');

          }

      });

  });



  function mendaftar(id_prodi){ 

        $.ajax({

            url : "<?php echo site_url('index.php/Kursus/save_mendaftar_edit')?>/"+id_prodi,

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