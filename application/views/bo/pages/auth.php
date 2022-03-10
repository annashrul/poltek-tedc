<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Login</title>

        <!-- Base Css Files -->
        <link href="<?=base_url().'assets/'?>css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Icons -->
        <link href="<?=base_url().'assets/'?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?=base_url().'assets/'?>assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?=base_url().'assets/'?>css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?=base_url().'assets/'?>css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url().'assets/'?>css/style.css" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
        <!--Swal2-->
        <link href="<?= base_url() .'assets/plugin/' ?>sweetalert2/sweetalert2-1.3.3.min.css" rel="stylesheet">
        <link href="<?= base_url() .'assets/plugin/' ?>sweetalert2/sweetalert2-0.4.5.css" rel="stylesheet">
        <style>
            body,
            span,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            label {
                font-family: 'Open Sans', sans-serif;
            }

            ::-webkit-input-placeholder {
                font-family: 'Open Sans', sans-serif;
            }

            ::-moz-placeholder {
                font-family: 'Open Sans', sans-serif;
            }

            :-ms-input-placeholder {
                font-family: 'Open Sans', sans-serif;
            }

            :-moz-placeholder {
                font-family: 'Open Sans', sans-serif;
            }

            .form-control {
                font-family: 'Open Sans', sans-serif;
                border: 1px solid #ccc !important;
            }
             .first-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1050;
                background: rgba(168, 168, 168, .5)
            }

            .first-loader img {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                width: 60px;
                height: 60px
            }
        </style>
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> <strong>Politeknik TEDC Bandung</strong> </h3>
                </div> 
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" id="form-login">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control input-lg " type="text" required="" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" type="password" required="" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form> 
                </div>                                 
            </div>
        </div>
    	<script src="<?=base_url().'assets/'?>js/jquery.min.js"></script>
        <script src="<?=base_url().'assets/'?>js/bootstrap.min.js"></script>
        <script src="<?= base_url() .'assets/plugin/' ?>jquery-validation/jquery.validate.min.js"></script>
        <script src="<?= base_url() .'assets/plugin/' ?>jquery-validation/additional-methods.min.js"></script>
         <!--Swal2-->
        <script src="<?= base_url() .'assets/plugin/' ?>sweetalert2/sweetalert2-1.3.3.min.js"></script>
        <script>
            $(`#form-login`).validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    username: {
                        required: "username tidak boleh kosong",
                    },
                    password: {
                        required: "password tidak boleh kosong",
                    },
                },
                errorElement: "div",
                errorPlacement:function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        return $(placement).append(error)
                    } else {
                        return error.insertAfter(element);
                    }

                },
                submitHandler: function (form) {
                    var img_loader = '<img src="<?= base_url() . 'assets/spin.svg' ?>">';
                    $.ajax({
                        url:"<?=base_url().'backoffice/auth/login'?>",
                        type:"POST",
                        dataType:"JSON",
                        data:$(`#form-login`).serialize(),
                        beforeSend: function() {
                            $('body').append('<div class="first-loader">' + img_loader + '</div>')
                        },
                        complete: function() {
                            $('.first-loader').remove()
                        },
                        success:function(res){
                            console.log(res);
                            if(res.status){
                                window.location.href="<?=base_url().'backoffice/dashboard'?>"
                            }
                            else{
                                swal({
                                    title: 'Error',
                                    text: res.message,
                                    type: 'warning',
                                    confirmButtonColor: '#ff0000',
                                    confirmButtonText: 'Oke',
                                })
                            }
                        }
                    })
                    // _ajax(
                    //     `simpan`,
                    //     $(`#form_input`).serialize(),
                    //     function (res) {
                    //         if (res.status) {
                    //             load_data(1, {});
                    //             notif("success");
                    //             $(`#modal_form`).modal("hide");
                    //             $(`#form_input`)[0].reset();
                    //             $("#param").val("add");
                    //         } else {
                    //             notif("failed");
                    //         }
                    //     }
                    // );
                },
            });
        </script>
	</body>
</html>