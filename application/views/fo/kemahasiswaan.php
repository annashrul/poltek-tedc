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
<section class="our-blog-section ptb-100 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">

                <?php foreach($datum as $item):?>
                    <!-- start berita -->
                    <div class="col-md-12">
                        <div class="blog-card">
                            <div class="photo" style="background: url('<?=base_url().$item['information_image']?>');background-size:cover;"></div>
                            <div class="details">
                                <div class="badge badge-warning"><?=$item['type_name']?></div>
                            </div>
                            <div class="description">
                                <a href="<?= base_url().'page/detail/'.$item['information_slug']?>">
                                    <h1><?=$item['information_title']?></h1>
                                    <div class="date"><i class="fa fa-calendar"></i> <?=$item['information_created_at']?></div>
                                    <p class="summary"><?=substr(strip_tags($item['information_desc']),0,100)?>[...]</p>

                                </a>
                                <a class="readmore" href="<?= base_url().'page/detail/'.$item['information_slug']?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <!-- end berita -->
                <?php endforeach;?>
                <?php if(count($datum)===0):?>
                    <div class="col-md-12 justify-content-center text-center">
                        Belum ada data.
                    </div>
                <?php endif;?>
                <div class="mt-5">
                    <?=$pagination_link?>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <?php $this->load->view('fo/component/side-page.php')?>
            
            </div>
        </div>
    </div>
</section>