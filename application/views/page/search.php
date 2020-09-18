<style type="text/css">

  .margin_30_95 {
    padding-top: 135px;
    padding-bottom: 35px;
  }

  @media (max-width: 575px) {
    .margin_30_95 {
      padding-top: 60px;
      padding-bottom: 5px;
    }
  }

</style>

<script type="text/javascript">

  $(document).ready(function() {
      var like_matapelajara = '<?php echo $like_matapelajaran;?>';
      // alert(like_matapelajara);

      $.ajax({

          url : "<?php echo site_url('index.php/Matapelajaran/by_matapelajaran')?>/"+like_matapelajara,

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

<main>

  <!-- /container -->

  <div class="container margin_30_95">

      <div class="main_title_2">

          <span><em></em></span>

          <h2>Ayoo Belajar</h2>

          <p>Pilih sesuai keinginan anda..!</p>
          <input type="hidden" id="like_matapelajara" name="like_matapelajara" value="<?php echo $like_matapelajaran;?>">

      </div>

  <div class="container margin_60_35">

      <div class="row" id="matapelajaran_all">



      </div>

      <!-- /row -->

      <!-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> -->

  </div>



</main>

<!-- /main -->