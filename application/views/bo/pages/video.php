
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading"> 
                <div class="input-group">
                    <input type="search" id="any" name="any" class="form-control" onkeyup="return cari(event, $(this).val())" placeholder="Tulis dan tekan enter">
                    <span class="input-group-btn">
                        <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
                        <button class="btn waves-effect waves-light btn-primary btn-add" onclick="add()" style="margin-left:10px;"><i class="fa fa-plus"></i></button>
                    </span>
                </div>
            </div> 
            <div class="panel-body"> 
                 <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="result-table">
                    </table>
                     <div id="pagination_link" class="text-right"></div>
                </div>

            </div> 
        </div>
    </div>
</div>
<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header noPadding">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_title"></h4>
            </div>
            <form id="form_input" class="form-input">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="param" id="param" value="add">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'link'; ?>
                                <label>Link</label>
                                <input type="text" name="<?= $label ?>" id="name" class="form-control">
                            </div>
                            <small style="display:block" class="form-text text-warning"><a href="https://support.google.com/youtube/answer/171780?hl=id" target="_blank">Tutorial YouTube Embed <i class="fa fa-external-link"></i></a?</small>
                            <blockquote>
                            <p>Contoh 1:</p>
                            <small style="display:block" class="form-text text-info"><code>&#x3C;iframe width=&#x22;560&#x22; height=&#x22;315&#x22; src=&#x22;<u>https://www.youtube.com/embed/Q-Q3Mu3dVM4</u>&#x22; title=&#x22;YouTube video player&#x22; frameborder=&#x22;0&#x22; allow=&#x22;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture&#x22; allowfullscreen&#x3E;&#x3C;/iframe&#x3E;</code></small>
                            <br>
                            <p class="form-text text-inverse">Silahkan Copy-Paste Url atau Link yang diberi garis bawah pada kolom isian.</p>
                            <p>Contoh 2:</p>
                            <small style="display:block" class="form-text text-info"><code>https://www.youtube.com/<u>watch?v=</u>Q-Q3Mu3dVM4</code></small>
                            <br>
                            <p class="form-text text-inverse">Jika Url atau Link yang di peroleh seperti pada contoh 2, ganti <code>watch?v=</code> dengan <code>embed/</code> agar menjadi seperti ini <code>https://www.youtube.com/<u>embed/</u>Q-Q3Mu3dVM4</code>lalu masukan pada kolom isian.</p>
                            </blockquote>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-12 no-padding">
                            <button type="submit" class="btn btn-primary bg-blue pull-right" id="simpan"
                                name="simpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" id="page">

<script type="text/javascript">
$(document).ready(function() {
    load_data(1, {});
}).on("click", ".pagination li a", function(event) {
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    var any = $("#any").val();
    if(page!==undefined) load_data(page, {any:any});
});
</script>
<script src="<?= base_url() . 'assets/' ?>js/pages/video.js" type="text/javascript"></script>
