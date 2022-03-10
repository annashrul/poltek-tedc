<?php $menu = ['Visi_Misi', 'Profile_Lulusan', 'Capaian_Pembelajaran', 'Industri_Pengguna', 'Keunggulan']; ?>

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
                     
                </div>
                <div id="pagination_link" class="text-right"></div>

            </div> 
        </div>
    </div>
</div>
<div id="modal_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'id_program'; ?>
                                <label>Program</label>
                                <select name="<?=$label?>" id="<?=$label?>" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'name'; ?>
                                <label>Nama</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'akreditasi'; ?>
                                <label>Akreditasi</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'sk'; ?>
                                <label>SK</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'phone'; ?>
                                <label>Telepon</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'email'; ?>
                                <label>Email</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'website'; ?>
                                <label>Website</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'tgl_berdiri'; ?>
                                <label>Tanggal Berdiri</label>
                                <input type="date" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'visi'; ?>
                                <label>Visi</label>
                                <textarea name="<?=$label?>" id="<?=$label?>"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'misi'; ?>
                                <label>Misi</label>
                                <textarea name="<?=$label?>" id="<?=$label?>"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'deskripsi'; ?>
                                <label>Deskripsi</label>
                                <textarea name="<?=$label?>" id="<?=$label?>"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'kompetensi'; ?>
                                <label>Kompetensi</label>
                                <textarea name="<?=$label?>" id="<?=$label?>"></textarea>
                            </div>
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
    set_ckeditor("visi");
    set_ckeditor("misi");
    set_ckeditor("deskripsi");
    set_ckeditor("kompetensi");
}).on("click", ".pagination li a", function(event) {
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    var any = $("#any").val();
    if(page!==undefined) load_data(page, {any:any});
});

</script>
<script src="<?= base_url() . 'assets/' ?>js/pages/jurusan.js" type="text/javascript"></script>
