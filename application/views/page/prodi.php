<script type="text/javascript">

  $(document).ready(function() {

      // $.ajax({

      //     url : "<?php echo site_url('index.php/Universitas/get_universitas_aktif_all')?>",

      //     type: "GET",

      //     dataType: "JSON",

      //     success: function(response){



      //         response.forEach(function(element) {

      //             $('#universitas_show_home').append('<div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;"><a href="<?php echo base_url();?>index.php/Kategori/get_sub_kategori/'+element.id_kategori+'" class="grid_item"><figure class="block-reveal" style="height: 100% !important;"><div class="block-horizzontal" style="animation: none;background: none;"></div><img src="http://admin.edumedia.id/'+ element.background +'" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;"><div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;"><p style="color: #ffffff;"><b>'+ element.nama_kategori +'</b></p></div></figure></a></div>');

      //         });



      //     },

      //     error: function (jqXHR, textStatus, errorThrown){

      //         alert('terjadi kesalahan, coba beberapa saat lagi');

      //     }

      // });

  });



  function mendaftar(id_matapelajaran){

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

<main style="background-color: #0b0015;">

  <section class="hero_single version_2">

  </section>

  <div class="container margin_30_95" style="padding-top: 75px;">

      <div class="main_title_2">

      </div>

      <div class="row" id="universitas_show_home">

        <div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;">

          <a href="<?php echo base_url();?>index.php/Materi/get_materi_by_prodi/1" class="grid_item">

            <figure class="block-reveal" style="height: 100% !important;">

              <div class="block-horizzontal" style="animation: none;background: none;"></div>

              <img src="http://admin.edumedia.id/assets/images/card_universitas/PRODI_TEKNOLOGI_PERSENJATAAN.png" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;">

              <!-- <div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;">

                <p style="color: #ffffff;">

                  <b>FAKULTAS TEKNOLOGI PERTAHANAN</b>

                </p>

              </div> -->
            
            </figure>

          </a>

        </div>

        <!-- BATAS -->

        <div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;">

          <a href="#0" class="grid_item">

            <figure class="block-reveal" style="height: 100% !important;">

              <div class="block-horizzontal" style="animation: none;background: none;"></div>

              <img src="http://admin.edumedia.id/assets/images/card_universitas/PRODI_INDUSTRI_PERTAHANAN.png" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;">

              <!-- <div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;">

                <p style="color: #ffffff;">

                  <b>FAKULTAS KEMANAN NASIONAL</b>

                </p>

              </div> -->
            
            </figure>

          </a>

        </div>

        <!-- BATAS -->

        <div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;">

          <a href="#0" class="grid_item">

            <figure class="block-reveal" style="height: 100% !important;">

              <div class="block-horizzontal" style="animation: none;background: none;"></div>

              <img src="http://admin.edumedia.id/assets/images/card_universitas/PRODI_TEKNOLOGI_DAYA_GERAK.png" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;">

              <!-- <div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;">

                <p style="color: #ffffff;">

                  <b>FAKULTAS STRATEGI PERTAHANAN</b>

                </p>

              </div> -->
            
            </figure>

          </a>

        </div>

        <!-- BATAS -->

        <div class="col-lg-4 col-md-2" data-wow-offset="150" style="width: 50%;padding-right: 5px; padding-left: 5px;">

          <a href="#0" class="grid_item">

            <figure class="block-reveal" style="height: 100% !important;">

              <div class="block-horizzontal" style="animation: none;background: none;"></div>

              <img src="http://admin.edumedia.id/assets/images/card_universitas/PRODI_TEKNOLOGI_PENGINDERAAN.png" class="img-fluid" alt="" style="animation: color 0.5s ease-in-out;animation-fill-mode: forwards;width: 100%;">

              <!-- <div class="info" style="padding: 0px 0px 3px 6px;animation: color 0.7s ease-in-out; animation-delay: 0.7s;-webkit-animation-delay: 0.7s;-moz-animation-delay: 0.7s;opacity: 0;animation-fill-mode: forwards;-webkit-animation-fill-mode: forwards;background: #6a25b3;">

                <p style="color: #ffffff;">

                  <b>FAKULTAS MANAJEMEN PERTAHANAN</b>

                </p>

              </div> -->
            
            </figure>

          </a>

        </div>

        <!-- BATAS -->

      </div>

  </div>

  <div class="container margin_30_95" style="text-align: center;">

      <p style="margin-bottom: 3px;font-size: 124%;color: #ffffff;">Menghubungkan siswa di seluruh indonesia dengan instruktur terbaik,</p>
      <p style="margin-bottom: 3px;font-size: 124%;color: #ffffff;">Edumedia.id membantu individu mencapai tujuan mereka dan mengejar impian mereka.</p>

  </div>

</main>