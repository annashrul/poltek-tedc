<div class="row">
    <div class="col-md-4">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <form id="form_input">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="<?=$result['username']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password <small style="color:red">kosongkan apabila tidak akan diubah</small></label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="konfirmasi_password">
                    </div>
                    <button class="btn btn-primary " style="float: right">Simpan</button>
                </form>
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
</div>

<script>
    $(`#form_input`).validate({
        rules: {
            username: {required: true},
            password : {
                minlength : 5,
            },
            konfirmasi_password : {
                minlength : 5,
                equalTo : "#password"
            }
        },
        ignore: [],
        errorPlacement: handleError(),
        submitHandler: function (form) {
            var myForm = document.getElementById("form_input");
            _ajax_file(
                `simpan`,
                new FormData(myForm),
                function (res) {
                    if (res.status) {
                        notif("success");
                        setTimeout(function(){
                            window.location.href="<?=base_url().'backoffice/auth/logout'?>";
                        },300)
                    } else {
                        notif("failed");
                    }
                }
            );
        },
    });
</script>