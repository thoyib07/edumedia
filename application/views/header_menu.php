<header class="header menu_2" style="background: #E6E6FA;padding: 8px 30px;">
    <style type="text/css">
        .main-menu ul ul.menu-edit-spero:before {
            bottom: 100%;
            left: 8%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 7px;
            margin-left: 227px;
        }

        .main-menu ul ul.menu-edit-spero-kiri:before {
            bottom: 100%;
            left: -10%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff0;
            border-width: 7px;
            margin-left: 227px;
        }

        .main-menu ul ul ul:before {
            border: unset;
        }

        span.tes_hend:hover  {
          background-color: #000;
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

                        if(element.sub_kategori != '0'){
                            
                            $('#kategori_show').append('<li style="width: 100%;margin: -3px 0px 0px 0px;"><span><a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;"><i><img src="http://admin.edumedia.id/'+element.icon_web+'" class="img-fluid" alt="" style="width: 13%;margin-right: 6%;"></i>'+ element.nama_kategori +'</a></span><ul class="menu-edit-spero-kiri" style="left: 100%;right: unset;top: 0%;position: fixed;padding-top: 13px;padding-bottom: 13px;height: -webkit-fill-available;" id="kategori_show'+ element.id_kategori +'"></ul></li>');

                            element.sub_kategori.forEach(function(element_sub) {

                                $('#kategori_show'+ element.id_kategori +'').append('<li style="width: 100%;margin: -3px 0px 4px 0px;"><span><a href="<?php echo base_url();?>index.php/Materi/get_materi/'+element_sub.id_kategori+'" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">'+ element_sub.nama_kategori +'</a></span></li>');

                            });

                        }else{

                            $('#kategori_show').append('<li style="width: 100%;margin: -3px 0px 0px 0px;"><span><a href="<?php echo base_url();?>index.php/Kategori/get_sub_kategori/'+element.id_kategori+'" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;"><img src="http://admin.edumedia.id/'+element.icon_web+'" class="img-fluid" alt="" style="width: 13%;margin-right: 6%;">'+ element.nama_kategori +'</a></span></li>');
                        
                        }

                    });

                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('terjadi kesalahan, coba beberapa saat lagi');
                }
            });
        });
    </script>
    <div id="preloader"><div data-loader="circle-side"></div></div>
    <!-- <ul id="top_menu">
        <li><a href="login.html" class="login">Login</a></li>
        <li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
        <li class="hidden_tablet"><a href="admission.html" class="btn_1 rounded">Admission</a></li>
    </ul> -->
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box" style="margin-top: 10%;margin-bottom: -5%;">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <div class="hidden_tablet">
        <div id="logo" style="margin-top: -15px;">
            <a href="<?php echo base_url();?>index.php/Home"><img style="margin-top: 6%;" src="<?php echo base_url();?>assets/images/new logo edumedia.png" width="139" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu" style="margin: -6px 0 0 10px;">
            
            <?php if (empty($this->session->userdata('id_user'))) {?>

                
                <nav style="margin: 9px 22px 0px 0px;float: left;" id="menu1" class="main-menu">
                    <ul>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;"><i class="ti-layout-grid3-alt" style="margin-right: 6px;font-size: 12px;"></i>Kategori</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 13px;padding-bottom: 13px;max-height: 2000%;" id="kategori_show">
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
                <li style="margin: -13px 46px 0px 0px;margin-top: 14px;">
                    <!-- <form method="POST" action="<?php echo site_url('index.php/Search/by_matapelajaran'); ?>"> -->
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
                </li>
                <nav style="margin: 0px 23px 0px 0px;" id="menu1" class="main-menu">
                    <ul>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="<?php echo base_url();?>index.php/Chat_mentor" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Chat Mentor</a></span>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Program</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 13px;padding-bottom: 13px;max-height: 2000%;">
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                	<span>
                                		<a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                			<div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Student_Project.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Student Project</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pelajar Membuat Karya Sendiri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Dengan Biaya Pribadi atau
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pembiayaan Masal.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                		</a>
                                	</span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Program" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Mentoring.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Mentor Program</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pengajar Dapat Membagi Ilmu
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Lanjutan Dengan Mengatur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Jadwalnya Sendiri.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Internship.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Internship</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Calon Pelajar Bisa Mendaftar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Kerja Industri Sesuai Industri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Yang di Pilih.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="<?php echo base_url();?>index.php/Universitas" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Universitas</a></span>
                            <!-- <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;" id="program_show">
                                
                            </ul> -->
                        </li>
                        <li><a style="position: relative;border-radius: .25rem !important;background-color: #6a25b3;border: 1px solid white;border-color: #6a25b3;color: #ffffff;font-size: 0.9rem;text-transform: capitalize;padding: 10px 13px;letter-spacing: initial;" href="<?php echo base_url();?>index.php/Login" class="btn_1 rounded">Masuk</a></li>
                    </ul>
                </nav>
            <?php } else { ?>

                
                <nav style="margin: 9px 22px 0px 0px;float: left;" id="menu1" class="main-menu">
                    <ul>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;"><i class="ti-layout-grid3-alt" style="margin-right: 6px;font-size: 12px;"></i>Kategori</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 20px;padding-bottom: 20px;" id="kategori_show">
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
                <li style="margin: -13px 23px 0px 0px;margin-top: 14px;">
                    <!-- <form method="POST" action="<?php echo site_url('index.php/Search/by_matapelajaran'); ?>"> -->
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
                </li>
                <nav style="margin: 0px 23px 0px 0px;" id="menu1" class="main-menu">
                    <ul>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="<?php echo base_url();?>index.php/Chat_mentor" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Chat Mentor</a></span>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Program</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 13px;padding-bottom: 13px;max-height: 2000%;">
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Student_Project.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Student Project</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pelajar Membuat Karya Sendiri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Dengan Biaya Pribadi atau
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pembiayaan Masal.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Program" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Mentoring.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Mentor Program</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pengajar Dapat Membagi Ilmu
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Lanjutan Dengan Mengatur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Jadwalnya Sendiri.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Internship.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Internship</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Calon Pelajar Bisa Mendaftar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Kerja Industri Sesuai Industri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Yang di Pilih.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="<?php echo base_url();?>index.php/Universitas" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Universitas</a></span>
                            <!-- <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;" id="program_show">
                                
                            </ul> -->
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;color: #000;" href="">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">Kursus Saya</a></span>
                            <?php if(!empty($list_kursus_saya)){ ?>
                                <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 13px;padding-bottom: 13px;max-height: 2000%;overflow-y: auto;">
                                    <?php foreach ($list_kursus_saya as $row) { ?>
                                        <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                            <span>
                                                <a href="<?php echo base_url().'index.php/Belajar/detail/'.$row['id_materi'];?>" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">
                                                    <div style="margin-right: 20px;">
                                                        <table width="100%" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="20%">
                                                                        <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                            <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                            <img style="margin-bottom: 20%;" id="img_circle" src="<?php echo 'http://admin.edumedia.id/'.$row['background'];?>" height="42" alt="Profile Imag">
                                                                        </span>
                                                                    </td>
                                                                    <td width="80%" valign="top">
                                                                        <p style="font-size: 15px;color: #000;margin-bottom: 10px;"><?php echo $row['matapelajaran'];?></p>
                                                                        <p style="font-size: 14px;color: #6f6c6c;margin-bottom: 5px;">By <?php echo $row['nama_lengkap'];?></p>
                                                                        <p style="font-size: 14px;color: #6f6c6c;margin-bottom: 5px;"><?php echo $row['nama_kategori'];?></p>
                                                                        <div class="progress" style="margin-top: 6%;">
                                                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </a>
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                        <!-- <li class="hidden_tablet" style="margin-right: unset;"><a style="font-size: 28px;color: #000;position: relative;top: 7px;" href="#0" class="pe-7s-like"></a></li> -->
                        <!-- <li class="hidden_tablet" style="margin-right: unset;"><a style="font-size: 28px;color: #000;position: relative;top: 7px;" href="#0" class="pe-7s-cart"></a></li> -->
                        <!-- <li class="hidden_tablet" style="margin-right: unset;"><a style="font-size: 28px;color: #000;position: relative;top: 7px;" href="#0" class="pe-7s-bell"></a></li> -->
                        <li style="">
                            <span>
                                <a href="#0" style="text-transform: capitalize;font-size: 0.975rem;font-weight: 100;letter-spacing: inherit;color: #000;letter-spacing: initial;">
                                    <img style="width: 31px;" class="img-circle img-user media-object" src="<?php echo base_url();?>assets/images/822762_user_512x512.png" alt="Profile Picture">
                                </a>
                            </span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;padding-top: 20px;padding-bottom: 20px;" id="kategori_show">
                                <li style="width: 100%;margin: -3px 0px 4px 0px;">
                                    <span>
                                        <a href="#" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;color: #000;">
                                            <div style="margin-right: 17px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2"><img style="width: 45px;" class="img-circle img-user media-object" src="<?php echo base_url();?>assets/images/822762_user_512x512.png" alt="Profile Picture"> </span>
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                <p style="font-size: small;color: #000;margin-bottom: 5px;"><?php echo $this->session->userdata('nama'); ?></p>
                                                                <p style="font-size: small;color: #6f6c6c;margin-bottom: 5px;"><?php echo $this->session->userdata('email'); ?></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 4px 12px;">
                                    <span>
                                        <a href="#" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            My Profile
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 4px 12px;">
                                    <span>
                                        <a href="#" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            Help
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 4px 12px;">
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Login/logout" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px 13px;letter-spacing: initial;">
                                            Log Out
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav style="margin: -7px 23px 0px 0px;" id="menu1" class="main-menu">
                    <ul>
                    </ul>
                </nav>
            <?php } ?>

        </ul>
    </div>
    <div class="btn_mobile">
        <ul id="top_menu" style="margin: -37px 0 0 10px;">
            <?php if (empty($this->session->userdata('id_user'))) { ?>
                <!-- <li><a href="#0" class="search-overlay-menu-btn">Search</a></li> -->
                <div style="width: 105px;margin-left: 13%;left: 21%;" id="logo">
                    <a href="<?php echo base_url();?>index.php/Home">
                        <img style="height: 37px;margin-top: 5%;" src="<?php echo base_url();?>assets/images/new logo edumedia.png" width="149" height="42" data-retina="true" alt="">
                    </a>
                </div>
                <li><a style="position: relative;border-radius: .25rem !important;background-color: #6a25b3;border: 1px solid white;border-color: #ffffff;color: #ffffff;font-size: x-small;text-transform: capitalize;padding: 10px 13px;" href="<?php echo base_url();?>index.php/Login" class="btn_1 rounded">Masuk</a></li>
                <!-- <li><a style="position: relative;border-radius: .25rem !important;border-color: #ffc107;background-color: #ea433f;color: #fff;font-size: x-small;text-transform: capitalize;padding: 10px 13px;" href="<?php echo base_url();?>index.php/Sign_up" class="btn_1 rounded">Daftar</a></li> -->
                <nav id="menu" class="main-menu">
                    <ul>
                        <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Kategori</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;" >
                                <?php foreach ($kategori_list as $row) { ?>
                                    <?php if ($row['child']) { ?>
                                       <li style="width: 100%;"><span><a href="#0" style="font-size: small;color: #6f6c6c;"><?php echo $row['nama_kategori'];?></a></span>
                                            <ul class="menu-edit-spero-kiri" style="left: 100%;right: unset;top: 0%;" id="<?php echo $row['nama_kategori'];?>">
                                                <?php foreach ($row['child'] as $row_child) { ?>
                                                    <li style="width: 100%;"><span><a href="<?php echo base_url().'index.php/Materi/get_materi/'.$row_child->id_kategori;?>" style="font-size: small;color: #6f6c6c;"><?php echo $row_child->nama_kategori;?></a></span></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else {?> 
                                       <li style="width: 100%;">                                       
                                            <span>
                                                <a href="" style="font-size: small;color: #6f6c6c;">
                                                    <?php echo $row['nama_kategori'];?>
                                                </a>
                                            </span>
                                        </li> 
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Program</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;">
                                <li style="width: 100%;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Student_Project.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Student Project</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pelajar Membuat Karya Sendiri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Dengan Biaya Pribadi atau
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pembiayaan Masal.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Program" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Mentoring.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Mentor Program</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pengajar Dapat Membagi Ilmu
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Lanjutan Dengan Mengatur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Jadwalnya Sendiri.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px; letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Internship.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Internship</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Calon Pelajar Bisa Mendaftar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Kerja Industri Sesuai Industri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Yang di Pilih.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li><span><a href="<?php echo base_url();?>index.php/Chat_mentor" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Chat Mentor</a></span>
                        </li>
                        <li><span><a href="<?php echo base_url();?>index.php/Universitas" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Universitas</a></span>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Partner</a></span>
                        </li>
                    </ul>
                </nav>
            <?php } else { ?>
                <!-- <li style="margin: -2px 0 0 10px;"><a style="font-size: 28px;color: #fff;position: relative;top: 7px;" href="#0" class="pe-7s-search"></a></li> -->
                <!-- <li><a href="#0" class="search-overlay-menu-btn">Search</a></li> -->
                <div style="width: 105px;margin-left: 13%;left: 21%;" id="logo">
                    <a href="<?php echo base_url();?>index.php/Home">
                        <img style="height: 37px;margin-top: 5%;" src="<?php echo base_url();?>assets/images/new logo edumedia.png" width="149" height="42" data-retina="true" alt="">
                    </a>
                </div>
                <nav id="menu" class="main-menu">
                    <ul>  
                        <li class="" style="margin-right: unset;">
                            <span>
                                <a>
                                    <span class="pull-right"> <img style="width: 31px;" class="img-circle img-user media-object" src="<?php echo base_url();?>assets/images/822762_user_512x512.png" alt="Profile Picture"> </span>
                                </a>
                            </span>
                            <ul class="menu-edit-spero" style="left: unset;right: 3px;margin-top: 10px;">
                                <li style="width: 283px;">                                       
                                    <span>
                                        <a href="#" style="color: #000000">
                                            <div>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2"><img style="width: 45px;" class="img-circle img-user media-object" src="<?php echo base_url();?>assets/images/822762_user_512x512.png" alt="Profile Picture"></span>
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                <p style="font-size: small;color: #000;margin-bottom: 5px;"><?php echo $this->session->userdata('nama'); ?></p>
                                                                <p style="font-size: small;color: #6f6c6c;margin-bottom: 5px;"><?php echo $this->session->userdata('email'); ?></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 283px;">                                       
                                    <span>
                                        <a href="#" style="font-size: 15px;color: #6f6c6c;">
                                            My Profile
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 283px;">                                       
                                    <span>
                                        <a href="#" style="font-size: 15px;color: #6f6c6c;">
                                            Help
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 283px;">                                       
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Login/logout" style="font-size: 15px;color: #6f6c6c;">
                                            Log out
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li><span><a style="text-transform: capitalize;font-size: 15px;font-weight: 100;letter-spacing: inherit;" href="">Pengajar</a></span></li>
                        <li><span><a style="text-transform: capitalize;font-size: 15px;font-weight: 100;letter-spacing: inherit;" href="">Kursus saya</a></span>
                            <ul id="kursus_saya">
                                <?php foreach ($list_kursus_saya as $row) { ?>
                                   <li>
                                        <a href="#" style="color: #000000;padding: 0px 10px 10px 16px;">
                                            <div>
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <!-- <td width="20%">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag">
                                                                </span>
                                                            </td> -->
                                                            <td width="100%" valign="top">
                                                                <p style="font-size: 15px;color: #000;margin-bottom: 0px;"><?php echo $row['matapelajaran'];?></p>
                                                                <p style="font-size: 14px;color: #6f6c6c;margin-bottom: 0px;">By <?php echo $row['nama_lengkap'];?></p>
                                                                <p style="font-size: 14px;color: #6f6c6c;margin-bottom: 0px;"><?php echo $row['nama_kategori'];?></p>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Kategori</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;" >
                                <?php foreach ($kategori_list as $row) { ?>
                                    <?php if ($row['child']) { ?>
                                       <li style="width: 100%;"><span><a href="#0" style="font-size: small;color: #6f6c6c;"><?php echo $row['nama_kategori'];?></a></span>
                                            <ul class="menu-edit-spero-kiri" style="left: 100%;right: unset;top: 0%;" id="<?php echo $row['nama_kategori'];?>">
                                                <?php foreach ($row['child'] as $row_child) { ?>
                                                    <li style="width: 100%;"><span><a href="<?php echo base_url().'index.php/Materi/get_materi/'.$row_child->id_kategori;?>" style="font-size: small;color: #6f6c6c;"><?php echo $row_child->nama_kategori;?></a></span></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } else {?> 
                                       <li style="width: 100%;">                                       
                                            <span>
                                                <a href="" style="font-size: small;color: #6f6c6c;">
                                                    <?php echo $row['nama_kategori'];?>
                                                </a>
                                            </span>
                                        </li> 
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li style=""><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Program</a></span>
                            <ul class="menu-edit-spero-kiri" style="left: unset;right: 3px;">
                                <li style="width: 100%;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Student_Project.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Student Project</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pelajar Membuat Karya Sendiri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Dengan Biaya Pribadi atau
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pembiayaan Masal.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="<?php echo base_url();?>index.php/Program" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Mentoring.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Mentor Program</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Pengajar Dapat Membagi Ilmu
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Lanjutan Dengan Mengatur
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Jadwalnya Sendiri.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                                <li style="width: 100%;margin: -3px 0px 0px 0px;">
                                    <span>
                                        <a href="#0" style="font-size: small;color: #6f6c6c;font-weight: 10;padding: 5px;letter-spacing: initial;">
                                            <div style="margin-right: 20px;">
                                                <table width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%" valign="center">
                                                                <span class="image col-md-2 col-sm-2 col-xs-2">
                                                                    <!-- <img id="img_circle" src="<?php echo base_url();?>assets/images/85-Matematika.jpg" height="42" alt="Profile Imag"> -->
                                                                    <img id="img_circle" src="http://admin.edumedia.id/assets/images/icon_katagori/Internship.png" height="30" alt="Profile Imag">
                                                                </span>
                                                            </td>
                                                            <td width="80%" valign="center">
                                                                <b style="font-size: 15px;" >Internship</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Calon Pelajar Bisa Mendaftar
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Kerja Industri Sesuai Industri
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20%">
                                                            </td>
                                                            <td width="80%" valign="top">
                                                                Yang di Pilih.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <!-- <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">About</a></span>
                        </li> -->
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <!-- <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Become Mentor</a></span>
                        </li> -->
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li><span><a href="<?php echo base_url();?>index.php/Chat_mentor" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Chat Mentor</a></span>
                        </li>
                        <li><span><a href="<?php echo base_url();?>index.php/Universitas" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Universitas</a></span>
                        </li>
                        <!-- <li style="margin-right: unset;"><span><a style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;" href="<?php echo base_url();?>index.php/Pages">Pengajar</a></span></li> -->
                        <li><span><a href="#0" style="text-transform: capitalize;font-size: small;font-weight: 100;letter-spacing: inherit;">Partner</a></span>
                        </li>
                    </ul>
                </nav>
            <?php } ?>

        </ul>
    </div>
    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
        <!-- <form  method="POST" action="<?php //echo site_url('index.php/Search/by_matapelajaran'); ?>"> -->
        <form  method="POST" action="#">
            <input value="" name="matapelajaran" type="search" placeholder="Apa yang ingin kamu pelajari. . ." />
            <button type="submit"><i class="icon_search"></i>
            </button>
        </form>
    </div><!-- End Search Menu -->
</header>
<!-- /header -->