<?php $tab = [
    ["val"=>"Profile","key"=>"profile"],
    ["val"=>"About","key"=>"about"],
    ["val"=>"Footer_Kiri","key"=>"footer1"],
    ["val"=>"Footer_Tengah","key"=>"footer2"],
    ["val"=>"Footer_Kanan","key"=>"footer3"],
]; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <ul class="nav nav-tabs navtab-bg">
                    <li class="sectionTab active">
                        <a href="#section" data-toggle="tab" aria-expanded="false" onclick="changeTabTop('section')">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">section</span>
                        </a>
                    </li>
                    <li class="backgroundTab">
                        <a href="#background" data-toggle="tab" aria-expanded="true" onclick="changeTabTop('background')">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Background</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="sectionPage tab-pane active" id="section">
                        <div class="tabs-vertical-env">
                            <ul class="nav tabs-vertical">
                                <?php  foreach($result as $key=>$val): ?>
                                    <li class="tab-head <?=$key==0?'active':''?>">
                                        <a href="#<?=$val['id']?>" data-toggle="tab" aria-expanded="false" onclick="tabChange('<?=$key?>')"><?=$val["sidebar"]?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content" style="width:1000px">
                                <?php foreach($result as $key=>$val): ?>
                                    <div class="tab-pane <?=$key==0?'active':''?> " id="<?=$val['id']?>">
                                        <form method="post" action="<?=base_url('backoffice/master-konten/lainnya/simpan')?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" id="title_<?=$val['id']?>" class="form-control" value="<?=$val["title"]?>">
                                                <input type="hidden" name="id" id="id_<?=$val['id']?>" class="form-control" value="<?=$val["id"]?>">
                                            </div>
                                            <textarea name="desc" id="desc_<?=$val['id']?>" style="width:1000px"></textarea>
                                            <div class="form-group">
                                                <?php $label = 'file_upload'; ?>
                                                <label>Gambar</label>
                                                <input type="hidden" id="<?= $label ?>ed" name="<?= $label ?>ed<?=$val['id']?>" />
                                                <input type="file" class="form-control" id="<?= $label.'_'.$val['id'] ?>" name="<?= $label.''.$val["id"] ?>"
                                                       onchange="return ValidateFileUpload(`file_upload_<?=$val['id']?>`,`result_image_<?=$val['id']?>`)" accept="image/*">
                                                <img class="img-responsive" src="<?= base_url() .'assets/no_image.png' ?>" id="result_image_<?=$val['id']?>">
                                            </div>

                                            <button type="submit" class="btn btn-primary" style="float:right">Simpan</button>

                                        </form>
                                    </div>
                                <?php endforeach; ?>
                                <br/>
                                <!-- <button onclick="save()" class="btn btn-primary" style="float:right">Simpan</button> -->
                            </div>
                        </div>
                    </div>
                    <div class="backgroundPage tab-pane " id="background">
                        <form method="post" action="<?=base_url('backoffice/master-konten/lainnya/simpanBackground')?>" enctype="multipart/form-data">
                            <div class="row">
                                <?php foreach ($background as $val):?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php $label = strtolower(str_replace(' ','_',$val['title']));?>
                                            <label><?=$val['title']?></label>
                                            <input type="hidden" id="<?=$label?>ed" name="<?=$label?>ed" />
                                            <input type="file" class="form-control" id="<?= $label?>" name="<?=$label?>" accept="image/*"  onchange="return ValidateFileUpload(`<?=$label?>`,`result_image_<?=$label?>`)">
                                            <br>
                                            <img class="img-responsive" src="<?= base_url() .'assets/no_image.png' ?>" id="result_image_<?=$label?>">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="float:right">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="tabActive" id="tabActive">

<script>

    
    let arrayPush=<?=json_encode($result)?>;
    let arrayPushBg=<?=json_encode($background)?>;
    let actived=0;

    function setImg(val){
        $("#file_uploaded").val(arrayPush[val]["image"] != ""? arrayPush[val]["image"]: "");
        $("#result_image_"+arrayPush[val]["id"]).attr("src",base_assets +(arrayPush[val]["image"] != ""? arrayPush[val]["image"]: "assets/no_image.png"));
    }
    function changeTabTop(val){
        localStorage.setItem("topActive",val);
    }

    function setBg(){
        console.log(arrayPushBg);
        for(let i=0;i<arrayPushBg.length;i++){
            let title=arrayPushBg[i].title.replaceAll(' ','_').toLowerCase();
            console.log(`result_image_${title}`)
            $(`#${title}ed`).val(arrayPushBg[i]["image"] != ""? arrayPushBg[i]["image"]: "");
            $(`#result_image_${title}`).attr("src",base_assets +(arrayPushBg[i]["image"] != ""? arrayPushBg[i]["image"]: "assets/no_image.png"));
        }
    }


    $(document).ready(function(){
        let topActive= localStorage.getItem("topActive");
        if(topActive=='background'){
            $(".sectionTab").removeClass("active")
            $(".backgroundTab").addClass("active")
            $(".sectionPage").removeClass("active")
            $(".backgroundPage").addClass("active")
        }
        setTimeout(() => {
            for(let i=0;i < arrayPush.length; i++){
                CKEDITOR.replace("desc_"+arrayPush[i].id,{
                    height: '500px'
                });
            }
            tabChange(0);
            setImg(0);
            actived= 0;
            setBg();
        }, 400)


       
        
        
        
    })
    function tabChange(param){
        CKEDITOR.instances[`desc_${arrayPush[param]["id"]}`].setData(arrayPush[param]["desc"]);
        $("#tabActive").val(param);
        setImg(param);
        $("#form_input_"+param);
        reloadActived(param);
        
    }

    function reloadActived(param){
        actived= param;
        console.log(actived);
    }

     

    // function save(){
    //     var type=$("#tabActive").val();
    //     var desc = CKEDITOR.instances[`desc_${arrayPush[type]["id"]}`].getData();
    //     var title = $("#title_"+arrayPush[type]["id"]).val();
    //     var image = $("#file_upload")[0].files[0];
    //     console.log(image);
    //      _ajax_file("simpan",{desc:desc,title:title,file_upload:image},function(res){
    //         if (res.status) {
    //             CKEDITOR.instances[`desc_${arrayPush[type]["id"]}`].setData(desc);
    //             tabChange(type);
    //             notif("success");
    //         } else {
    //             notif("failed");
    //         }
    //     })
    // }
</script>