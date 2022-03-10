 <div class="sidebar-right pl-4">
    <!-- Search widget-->
    <aside class="widget widget-search">
        <form>
            <input class="form-control" id="search-input" type="search" placeholder="Type Search Words" value="<?=$this->input->get('q', TRUE);?>">
            <button class="search-button" id="search-button" type="submit"><span class="ti-search"></span></button>
        </form>
    </aside>
    <!-- Categories widget-->
    <aside class="widget widget-categories">
        <div class="widget-title">
            <h6>Kategori</h6>
        </div>
        <ul>
            <?php foreach($category as $item):?>
            <li><a href="<?=base_url().'berita/cat/'.$item['category_name']?>"><?=$item['category_name']?> <span class="float-right"><?=$item['count_information']?></span></a></li>
            <?php endforeach?>
        </ul>
    </aside>
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
<script>
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");

    searchInput.addEventListener("keyup", function(event) {
        let searchParams = new URLSearchParams(window.location.search);

        searchParams.set("q", event.target.value);

        if (window.history.replaceState) {
            const url = window.location.protocol 
                        + "//" + window.location.host 
                        + window.location.pathname 
                        + "?" 
                        + searchParams.toString();

            window.history.replaceState({
                path: url
            }, "", url)
        }
    });
    searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        let searchParams = new URLSearchParams(window.location.search);

            searchParams.set("q", event.target.value);

                const url = window.location.protocol 
                            + "//" + window.location.host 
                            + window.location.pathname 
                            + "?" 
                            + searchParams.toString();
            window.location=url;
        }
    });
    searchButton.addEventListener('click', function (e) {
        e.preventDefault();
        let searchParams = new URLSearchParams(window.location.search);
        searchParams.set("q", searchInput.value);
            const url = window.location.protocol 
                        + "//" + window.location.host 
                        + window.location.pathname 
                        + "?" 
                        + searchParams.toString();
        window.location=url;
    });

</script>