<section class="header-pages gradient-bg">
    <div class="h-100 w-100" style="
    background: url('<?=base_url().'assets/fo/images/gedung.jpg'?>')no-repeat center; 
    background-size: cover;
    -webkit-filter: blur(1.5px);
    -moz-filter: blur(1.5px);
    -o-filter: blur(1.5px);
    -ms-filter: blur(1.5px);
    filter: blur(1.5px);" 
    >
    </div>
    <div class="ptb-120 header-pages-text">
        <div class="container" >
            <div class="row justify-content-center" >
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative ">
                        <h1 class="text-white"><?=$title?></h1>
                        <p class="lead"><?=$deskripsi?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="about" class="about-section position-relative overflow-hidden ptb-100 ">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <?php if($title!=='Struktur Organisasi' && $title!=='Kalender Akademik' && $title!=='Fasilitas' && $title!=='Ormawa' && $title!=='Tracer Study'):?>
                <div class="col-md-12 col-lg-12">
                    <div class="feature-contents section-heading text-center">
                        <img src="<?= base_url() . 'assets/fo' ?>/images/Logo Poltek.png" alt="logo" class="img-fluid" width="200">
                        <p>
                            Kode Perguruan Tinggi<br/>
                            045016
                        </p>
    
                    </div>
                </div>
            <?php endif;?>

            <div class="col-md-12 col-lg-12" style="text-align: justify;">
                <?=$profil['desc']!=='-'?$profil['desc']:''?>
            </div>
            <?php if($profil['image']!==null && $profil['image']!=='-' && $profil['image']!==''):?>
                <div class="col-md-12 col-lg-12" style="text-align: justify;">
                    <img src="<?= base_url() . $profil['image'] ?>" alt="logo" class="img-fluid" width="100%">
                </div>
            <?php endif;?>



        </div>
    </div>
</section>