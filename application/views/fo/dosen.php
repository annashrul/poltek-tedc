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
                <div class="col-lg-3 col-xs-6" style="height:400px;margin-bottom:100px">
                        <div class="team-one__single">
                            <div class="team-one__image" style="height:auto!important;">
                                <img src="<?=base_url().$item['lecturer_image']?>" onerror="this.src='https://www.smkn14bdg.sch.id/upload/default.jpg'" alt="" style="width:100%!important; border-radius:0%!important">
                            </div>
                            <div class="team-one__content">
                                <h5><?=$item['lecturer_name']?></h5>
                                <p class="team-one__text"><?=$item['position_name']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>
    <div class="mt-5">
        <?=$pagination_link?>
    </div>
</section>