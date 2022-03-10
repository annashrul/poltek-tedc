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
            <div class="col-md-12 col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">File</th>
                        <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datum as $item):?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?=$item['information_title']?></td>
                            <td><a class="btn btn-primary btn-sm" href="<?=base_url().$item['information_image']?>" ><i class="fa fa-download"></i></a></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <div class="mt-5">
                    <?=$pagination_link?>
                </div>
            </div>
        </div>
    </div>
</section>