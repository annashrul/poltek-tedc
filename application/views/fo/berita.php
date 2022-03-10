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

<div class="module ptb-100">
    <div class="container-fluid" style="padding:0 120px">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <section class="our-blog-section ">
                    <div class="container">
                        <div class="row justify-content-center">
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
                                <div class="mt-5">
                                    <?=$pagination_link?>
                                </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
               <?php $this->load->view('fo/component/side-berita.php')?>
            </div>
        </div>
    </div>
</div>
