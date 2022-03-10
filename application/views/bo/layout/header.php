<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $site['name'] ?> - <?= $title ?>">
    <meta name="author" content="annashrul yusuf">

    <link rel="shortcut icon" href="<?= base_url() .
        'assets/' ?>images/favicon_1.ico">

    <title><?= $site['name'] ?> - <?= $title ?></title>
    <title style="display: none;"><?= $site['name'] ?> - <?= $title ?></title>
    <!-- Base Css Files -->
    <link href="<?= base_url() .
        'assets/' ?>css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() .
        'assets/' ?>plugin/jvectormap/jquery-jvectormap-1.2.2.css">

    <!-- Font Face -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@400&display=swap" rel="stylesheet">


    <!-- <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet"> -->
    <!-- Font Icons -->
    <link href="<?= base_url() .
        'assets/' ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url() .
        'assets/' ?>assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() .
        'assets/' ?>css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- animate css -->
    <link href="<?= base_url() .
        'assets/' ?>css/animate.css" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="<?= base_url() .
        'assets/' ?>css/waves-effect.css" rel="stylesheet">

    <!-- Custom Files -->
    <link href="<?= base_url() .
        'assets/' ?>css/helper.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() .
        'assets/' ?>css/style.css" rel="stylesheet" type="text/css" />
    <!--Swal2-->
    <link href="<?= base_url() .
        'assets/plugin/' ?>sweetalert2/sweetalert2-1.3.3.min.css" rel="stylesheet">
    <link href="<?= base_url() .
        'assets/plugin/' ?>sweetalert2/sweetalert2-0.4.5.css" rel="stylesheet">
    <link href="<?= base_url() .
        'assets/' ?>assets/select2/select2.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() .
        'assets/' ?>assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="<?= base_url() .
        'assets/' ?>assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <!--venobox lightbox-->
    <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>assets/magnific-popup/magnific-popup.css"/>
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <script src="<?= base_url() . 'assets/' ?>js/modernizr.min.js"></script>
    <!-- jQuery  -->
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyDqD1Z03FoLnIGJTbpAgRvjcchrR-NiICk&libraries=places&sensor=false">
    </script>
    <script src="<?= base_url() . 'assets/' ?>js/jquery.min.js"></script>
    <script src="<?= base_url() .
        'assets/' ?>plugin/jQuery-autocomplete/jquery.autocomplete.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <script src="<?= base_url() . 'assets/' ?>js/bootstrap.min.js"></script>
    <!-- Form Validation -->
    <script src="<?= base_url() .
        'assets/' ?>assets/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?= base_url() .
        'assets/plugin/' ?>jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() .
        'assets/plugin/' ?>jquery-validation/additional-methods.min.js"></script>
    <!--Swal2-->
    <script src="<?= base_url() .'assets/plugin/' ?>sweetalert2/sweetalert2-1.3.3.min.js"></script>
    <!--Price-Format-->
    <script src="<?= base_url() .
        'assets/plugin/' ?>price-format/jquery.price_format.js"></script>
    <script src="<?= base_url() .
        'assets/plugin/' ?>price-format/jquery.price_format.min.js"></script>
    <script src="<?= base_url() .
        'assets/plugin/' ?>ckeditor/ckeditor.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

    <script type="text/javascript" src="<?=base_url().'assets/'?>assets/magnific-popup/magnific-popup.js"></script> 

    <style>
    input.form-control,
    select {
        /* height: 35px; */
    }
    .content-page{
        min-height:500px !important;
    }
    .modal-content {
        border: 5px solid #1e88e5 !important;
        border-radius:20px;
      }
     

      .dropdown-position{
          z-index: 99 !important;
          /* position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(336px, 290px, 0px); */
      }


    ul.myErrorClass,
    input.myErrorClass,
    textarea.myErrorClass,
    select.myErrorClass {
        border-width: 1px !important;
        border-style: solid !important;
        background-position: 50% 50% !important;
        background-repeat: repeat !important;
    }

    label.myErrorClass {
        color: red;
        font-size: 11px;
        /*    font-style: italic;*/
        display: block;
    }


    .select2-container .select2-choice {
        display: block !important;
        height: 36px !important;
        white-space: nowrap !important;
        line-height: 26px !important;
    }

    html {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
    }
