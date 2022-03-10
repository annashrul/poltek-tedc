 <div class="sidebar-right pl-4">
    <!-- Search widget-->
    <!-- Recent entries widget-->
    <aside class="widget widget-recent-entries-custom">
        <div class="widget-title">
            <h6>Berita Terbaru</h6>
        </div>
        <ul>
            <?php foreach($side_berita as $item):?>
            <li class="clearfix">
                <div class="wi"><a href="<?=base_url().'berita/post/'.$item['information_slug']?>"><img src="<?=base_url().$item['information_image']?>" alt="recent post" class="img-fluid rounded"></a></div>
                <div class="wb"><a href="<?=base_url().'berita/post/'.$item['information_slug']?>"><?=$item['information_title']?></a><span class="post-date"><?=$item['information_created_at']?></span></div>
            </li>
            <?php endforeach?>

        </ul>
    </aside>
    <aside class="widget widget-recent-entries-custom">
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
    </aside>
</div>