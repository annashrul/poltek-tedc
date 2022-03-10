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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a href="<?=base_url().'jurusan/get/'.$item['vocational_slug']?>">
                        <div class="box-part text-center"  style="min-height:350px">
                            
                            <img src="<?=base_url()."assets/fo/images/Logo%20Poltek.png"?>" width="20%"/>
                            
                            <div class="title">
                                <h4 style="margin-bottom:1px"><?=$item['vocational_name']?></h4>
                                <h6 style="color:#5b5858"><?=$item['program_name']?></h6>
                            </div>
                            
                            <div class="text" style="color:#5b5858">
                                <span><?=strlen($item['deskripsi'])>150?substr(strip_tags($item['deskripsi']),0,150):$item['deskripsi']?>...</span>
                            </div>
                            
                            Lihat Profil
                            
                        </div>
                    </a>
				</div>	 
            <?php endforeach?>
        </div>
    </div>
</section>