.highcharts-title,
tspan,text,
body.cke_editable,
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
    font-family: 'Signika Negative', sans-serif;
    font-weight: 600;
    }

    ::-webkit-input-placeholder {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
    }

    ::-moz-placeholder {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
    }

    :-ms-input-placeholder {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
    }

    :-moz-placeholder {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
    }

    .form-control {
        font-family: 'Signika Negative', sans-serif;
        font-weight: 600;
        border: 1px solid #ccc !important;
    }

    input.form-lg {
        height: 40px !important;
        border: 1px solid #ccc !important;
    }

    .no-padding {
        padding: 0px 0px 0px 0px;
    }

    .pagination>li>a {
        padding: 6px 12px;
        color: #000000;
        font-size: 16px;
        font-weight: bold;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        margin: 0 3px;
    }

    .pagination>.active>a {
        color: #000000;
        font-weight: bold;
        background-color: #ffffff;
        border: 1px solid #dddddd;
    }

    .pagination>li:first-child>a {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }

    .pagination>li:last-child>a {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .pagination>li>a:hover,
    .pagination>li>a:focus {
        color: #ffffff;
        background-color: #0073b7 !important;
        border-color: #0073b7 !important;
    }

    .pagination>.active>a,
    .pagination>.active>a:hover,
    .pagination>.active>a:focus {
        color: #ffffff;
        background-color: #0073b7 !important;
        border-color: #0073b7 !important;
        z-index: -0 !important;
    }

    .pagination>.disabled>a,
    .pagination>.disabled>a:hover,
    .pagination>.disabled>a:focus {
        color: #777777;
        background-color: #ffffff;
        border-color: #dddddd;

    }

    /*Scrollbar*/
    /* .scrollbar{
            width: 100%;
            height: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .scrollbar::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 0px;
            background-color: #F5F5F5;
        }
        .scrollbar::-webkit-scrollbar {
            width: 0px;
            background-color: #F5F5F5;
        }
        .scrollbar::-webkit-scrollbar-thumb {
            border-radius: 0px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: rgba(0, 151, 167, 1);
        } */
    /*Loading*/
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

    /*.topbar-left {
				 background: #fffa56 !important;
			 }*/


    /* @media only screen and (max-width: 600px) {
            .logo-top-bar {
                margin-left: 300%;
            }
        } */
    #nprogress .bar {
        background: #FFBB00 !important;
    }

    #nprogress .peg {
        box-shadow: 0 0 10px #FFBB00, 0 0 5px #FFBB00;
    }

    #nprogress .spinner-icon {
        border-top-color: #FFBB00;
        border-left-color: #FFBB00;
    }
    table td {
        white-space: nowrap !important;
        vertical-align:middle !important;
    }
     table th {
        white-space: nowrap !important;
        vertical-align:middle !important;
    }
    </style>

</head>
<script>
var img_loader = '<img src="<?= base_url() . 'assets/spin.svg' ?>">';

var base_controller = "<?=base_url().'backoffice/'?>";
var base_url = "<?= base_url() . $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/' ?>";
var base_assets = "<?= base_url() . '/' ?>";




function camelCase(str, sparator = "_") {
    // console.log(str.replaceAll("_", ""));
    var txt = str.replaceAll(sparator, "")
    return txt.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
        return index == 0 ? word.toLowerCase() : word.toUpperCase();
    }).replace(/\s+/g, '');
}

function ValidateFileUpload(selector,res="result_image") {
    var fuData = document.getElementById(selector);
    var FileUploadPath = fuData.value;
    var valid = 1;
    $(`#alr_${selector}`).text("");
    if (FileUploadPath == '') {} else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension ==
            "jpg") {
            if (fuData.files && fuData.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#'+res).attr('src', e.target.result);
                };
                reader.readAsDataURL(fuData.files[0]);
            }
        }
    }
    return valid;
}

function handleError() {
    return function(error, element) {
        // return error.insertBefore(element);
        if (element.attr("name") == "desc") {
            return error.insertBefore("textarea#desc");
        } else {
            return error.insertBefore(element);
        }
        // if (element.hasClass('select2') && element.next('.select2-container').length) {
        //     error.insertAfter(element.next('.select2-container'));
        // } else {
        //     var placement = $(element).data('error');
        //     if (placement) {
        //         return $(placement).append(error)
        //     } else {
        //         return error.insertAfter(element);
        //     }
        // }

    }

}

function _ajax_file(url, req = null, func_req) {
    NProgress.configure({
        showSpinner: false
    });
    $.ajax({
        url: base_url + url,
        type: "POST",
        dataType: "JSON",
        data: req ? req : null,
        mimeType: "multipart/form-data",
        contentType: false,
        processData: false,
        beforeSend: function() {
           
            // NProgress.start();
            $('body').append('<div class="first-loader">' + img_loader + '</div>')
        },
        complete: function() {
            // NProgress.done();
            // NProgress.remove();
            $('.first-loader').remove()
        },
        success: func_req,
        error: function(xhr, ajaxOptions, thrownError) {
            // NProgress.done();
            // NProgress.remove();
            swal({
                title: 'Error',
                text: "Terjadi kesalahan server",
                type: 'warning',
                confirmButtonColor: '#ff0000',
                confirmButtonText: 'Oke',
            })
        }
    });
    return;
}

function notif(type = "success") {
    if (type === "success") {
        return swal({
            type: 'success',
            title: 'Berhasil!',
            text: 'Data Berhasil Disimpan'
        });
    } else if (type === "failed") {
        return swal({
            type: 'warning',
            title: 'Terjadi Kesalahan!',
            text: 'Data Gagal Disimpan'
        });
    } else if (type === "error") {
        swal({
            title: 'Error',
            text: "Terjadi Kesalahan",
            type: 'warning',
            confirmButtonColor: '#ff0000',
            confirmButtonText: 'Oke',
        })
    }

}

function _ajax(url, req = null, func_req,isUrl=true) {
    NProgress.configure({
        showSpinner: true
    });
    let uri=url.split("/")[7];
    console.log(uri)
    console.log(base_url)
    $.ajax({
        url: isUrl?base_url + url:url,
        type: "POST",
        dataType: "JSON",
        data: req ? req : null,
        beforeSend: function() {
            if(uri=="simpan"||uri=="edit"||uri=="hapus"){
                
                $('body').append('<div class="first-loader">' + img_loader + '</div>')
            }
            else{
                NProgress.start();
            }
            
        },
        complete: function() {
             if(uri=="simpan"||uri=="edit"||uri=="hapus"){
                
                $('.first-loader').remove()
            }
            else{
                 NProgress.done();
                NProgress.remove();
            }
            
            
        },
        success: func_req,
        error: function(xhr, ajaxOptions, thrownError) {
            NProgress.done();
            NProgress.remove();
            swal({
                title: 'Error',
                text: xhr.responseText,
                type: 'warning',
                confirmButtonColor: '#ff0000',
                confirmButtonText: 'Oke',
            })
        }
    });
    return;
}

</script>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">