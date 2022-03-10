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
            <div class="col-md-12 col-lg-4">
                <div class="widget widget-categories">
                    <div class="widget-title">
                        <h6><?=$datum['program_name']?></h6>
                    </div>
                    <ul>
                    <?php 
                    $dat=$datum['program_name']==="Diploma IV (Sarjana Terapan)"?$d4:$d3;
                    foreach($dat as $item):?>
                        <li style="padding:7px 0 7px 15px;border-left:9px solid #EFF204"><a href="<?=base_url().'jurusan/get/'.$item['slug']?>"><?=$item['name']?> <span class="float-right"><i class="fa fa-arrow-right"></i></span></a>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="mt-5">
                    <div class="widget-title">
                        <h6>Menu Terkait</h6>
                    </div>
                    <div class="widget-content popular-posts">
                        <ul>
                            <li><a href="<?= base_url()?>page/kemahasiswaan">Kemahasiswaan</a></li>
                            <li><a href="<?= base_url()?>page/karir">Pusat Karir</a></li>
                            <li><a href="<?= base_url()?>page/beasiswa">Beasiswa</a></li>
                            <li><a href="<?= base_url()?>berita">Berita</a></li>
                        </ul>
                    </div>
                </div>
           
            </div>
    <div class="col-md-12 col-lg-8" style="padding-left: 50px;">

        <ul class="nav nav-tabs text-center" role="tablist" id="myTab">
            <li >
                <a href="#tab1" class="active" role="tab" data-toggle="tab">Profil</a>
            </li>
            <li>
                <a href="#tab2" role="tab" data-toggle="tab">Visi</a>
            </li>
            <li>
                <a href="#tab3" role="tab" data-toggle="tab">Misi</a>
            </li>
            <li>
                <a href="#tab4" role="tab" data-toggle="tab">Kompetensi Program Studi</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active show" id="tab1">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tr>
                                <th style="width:30%;background:#eee">Nama Program Studi</th>
                                <td><?=$datum['vocational_name']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Akreditasi</th>
                                <td><?=$datum['akreditasi']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">SK Penyelenggaraan</th>
                                <td><?=$datum['sk']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Tanggal Berdiri</th>
                                <td><?=$datum['tgl_berdiri']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Telepon</th>
                                <td><?=$datum['phone']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Email</th>
                                <td><?=$datum['email']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Website</th>
                                <td><?=$datum['vocational_link']?></td>
                            </tr>
                            <tr>
                                <th style="width:30%;background:#eee">Deskripsi</th>
                                <td><?=$datum['deskripsi']?></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#tab1 -->
            <div class="tab-pane fade" id="tab2">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h3 class="text-center">Visi</h3>
                        <p ><?=$datum['visi']?></p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#tab2 -->
            <div class="tab-pane fade" id="tab3">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h3 class="text-center">Misi</h3>
                        <p ><?=$datum['misi']?></p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#tab3 -->
            <div class="tab-pane fade" id="tab4">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h3 class="text-center">Kompetensi Program Studi</h3>
                        <p ><?=$datum['kompetensi']?></p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#tab4 -->
        </div>
        <!-- /.tab-content -->
            </div>
            
        </div>
    </div>
</section>