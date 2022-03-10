
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
                    <div class="row" id="result-table">
                        

                    </div>
                    
                 <div id="pagination_link" class="text-right"></div>

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
                                <?php $label = 'title'; ?>
                                <label>Nama</label>
                                <input type="text" name="<?= $label ?>" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'file_upload'; ?>
                                <label>Gambar</label>
                                <input type="hidden" id="<?= $label ?>ed" name="<?= $label ?>ed" />
                                <input type="file" class="form-control" id="<?= $label ?>" name="<?= $label ?>"
                                    onchange="return ValidateFileUpload('file_upload')" accept="image/*">
                                <center><img style="width: 100%;height:303px;" src="<?= base_url() .
                                    'assets/no_image.png' ?>" id="result_image"></center>
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
}).on("click", ".pagination li a", function(event) {
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    var any = $("#any").val();
    if(page!==undefined) load_data(page, {any:any});
});

</script>
<script src="<?= base_url() . 'assets/' ?>js/pages/partnership.js" type="text/javascript"></script>
