
<style>
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation */
  .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 67px;
    right: 7px;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }

  div .btn_mobile {
    display: none !important;
  }

  @media screen and (max-width: 600px) {
	  #mobile_show_yow {
	    display: inherit !important;
	    clear: both;
	    display: inherit 
	  }
    #mobile_show_yow_1 {
      display: inherit !important;
      clear: both;
      display: inherit 
    }
	}
</style>
<script type="text/javascript">

  $(document).ready(function() {

      $.ajax({

          url : "<?php echo site_url('index.php/Kategori/get_parent_kategori')?>",

          type: "GET",

          dataType: "JSON",

          success: function(response){



              response.forEach(function(element) {

                  // $('#product_tampil').append('<div class="col-md-4 col-sm-4 col-xs-12"><div class="product-item"><div class="product-img"><a href="single-product.html"><img src="<?php echo base_url();?>assets/template/img/product/12.jpg" alt=""/></a></div><div class="product-info"><h6 class="product-title"><a href="single-product.html">Product Name</a></h6><div class="pro-rating"><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star"></i></a><a href="#"><i class="zmdi zmdi-star-half"></i></a><a href="#"><i class="zmdi zmdi-star-outline"></i></a></div><h3 class="pro-price">$ 869.00</h3><ul class="action-button"><li><a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a></li><li><a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a></li><li><a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a></li><li><a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a></li></ul></div></div></div>');

                  // $('#kategori_show_home').append('<div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;"><a href="<?php echo base_url();?>index.php/Kategori/get_sub_kategori/'+element.id_kategori+'" class="grid_item"><figure class="block-reveal" style="height: 100% !important;"><div class="block-horizzontal" style="animation: none;background: none;"></div><img src="<?php echo base_url();?>'+ element.background +'" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;"><div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;"><p style="color: #ffffff;">'+ element.nama_kategori +'</p></div></figure></a></div>');

                  $('#kategori_show_home').append('<div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;"><a href="<?php echo base_url();?>index.php/Kategori/get_sub_kategori/'+element.id_kategori+'" class="grid_item"><figure class="block-reveal" style="height: 100% !important;"><div class="block-horizzontal" style="animation: none;background: none;"></div><img src="http://admin.edumedia.id/'+ element.background +'" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;"><div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;"><p style="color: #ffffff;"><b>'+ element.nama_kategori +'</b></p></div></figure></a></div>');

                  // $('#kategori_show_mobile').append('<li style="width: 100%;"><span><a href="#0" style="font-size: small;color: #6f6c6c;">'+ element.nama_kategori +'</a></span></li>');

              });



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



  function mendaftar(id_matapelajaran){

        // alert(id_matapelajaran);

          // var form = document.getElementById("form_mendaftar");

          // var fd = new FormData(form);

        // var id_matapelajaran=document.getElementById("id_matapelajaran").value;  

        $.ajax({

            url : "<?php echo site_url('index.php/Kursus/save_mendaftar_edit')?>/"+id_matapelajaran,

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

<main style="background-color: #0b0015;padding-top: 5%;">

  <!-- <section class="hero_single version_2" style="background: url(<?php echo base_url();?>assets/images/Asset-01-2.jpg) center center no-repeat fixed;">      

  </section> -->
  
  <div class="container margin_30_95" style="padding-top: unset;margin-top: unset;padding-right: unset;padding-left: unset;">

      <div class="main_title_2 btn_mobile" id="mobile_show_yow" style="margin-bottom: -1px;padding-right: 6px;padding-left: 6px;margin-top: 6.5%;">

        <section id="hero_in" class="courses container" style="margin-right: 13%;padding-right: unset;padding-left: unset;">

          <div class="wrapper col-xl-12 col-lg-12 col-md-12" style="padding-right: unset;padding-left: unset;background-color: #0b0015;">
              
            <img class=" col-xl-12 col-lg-12 col-md-12" style="width: 100%;position: absolute;height: 95%;object-fit: cover;padding-right: unset;padding-left: unset;" src="<?php echo base_url();?>assets/images/edumedia chat mentor.jpg">

            <!-- <div class="" style="text-align: initial;padding-right: 10%;padding-left: 10%;padding-top: 4%;">-->
            <div class="" style="text-align: initial;margin-top: 20%; margin-left: 30%; ">

              <div class="" style="">

                <a style="margin-top: 51%;position: relative;border-radius: 1.25rem !important;background-color: #f14068;border: 1px solid white;border-color: #f14068;color: #ffffff;font-size: 0.8rem;text-transform: capitalize;padding: 11px 24px;letter-spacing: initial;margin-left: 7%;" href="http://edumedia.id/index.php/Chat_mentor" class="btn_1 rounded">Chat Mentor</a>

              </div>

            </div>

          </div>

        </section>

      </div>

      <div class="main_title_2 hidden_tablet" style="margin-bottom: 15px;padding-right: 6px;padding-left: 6px;">

        <section id="hero_in" class="courses container" style="margin-right: 13%;padding-right: unset;padding-left: unset;height: 542px;">

          <div class="wrapper col-xl-12 col-lg-12 col-md-12" style="padding-right: unset;padding-left: unset;background-color: #0b0015;">
            <!-- <a href="http://edumedia.id/index.php/Chat_mentor"> -->
              <img class=" col-xl-12 col-lg-12 col-md-12" style="width: 100%;position: absolute;height: 100%;object-fit: fill;padding-right: unset;padding-left: unset;" src="<?php echo base_url();?>assets/images/edumedia chat mentor.jpg">
            <!-- </a> -->

            <div class="" style="text-align: left;margin-top: 27%; margin-left: 32%;">

              <div class="" style="padding-left: 18%;">

                <a style="margin-top: 3%;position: relative;border-radius: 1.25rem !important;background-color: #f14068;border: 1px solid white;border-color: #f14068;color: #ffffff;font-size: 0.8rem;text-transform: capitalize;padding: 11px 41px;letter-spacing: initial;" href="http://edumedia.id/index.php/Chat_mentor" class="btn_1 rounded">Chat Mentor</a>

              </div>

            </div>

          </div>

        </section>

      </div>

      <div class="row" id="kategori_show_home" style="padding-right: 15px;padding-left: 15px;">

          

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

<!-- The Modal -->

<div id="myModal" class="modal">

  <!-- <span class="close">&times;</span> -->

  <a href="https://api.whatsapp.com/send?phone=6281285232001&text=Hello... apakah maskernya masih tersedia...?">
    
    <img class="modal-content" id="img01" src="<?php echo base_url();?>assets/images/iklan1.jpeg">

  </a>


  <span class="close">&times;</span>

</div>


<script type="text/javascript">

  // $(document).ready(function() {

  //   // Get the modal
  //   var modal = document.getElementById("myModal");

  //   // Get the image and insert it inside the modal - use its "alt" text as a caption
  //   var img = document.getElementById("myImg");
    

  //   modal.style.display = "block";

  //   // Get the <span> element that closes the modal
  //   var span = document.getElementsByClassName("close")[0];

  //   // When the user clicks on <span> (x), close the modal
  //   span.onclick = function() { 

  //     modal.style.display = "none";
    
  //   }

  // });

</script>