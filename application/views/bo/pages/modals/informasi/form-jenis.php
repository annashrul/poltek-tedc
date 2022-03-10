<div id="modal_form_jenis_informasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header noPadding">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_title_jenis_informasi"></h4>
            </div>
            <form id="form_input_jenis_informasi">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_jenis_informasi">
                        <input type="hidden" name="param" id="param_jenis_informasi" value="add">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'name'; ?>
                                <label>Nama</label>
                                <input type="text" name="<?= $label ?>" id="name_jenis_informasi" class="form-control">
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
    'assets/' ?>js/pages/informasi/jenis.js" type="text/javascript"></script>