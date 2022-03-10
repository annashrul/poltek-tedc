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
                <!-- Post-->
                <article class="post">
                    <div class="post-preview"><img src="<?=base_url().$datum['information_image']?>" alt="article" class="img-fluid"></div>
                    <div class="post-wrapper">
                        <div class="post-header">
                            <h1 class="post-title"><?=$datum['information_title']?></h1>
                            <ul class="post-meta">
                            <ul class="post-meta">
                                <li>On <?=$datum['information_created_at']?></li>
                            </ul>
                        </div>
                        <div class="post-content">
                           <?=$datum['information_desc']?>
                        </div>
                    </div>
                </article>
                <!-- Post end-->
            </div>
            <div class="col-md-12 col-lg-4">
                <?php $this->load->view('fo/component/side-page.php')?>
            
            </div>
        </div>
    </div>
</section>