

        <!--hero section start-->
        <section class="hero-slider-section bg-image hero-equal-height dark-bg" data-overlay="8">
            <div class="owl-carousel owl-theme hero-slider-one custom-dot dot-bottom-center">
                <?php foreach($slider as $item):?>
                <!-- START ITEM -->
                <div class="item">
                    <div class="background-image-wraper " style="background: url('<?=base_url().$item['image']?>')no-repeat; opacity: 1;"></div>
                    <a href="<?=$item['link']?>">
                        <div class="content-container">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="hero-content-wrap text-white position-relative z-index">
                                            <h1 class="text-white"><?=$item['title']?></h1>
                                            <span class="text-white h5 font-weight-normal"><?=$item['desc']?></span>
                                            <div class="action-btns mt-2">
                                                <a href="<?=$item['link']?>" class="btn btn-warning mr-3">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END ITEM -->
                <?php endforeach;?>
            </div>
        </section>
        <!--hero section end-->
         <!--Menu to action start-->
        <section class="ptb-60 primary-gray">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-4 col-sm-12 home_box_reset">
                         <div class="home_feat_1_box">
                                <a href="<?=base_url().'page/kalender_akademik'?>">
                                    <img src="<?= base_url() . 'assets/fo' ?>/images/center/1.jpg" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3>Kalender Akademik</h3>
                                        <i class="arrow_carrot-right_alt2"></i>
                                    </div>
                                </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 home_box_reset">
                         <div class="home_feat_1_box">
                                <a href="<?=base_url().'page/program_studi'?>">
                                    <img src="<?= base_url() . 'assets/fo' ?>/images/center/2.jpg" class="img-responsive" alt="">
                                    <div class="short_info">
                                        <h3>Program Studi</h3>
                                        <i class="arrow_carrot-right_alt2"></i>
                                    </div>
                                </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 home_box_reset">
                        <div class="home_feat_1_box">
                            <a href="<?=base_url().'page/beasiswa'?>">
                                <img src="<?= base_url() . 'assets/fo' ?>/images/center/3.jpg" class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Beasiswa</h3>
                                    <i class="arrow_carrot-right_alt2"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!-- End row -->
            </div>
        </section>
        <!--Menu to action end-->

        <!--profile section start-->
        <section class="appliction-hosting bg-profile-side">
            <div class="row align-items-center justify-content-between p-0 m-0">
                    <div class="col-sm-12 col-md-6 p-0">
                        <div class="feature-img-wrap">
                            <img src="<?= base_url() . $sejarah['image'] ?>" alt="profile">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="feature-content-wrap content-profile-side ">
                            <h2><?=$sejarah['title']?></h2>
                            <p><?=substr($sejarah['desc'],0,745)?> </p>
                            <a href="#" class="btn btn-primary mt-3" target="_blank">Selengkapnya</a>
                        </div>
                    </div>
            </div>
        </section>
        <!--profile section end-->

        
        
        <!-- VIDEO SECTION -->
           <section class="review-section ptb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 ">
                        <div class="section-heading">
                            <h2 class="clear-m">Seputar</h2>
                            <div class="line-20 mb-3 mt-1"></div>
                            <h4><?=$site['name']?></h4>                      
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme client-testimonial-1 dot-bottom-center custom-dot">
                        <?php foreach($video as $item): ?>
                            <div class="item">
                                <div class="border single-review-wrap bg-white p-4 m-3">
                                    <iframe
                                    width="100%"
                                    height="250"
                                    src="<?=$item['link']?>"
                                    title="YouTubevideoplayer"
                                    frameborder="0"
                                    allow="accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture"
                                    allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <?php if(count($video)===0):?>
                        <div class="col-md-12 justify-content-center text-center">
                            Belum ada data.
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <!-- VIDEO SECTION END -->
        
        <!--Cerita Kami section start-->
        <section class="review-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="section-heading">
                            <h2><?=$sc_testimoni['title']?></h2>
                            <p><?=$sc_testimoni['desc']?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-8">
                        <div class="owl-carousel owl-theme client-testimonial-2 dot-bottom-center custom-dot">
                             <?php foreach($testimoni as $item): ?>
                                <div class="item">
                                        <div class="border single-review-wrap bg-white p-4 m-3">
                                            <div class="review-body">
                                                <p><?=$item['desc']?></p>
                                            </div>
                                            <div class="review-author d-flex align-items-center">
                                                <div class="author-avatar">
                                                    <img src="<?=base_url().$item['image']?>" width="64" alt="author" class="rounded-circle shadow-sm img-fluid mr-3" />
                                                    <span>“</span>
                                                </div>
                                                <div class="review-info">
                                                    <h6 class="mb-0"><?=$item['name']?></h6>
                                                    <span><?=$item['jurusan']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endforeach;?>
                        </div>
                        <?php if(count($testimoni)===0):?>
                            <div class="col-md-12 justify-content-center text-center">
                                Belum ada data.
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
        <!--Cerita Kami section end-->


        <!--Kerjasama section start-->
        <section class="client-section  ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2><?=$sc_mitra['title']?></h2>
                            <p><?=$sc_mitra['desc']?></p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                            <?php foreach($mitra as $item): ?>
                                 <div class="item single-customer">
                                    <img src="<?= base_url() . $item['image'] ?>" alt="client logo" class="customer-logo">
                                </div>
                            <?php endforeach;?>
                        </div>
                        <?php if(count($mitra)===0):?>
                            <div class="col-md-12 justify-content-center text-center">
                                Belum ada data.
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
        <!--Kerjasama section end-->
        <!--BERITA section start-->
        <section class="appliction-hosting ptb-100 gray-light-bg">
            <div class="container">
                <div class="row ">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading">
                            <h2 class="clear-m">Berita</h2>
                            <div class="line-20 mb-3"></div>
                            <h4><?=$site['name']?></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($berita as $item):?>
                    <!-- start berita -->
                    <div class="col-md-6 col-lg-4">
                        <a class="single-blog-article rounded bg-white border d-block mt-4" href="<?=base_url().'berita/post/'.$item['information_slug']?>">
                            <div class="blog-img mb-2">
                                <img src="<?=base_url().$item['information_image']?>" class="rounded-top img-fluid" alt="blog">
                            </div>
                            <div class="blog-content-wrap p-4">
                                <span class="badge badge-warning mb-2"><?=$item['category_name']?></span>
                                <div class="article-heading">
                                    <h3 class="h5 mb-0"><?=$item['information_title']?></h3>
                                    <span> On <?=$item['information_created_at']?></span>
                                </div>
                                <span class="border-shape my-3"></span>
                                <p><?=substr(strip_tags($item['information_desc']),0,100)?>[...]</p>
                                <div class="article-footer d-flex align-items-left justify-content-left">
                                    <div class="article-comments">
                                        Baca Selengkapnya...
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- end berita -->
                    <?php endforeach;?>
                    <?php if(count($berita)===0):?>
                        <div class="col-md-12 justify-content-center text-center">
                            Belum ada data.
                        </div>
                    <?php endif;?>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" d-flex align-items-center justify-content-center">
                            <a href="<?= base_url()?>berita" class="btn btn-secondary mt-5 w-100" target="_blank" style="font-size:1.2em">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--BERITA hosting section end-->

    </div>

