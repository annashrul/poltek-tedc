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
        <div class="row" >
          <div class="col-12 col-md-6 col-lg-3 pb-5">
              <div class="cnt-block equal-hight" >
                <figure><img width="100%" src="<?=base_url().$datum['organization_image']?>" class="img-responsive" alt=""></figure>
                <h3><?=$datum['organization_name']?></h3>
                <p><?=$datum['organization_desc']?></p>
                  <a href="<?=$datum['organization_link']?>" class="btn btn-warning" style="width:100%">Kunjungi </a>
              </div>
          </div>
        </div>

    </div>
</section>