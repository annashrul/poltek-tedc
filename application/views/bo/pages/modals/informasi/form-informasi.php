<div id="modal_form_daftar_informasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header noPadding">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_title_daftar_informasi">Modal Content is Responsive</h4>
            </div>
            <form id="form_input_daftar_informasi">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_daftar_informasi">
                        <input type="hidden" name="param" id="param_daftar_informasi" value="add">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php $label = 'title'; ?>
                                <label>Judul</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'id_information_type'; ?>
                                <label>Tipe</label>
                                <select name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'id_information_category'; ?>
                                <label>Kategori</label>
                                <select name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                                    
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php $label = 'status'; ?>
                                <label>Status</label>
                                <select name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                                    <option value="0">Aktif</option>
                                    <option value="1">Tidak Aktif</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="desc" class="form-control" id="desc"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
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

<script src="<?= base_url() .
    'assets/' ?>js/pages/informasi/daftar-informasi.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    set_ckeditor("desc");
    // $("#id_information_category").select2({
    //     placeholder: "Pilih",
    //     allowClear: true,
    //     width: "100%",
    // });
    // $("#id_information_type").select2({
    //     placeholder: "Pilih",
    //     allowClear: true,
    //     width: "100%",
    // });
})

</script>