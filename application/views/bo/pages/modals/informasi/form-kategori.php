<div id="modal_form_kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header noPadding">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_title_kategori"></h4>
            </div>
            <form id="form_input_kategori">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_kategori">
                        <input type="hidden" name="type_id" id="type_id" value="<?=$id?>">    
                        <input type="hidden" name="type_name" id="type_name" value="<?=$name?>">
                        <input type="hidden" name="param" id="param_kategori" value="add">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'name'; ?>
                                <label>Nama</label>
                                <input type="text" name="<?= $label ?>" id="name_kategori" class="form-control">
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

<script src="<?= base_url() .
    'assets/' ?>js/pages/kategori.js" type="text/javascript"></script>