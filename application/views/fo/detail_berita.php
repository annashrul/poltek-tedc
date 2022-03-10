<div class="module ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <!-- Post-->
                <article class="post">
                    <div class="post-preview"><img src="<?=base_url().$berita['information_image']?>" alt="article" class="img-fluid"></div>
                    <div class="post-wrapper">
                        <div class="post-header">
                            <h1 class="post-title"><?=$berita['information_title']?></h1>
                            <ul class="post-meta">
                                <li><a href="/">Beranda</a></li>
                                <li><a href="/berita">Berita</a></li>
                                <li><a href="#"><?=$berita['category_name']?></a></li>
                                <li><a href="#"><?=$berita['information_title']?></a></li>
                            </ul>
                            <ul class="post-meta">
                                <li> <?=$berita['information_created_at']?></li>
                            </ul>
                        </div>
                        <div class="post-content">
                           <?=$berita['information_desc']?>
                        </div>
                    </div>
                </article>
                <!-- Post end-->

            </div>
            <div class="col-lg-4 col-md-4">
                <?php $this->load->view('fo/component/side-berita.php')?>
            </div>
        </div>
    </div>
</div>