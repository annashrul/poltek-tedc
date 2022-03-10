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
            <?php foreach($datum as $item):?>
                <div class="col-md-4 col-sm-12">
                    <div class="facility-container">
                        <div class="facility-card">
                            <div class="photo" style="background: url('<?=base_url().$item['facility_image']?>');background-size:cover;"></div>
                            <div class="details">
                                <div class="badge badge-warning"><?=$item['vocational_name']?></div>
                            </div>
                        </div>
                        <h6 class="text-center"><?=$item['facility_name']?></h6>
                    </div>
                    
                </div>
            <?php endforeach?>
        </div>
    </div>
    <div class="mt-5">
        <?=$pagination_link?>
    </div>
</section>