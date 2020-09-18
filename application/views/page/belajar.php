<main>

  <script type="text/javascript">

    var id_mata_pelajaran;

    var id_sub_materi = null;

    var id_sub_materi_ser;

    $(document).ready(function() {

          var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;

          var pathArray = window.location.pathname.split( '/' );

          var id_mata_pelajaran = pathArray[4];

          // id_sub_materi = pathArray[5];

          // document.getElementById("id_mata_pelajaran").value=id_materi;

          // alert(id_mata_pelajaran);

          console.log(id_mata_pelajaran);



        $.ajax({

            url : "<?php echo site_url('index.php/Belajar/get_materi_by_mata_pelajaran')?>/"+id_mata_pelajaran,

            type: "GET",

            dataType: "JSON",

            success: function(response){

                var id_materi_aktif;

                $('#nama_mata_pelajaran').html(response.mata_pelajaran.nama_mata_pelajaran);

                response.pelajaran.forEach(function(element) {

                  if (element.status == '0') {

                    $('#list_pelajaran').append('<tr><td valign="top" width="7%"><i class="icon-videocam"></i></td valign="top"><td width="90%">'+ element.nama_materi +'</td><td valign="top" width="5%"></td></tr>');

                  }else if (element.status == '1'){

                    $('#list_pelajaran').append('<tr><td valign="top" width="7%"><i style="color: #ff5419;" class="icon-spin3"></i></td valign="top"><td width="90%">'+ element.nama_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_materi +'/'+ element.id_sub_materi +'"></a></span></td></tr>');

                    $('#nama_materi_pelajaran').html(element.nama_materi);

                    id_materi_aktif = element.id_materi;

                  }else{    

                    $('#list_pelajaran').append('<tr><td valign="top" width="7%"><i style="color: #72cc3c;" class="icon-ok-circled"></i></td valign="top"><td width="90%">'+ element.nama_materi +'</td><td valign="top" width="5%"><span><a href="<?php echo base_url();?>index.php/Belajar/detail/'+ element.id_materi +'/'+ element.id_sub_materi +'"></a></span></td></tr>');

                  };

                });

                // alert(id_materi_aktif);

                $.ajax({

                    url : "<?php echo site_url('index.php/Materi/get_materi_by_id_materi')?>/"+id_materi_aktif,

                    type: "GET",

                    dataType: "JSON",

                    success: function(response_materi){


                      $('#video').html('<figure style="height: 507px;"><iframe src='+response_materi.data.path_video+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>');

                      // $('#description').html('<embed src="http://admin.atlantisplus.sch.id/'+response_materi.data.path_pdf+'" width= "350" height= "300">');

                      $('#description').html('<iframe style="height: 600px;" src="http://admin.atlantisplus.sch.id/'+response_materi.data.path_pdf+'" width="auto" height="auto"> </iframe>');

                    },

                    error: function (jqXHR, textStatus, errorThrown){

                        alert('terjadi kesalahan, coba beberapa saat lagi');

                    }

                });

                // $('#button_kuis').append('<a style="background: #662d91;width: 80%;margin-left: 9%;margin-bottom: 6%;margin-top: 6%;" href="<?php echo base_url();?>index.php/Kuis/get_kuis/'+ id_materi_aktif +'" class="btn_1 full-width">Kuis</a>');

                $('#button_kuis').append('<a onclick="quis('+id_materi_aktif+')" style="color: #fff;background: #662d91;width: 80%;margin-left: 9%;margin-bottom: 6%;margin-top: 6%;" class="btn_1 full-width">Kuis</a>');


            },

            error: function (jqXHR, textStatus, errorThrown){

                alert('terjadi kesalahan, coba beberapa saat lagi');

            }

        });

      });

    function quis(id_materi_aktif){

      $.ajax({
          url : "<?php echo site_url('index.php/materi/get_jam_pulang_belajar')?>/" + id_materi_aktif,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {

            if (data.status == true) {

              // window.location.href = "http://localhost/spero.id/EDUMEDIA/lms_v5/index.php/Kuis/get_kuis/"+id_materi_aktif;

              window.location.href = "http://lms.atlantisplus.sch.id/index.php/Kuis/get_kuis/"+id_materi_aktif;

            }else{

              swal({

                  type: 'warning',

                  title: '',

                  text: data.pesan,

                  footer: '<a href>Why do I have this issue?</a>',

              });

            };
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              swal("Transaksi gagal", "Membatalkan transaksi", "error");
          }
      });

    }

  </script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <div class="">

    <div style="background-color: #37386f;">

      <div class="container margin_60_35" style="padding-top: 82px;max-width: 1398px;">

        <div class="row">

          <div class="col-lg-8">

            <!-- /top-wizard -->

            <form name="form_mendaftar" id="form_mendaftar" >

              <input id="id_mata_pelajaran" name="id_mata_pelajaran" type="hidden">

            </form>

            <h2 style="color: #ffffff;" id="nama_mata_pelajaran"> </h2>

            <p style="color: #ffffff;" id="nama_materi_pelajaran"></p>

            <section id="video">

            </section>

            <hr style="margin: 17px 0 17px 0;border-top: 3px solid rgb(255 255 255 / 45%);">

            <h2 style="color: #ffffff;margin-bottom: 5%;margin-top: 5%;"> Pendalaman Materi</h2>

            <section id="description" style="color: #ffffff;border-bottom: unset;">

            </section>

            <!-- <a style="background: #662d91;width: 80%;margin-left: 9%;margin-bottom: 6%;margin-top: 6%;" href="<?php echo base_url();?>index.php/Kuis/get_kuis/" class="btn_1 full-width">Kuis</a> -->

          </div>        

          <aside class="col-lg-4" id="sidebar1">

            <h2 style="color: #ffffff;"> Daftar Materi</h2>

            <p style="color: #ffffff;" > Materi yang akan di bahas</p>

            <div class="card" style="background: #37386f;">

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

            <hr style="margin: 17px 0 17px 0;border-top: 3px solid rgb(255 255 255 / 45%);">

            <div class="card" style="background: transparent; ">
              <h1 style="color: white;">Diskusi Kelas</h1>
              <div id="div_chat">
                <div id="chat_area" class="chat_area" style="background: #d8d8d8; ">
                  <ul id="appendchat" class="list-unstyled">
                  </ul>
                </div><!--chat_area-->
                <div class="message_write">
                  <textarea class="form-control" id="message" placeholder="type a message"></textarea>
                  <div class="clearfix"></div>
                  <div id="divBtnSend" class="chat_bottom">
                    <span id="sendchat" class="pull-right btn btn-success" style="width: 100%;">
                      <i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim
                    </span>
                  </div>
                </div>	
                <!-- Image loader -->
                <div class="overlay"></div>
                <div class="spanner">
                  <div class="loader"></div>
                  <p>Sedang memproses data...</p>
                </div>
                <!-- Image loader -->									
              </div>
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
<script type="text/javascript">
	// Enable pusher logging - don't include this in production
	$(document).ready(function(){
    // id_kelas-id_mata_pelajaran-Tanggal-jam_mulai_pelajaran
		// let myChanel 	= '<?= '7-'.$id_mata_pelajaran.'-'.date('Y-m-d') ?>',
		let myChanel 	= '<?= $_SESSION['kelas'].'-'.$id_mata_pelajaran.'-'.date('Y-m-d') ?>',
			chatEvent		= 'chat-event';
		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};

		// var pusher = new Pusher('191dbef1780135573650');
		// var channel = pusher.subscribe('chatglobal');
		var pusher = new Pusher('00635ba2cb619e8f313e', { cluster: 'ap1' });
		var channel = pusher.subscribe(myChanel);

		// channel.bind('my_event', function(data) {
		channel.bind(chatEvent, function(data) {
			sendmessage(data);
		});

		channel.bind('appendponline', function(data) {
			appendponline(data);
		});

		function appendponline(data){
			html = '';
			html += '<li class="left clearfix">';
			html += ' <span class="chat-img pull-left">';
			html += ' <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle">';
			html += ' </span>';
			html += '<div class="chat-body clearfix">';
			html += '<div class="header_sec">';
			html += ' <strong class="primary-font">'+data.username+'</strong>';
			html += '</div>';
			html += '</div>';
			html += '</li>';
			$('#appendponline').append(html);
		}

		function sendmessage(data,autoscroll=true){
      // console.log(document.getElementById("appendchat").scrollHeight);
			var ses_id = <?php echo $this->session->userdata('id_user');?>;
			if(data.id_user == ses_id) {
				html = '';
				html += '<li class="left clearfix">'; 
				// html += ' <span class="chat-img1 pull-left">'; 
				// html += '<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" alt="User Avatar" class="img-circle">'; 
				// html += '</span>'; 
				html += '<div class="chat-body1 clearfix">'; 
				html += '<p class="font-else">'+data.message+'</p>'; 
				html += '<div class="chat_time pull-right">'+data.date+'</div>'; 
				html += '</div>'; 
				html += '</li>'; 
				$('#appendchat').append(html);
				if (autoscroll) {
					$("#chat_area").animate({ scrollTop: document.getElementById("appendchat").scrollHeight }, 1000);
				}
				$('#message').val("");
			} else {
				html = '';
				html += '<li class="left clearfix admin_chat">'; 
				// html += '<span class="chat-img1 pull-right">'; 
				// html += '<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" alt="User Avatar" class="img-circle">'; 
				// html += '</span>'; 
				html += '<div class="chat-body1 clearfix">'; 
				html += '<p class="font-me"><b>'+data.username+'</b> : '+data.message+'</p>'; 
				html += '<div class="chat_time pull-right">'+data.date+'</div>'; 
				html += '</div>'; 
				html += '</li>'; 
				$('#appendchat').append(html);
				if (autoscroll) {
					$("#chat_area").animate({ scrollTop: document.getElementById("appendchat").scrollHeight }, 1000);
				}
			}
			// $("html, body #chat_area").animate({ scrollTop: $(document).height() }, 1000);
		}

		function loadData() {
			$.ajax({
				url: "<?php echo base_url(); ?>chat/getChat/",
				type: 'GET',
        		dataType: "JSON",
				data:{
					channel : myChanel, 
					event	: chatEvent
				},
				beforeSend:function(){			
					$("div.spanner").addClass("show");
  					$("div.overlay").addClass("show");
				},
				success:function(data){ 
					// console.log(data);
					data.forEach(el => {
						// console.log(el);
						sendmessage(el,false);
					});
				},
				complete: function(){
					setTimeout(function() {
						$("div.spanner").removeClass("show");
						$("div.overlay").removeClass("show");
						$("#chat_area").animate({ scrollTop: document.getElementById("appendchat").scrollHeight }, 1000);
					},5*1000);
				},
				error:function(err) {
					console.log(err);
				}   
			});
		}

		$('#sendchat').click(function(){
			let message = $('#message').val(),
				btnSend = $('#sendchat'),
				// letters = /^[0-9a-zA-Z!@#\$%\^\&*\)\(+=,<.>/?;:'"[{}|\]\_-]+$/;
				letters = /^\s+$/;
			// console.log(message,message.match(letters));
			if (!btnSend[0].classList.value.match('disabled')) {
				if ((!message.match(letters)) && (message !== "")) {
					$.ajax({
						url: "<?php echo base_url(); ?>chat/chatsend2/",
						type: 'POST',
						data:{
              channel : myChanel, 
              event	: chatEvent,
							message : message, 
						},
						beforeSend:function(){
							btnSend.addClass("disabled");
						},
						success:function(){ 
							$('#message').val('');
						},
						complete:function(){
							btnSend.removeClass("disabled");

						},
						error:function(err){
							console.log(err);
						} 
					});				
				} else {
					$('#message').val('');
				}				
			}
    });
    		
		loadData();
	});
	
</script>
<!--/main-->