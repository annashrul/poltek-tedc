<!-- ========== Left Sidebar Start ========== -->
<style>
.slimScrollBar {
    background: black !important;
    width: 20px !important;
}
</style>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= base_url() .'backoffice/dashboard' ?>" class="waves-effect <?= $page =='dashboard'? 'active': null ?>">
                        <i class="ion ion-stats-bars"></i><span> Dashboard </span>
                    </a>
                </li>
                <li class="has_sub">
                    <?php
                    $side_menu = null;
                    $side_menu = ['0','berita','karir','beasiswa','kemahasiswaan','testimoni','partnership','slider','video','lainnya'];
                    ?>
                    <a href="#" class="waves-effect <?= array_search($page,$side_menu)? 'active': null ?>">
                        <i class="md md-view-list"></i><span>Master Konten</span><span class="pull-right"><i class="md md-add"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <?php
                        unset($side_menu[0]);
                        foreach ($side_menu as $val): ?>
                            <li class="<?= $val == $page? 'active': null ?>">
                                <a href="<?= base_url() .'backoffice/master-konten/' .$val ?>"><?= $val ?></a>
                            </li>
                        <?php endforeach;
                        ?>
                    </ul>
                </li>
                <li class="has_sub">
                    <?php
                    $side_menu = null;
                    $side_menu = ['0','jabatan','dosen','program','jurusan','ormawa','fasilitas'];
                    ?>
                    <a href="#" class="waves-effect <?= array_search($page,$side_menu)? 'active': null ?>">
                        <i class="md md-dashboard"></i><span>Master Data</span><span class="pull-right"><i class="md md-add"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <?php unset($side_menu[0]); foreach ($side_menu as $val): ?>
                            <li class="<?= $val == $page? 'active': null ?>">
                                <a href="<?= base_url() .'backoffice/master-data/' .$val ?>"><?= $val ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() .'backoffice/files' ?>" class="waves-effect <?= $page =='files'? 'active': null ?>">
                        <i class="md md-insert-drive-file"></i><span> Manajemen Files </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() .'backoffice/profile' ?>" class="waves-effect <?= $page =='profile'? 'active': null ?>">
                        <i class="md md-people"></i><span> Profile </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() .'backoffice/pengaturan' ?>" class="waves-effect <?= $page =='pengaturan'? 'active': null ?>">
                        <i class="md md-settings"></i><span> Pengaturan </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() .'backoffice/auth/logout' ?>" class="waves-effect">
                        <i class="md md-settings-power"></i><span> Keluar </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->