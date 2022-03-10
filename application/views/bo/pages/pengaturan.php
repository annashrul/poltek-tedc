
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-border panel-primary">
            <form id="form_input" class="form-input">
                <div class="panel-heading"> 
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <?php $label="name"; ?>
                                <label>Site Title</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['name']?>"/>
                                <input type="hidden" name="id" id="id" class="form-control" value="<?=$result['id']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label="email"; ?>
                                <label>E-mail</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['email']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label="phone"; ?>
                                <label>No.Telepon</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['phone']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label="address"; ?>
                                <label>Alamat</label>
                                <textarea type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" style="height: 339px;"><?=$result['address']?></textarea>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php $label="facebook"; ?>
                                <label>Facebook</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['facebook']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label="twitter"; ?>
                                <label>Twitter</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['twitter']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label="instagram"; ?>
                                <label>Instagram</label>
                                <input type="text" name="<?=$label?>" id="<?=$label?>" class="form-control" value="<?=$result['instagram']?>"/>
                            </div>
                            <div class="form-group">
                                <?php $label = 'file_upload'; ?>
                                <label>Gambar</label>
                                <input type="hidden" id="<?= $label ?>ed" name="<?= $label ?>ed" />
                                <input type="file" class="form-control" id="<?= $label ?>" name="<?= $label ?>"
                                    onchange="return ValidateFileUpload('file_upload')" accept="image/*">
                                <center><img style="width: 100%;height:303px;" src="<?= base_url() .'assets/no_image.png' ?>" id="result_image"></center>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="panel-body"> 
                    <button type="submit" class="btn btn-primary bg-blue pull-right" id="simpan" name="simpan">Simpan</button>
                </div> 
            </form>
        </div>
    </div>
</div>

<script>
    

$(document).ready(function(){
    var image = "<?=$result['logo']?>";
    console.log(image);
    $("#file_uploaded").val(image != ""? image: "");
    $("#result_image").attr("src",base_assets +(image != ""? image: "assets/no_image.png"));
})


$(`#form_input`).validate({
	rules: {
		name: {required: true},
		email: {required: true},
		phone: {required: true},
		address: {required: true},
		facebook: {required: true},
		twitter: {required: true},
		instagram: {required: true},
        // file_upload: { required: true, extension: "png|jpe?g|gif", filesize: 1048576,uploadFile:true,  }

	},
	errorPlacement: handleError(),
	submitHandler: function (form) {
		var myForm = document.getElementById("form_input");
		_ajax_file(
			`simpan`,
			new FormData(myForm),
			function (res) {
				if (res.status) {

					// load_data(1, {});
					notif("success");
                    setTimeout(() => {
                        location.reload();
                    }, 300);
				} else {
					notif("failed");
				}
			}
		);
	},
});
</script>