<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="<?= base_url() . 'assets/fo' ?>/images/Logo Poltek.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--title-->
    <title><?=$site['name']?> - <?=$title?></title>

    <!--build:css-->
    <link rel="stylesheet" href="<?= base_url() . 'assets/fo/' ?>css/main.css">
    <!-- endbuild -->
</head>

<body>

    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            <img src="<?= base_url() . 'assets/fo/' ?>images/Logo Poltek.png" alt="logo" class="img-fluid" width="100" />
            <div class="preloader">
                <i>.</i>
                <i>.</i>
                <i>.</i>
            </div>
        </div>
    </div>
    <!--preloader end-->
    <!--header section start-->
    <header id="header" class="header-main">
        <!--main header menu start-->
        <div id="logoAndNav" class="main-header-menu-wrap bg-transparent  affix ">
            <nav id="top_additional_nav" class="navbar navbar-expand-md header-nav bg-warning">
                <div class="container text-white">
                    <ul class="navbar-nav ">
                        <!--home start-->
                        <li class="nav-item custom-nav-item">
                            <a class="nav-link custom-nav-link" href="tel:<?=str_replace('(022) ','+6222',$site['phone'])?>"><i class="fa fa-phone"></i> <?=$site['phone']?></a>
                        </li>
                        <li class="nav-item custom-nav-item">
                            <a class="nav-link custom-nav-link" href="mailto:<?=$site['email']?>"><i class="fa fa-envelope"></i> <?=$site['email']?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!--home start-->
                        <li class="nav-item custom-nav-item">
                            <a class="nav-link custom-nav-link" href="<?= base_url()?>berita">Berita</a>
                        </li>
                        <li class="nav-item custom-nav-item">
                            <a class="nav-link custom-nav-link" href="<?= base_url()?>page/download">Download</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <nav class="js-mega-menu navbar navbar-expand-md header-nav">

                    <!--logo start-->
                    <a class="navbar-brand pt-0" href="<?= base_url()?>"><img src="<?=base_url().$site["logo"]?>" alt="logo" class="img-fluid logo" /></a>
                    <!--logo end-->

                    <!--responsive toggle button start-->
                    <button type="button" class="navbar-toggler btn" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                        <span id="hamburgerTrigger" style="color:#333">
                          <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <!--responsive toggle button end-->

                    <!--main menu start-->
                    <div id="navBar" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto main-navbar-nav">
                            <!--home start-->
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="<?= base_url()?>">Beranda</a>
                            </li>
                            <!--home end-->

                            <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="tentangMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Tentang</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="tentangMenu" style="min-width: 230px;">
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'page/profile'?>">Profil</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'page/sejarah'?>">Sejarah</a>
                                    </li>                                    
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'page/struktur'?>">Struktur Organisasi</a>
                                    </li>
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkSumberDaya" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuSumberDaya">Sumber Daya</a>
                                        <ul id="navSubmenuSumberDaya" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkSumberDaya" style="min-width: 230px;">
                                            <li><a class="nav-link sub-menu-nav-link" href="<?=base_url().'page/jabatan_struktural'?>">Jabatan Struktural</a></li>
                                            <li><a class="nav-link sub-menu-nav-link"  href="<?= base_url()?>page/dosen">Dosen</a></li>
                                            <li><a class="nav-link sub-menu-nav-link"  href="<?=base_url().'page/fasilitas'?>">Fasilitas</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->

                            <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="tentangMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Akademik</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="tentangMenu" style="min-width: 230px;">
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="https://pddikti.kemdikbud.go.id/data_pt/RjQ4NkFBMzgtNjVERS00MjNFLThGRDctQ0REODc1MUY1OUEz" target="_blank">PDDIKTI</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'page/kalender_akademik'?>">Kalender Akademik</a>
                                    </li>
                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->

                            <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="tentangMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Jurusan</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="tentangMenu" style="min-width: 230px;">
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkPagesBlog" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesBlog">Diploma III (Ahli Madya)</a>

                                        <ul id="navSubmenuPagesBlog" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkPagesBlog" style="min-width: 230px;">
                                            <?php foreach($d3 as $item):?>
                                            <li><a class="nav-link sub-menu-nav-link" href="<?=base_url().'jurusan/get/'.$item['slug']?>"><?=$item['name']?></a></li>
                                            <?php endforeach?>
                                        </ul>
                                    </li>
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkPagesBlog" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesBlog">Diploma IV (Sarjana Terapan)</a>
                                        <ul id="navSubmenuPagesBlog" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkPagesBlog" style="min-width: 230px;">
                                            <?php foreach($d4 as $item):?>
                                            <li><a class="nav-link sub-menu-nav-link" href="<?=base_url().'jurusan/get/'.$item['slug']?>"><?=$item['name']?></a></li>
                                            <?php endforeach?>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->
                             <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="pagesMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Kemahasiswaan</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?= base_url()?>page/kemahasiswaan">Agenda Kemahasiswaan</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?= base_url()?>page/ormawa">Ormawa</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?= base_url()?>page/karir">Pusat Karir</a>
                                    </li>
                                     <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?= base_url()?>page/tracer_study">Tracer Study</a>
                                    </li>
                                     <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?= base_url()?>page/beasiswa">Beasiswa</a>
                                    </li>

                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->

                            <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="pagesMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Penelitian & Abdimas</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="#">Jurnal TEDC</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="http://jurnal.kopertipindonesia.or.id/index.php/kopertip">Jurnal Kopertip Indonesia</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'berita/cat/penelitian'?>">Penelitian</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="<?=base_url().'berita/cat/pengabdian-masyarakat'?>">Pengabdian Masyarakat</a>
                                    </li>
                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->

                            <!--pages start-->
                            <li class="nav-item hs-has-sub-menu custom-nav-item">
                                <a id="pagesMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Layanan</a>

                                <!-- Pages - Submenu -->
                                <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="#">Sis. Informasi Akademik</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="#">Perpustakaan</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="#">LSP P1 (BNSP)</a>
                                    </li>
                                    <li class="nav-item submenu-item">
                                        <a class="nav-link sub-menu-nav-link" href="#">Sister Dikti</a>
                                    </li>
                                </ul>
                                <!-- End Pages - Submenu -->
                            </li>
                            <!--pages end-->


                            <!--button start-->
                            <!-- <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a class="btn btn-primary animated-btn" href="" target="_blank">
                                    <span class="fa fa-user pr-2"></span> Client Area
                                </a>
                            </li> -->
                            <!--button end-->
                        </ul>
                    </div>
                    <!--main menu end-->
                </nav>
            </div>
        </div>
        <!--main header menu end-->
    </header>
    <!--header section end-->
