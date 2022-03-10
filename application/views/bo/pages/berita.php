<style>

/* Cards */
.postcard {
  flex-wrap: wrap;
  display: flex;
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;
}

.postcard.light {
  background-color: white;
}
.postcard .t-dark {
  color: #18151f;
}
.postcard a {
  color: inherit;
}
.postcard h1,
.postcard .h1 {
  margin-bottom: 0.5rem;
  font-weight: 500;
  line-height: 1.2;
}
.postcard .small {
  font-size: 80%;
}
.postcard .postcard__title {
  font-size: 1.75rem;
}
.postcard .postcard__img {
  max-height: 180px;
  width: 100%;
  object-fit: cover;
  position: relative;
}
.postcard .postcard__img_link {
  display: contents;
}
.postcard .postcard__bar {
  width: 50px;
  height: 10px;
  margin: 10px 0;
  border-radius: 5px;
  background-color: #424242;
  transition: width 0.2s ease;
}
.postcard .postcard__text {
  padding: 1.5rem;
  position: relative;
  display: flex;
  flex-direction: column;
}
.postcard .postcard__preview-txt {
  overflow: hidden;
  text-overflow: ellipsis;
  text-align: justify;
  height: 100%;
}
.postcard .postcard__tagbox {
  display: flex;
  flex-flow: row wrap;
  font-size: 14px;
  margin: 20px 0 0 0;
  padding: 0;
  justify-content: center;
}
.postcard .postcard__tagbox .tag__item {
  display: inline-block;
  background: rgba(83, 83, 83, 0.4);
  border-radius: 3px;
  padding: 2.5px 10px;
  margin: 0 5px 5px 0;
  cursor: default;
  user-select: none;
  transition: background-color 0.3s;
}
.postcard .postcard__tagbox .tag__item:hover {
  background: rgba(83, 83, 83, 0.8);
}
.postcard:before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: linear-gradient(-70deg, #424242, transparent 50%);
  opacity: 1;
  border-radius: 10px;
}
.postcard:hover .postcard__bar {
  width: 100px;
}

@media screen and (min-width: 769px) {
  .postcard {
    flex-wrap: inherit;
  }
  .postcard .postcard__title {
    font-size: 2rem;
  }
  .postcard .postcard__tagbox {
    justify-content: start;
  }
  .postcard .postcard__img {
    max-width: 300px;
    max-height: 100%;
    transition: transform 0.3s ease;
  }
  .postcard .postcard__text {
    padding: 3rem;
    width: 100%;
  }
  .postcard .media.postcard__text:before {
    content: "";
    position: absolute;
    display: block;
    background: #18151f;
    top: -20%;
    height: 130%;
    width: 55px;
  }
  .postcard:hover .postcard__img {
    transform: scale(1.1);
  }
  .postcard:nth-child(2n+1) {
    flex-direction: row;
  }
  .postcard:nth-child(2n+0) {
    flex-direction: row-reverse;
  }
  .postcard:nth-child(2n+1) .postcard__text::before {
    left: -30px !important;
    transform: rotate(0deg);
  }
  .postcard:nth-child(2n+0) .postcard__text::before {
    right: -30px !important;
    transform: rotate(-1deg);
  }
}
@media screen and (min-width: 1024px) {
  .postcard__text {
    padding: 2rem 3.5rem;
  }

  .postcard__text:before {
    content: "";
    position: absolute;
    display: block;
    top: -20%;
    height: 130%;
    width: 55px;
  }

  .postcard.dark .postcard__text:before {
    background: #18151f;
  }

 
}
/* COLORS */
.postcard .postcard__tagbox .green.play:hover {
  background: #79dd09;
  color: black;
}

.green .postcard__title:hover {
  color: #79dd09;
}

.green .postcard__bar {
  background-color: #79dd09;
}

.green::before {
  background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}

.green:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
}

.postcard .postcard__tagbox .blue.play:hover {
  background: #0076bd;
}

.blue .postcard__title:hover {
  color: #0076bd;
}

.blue .postcard__bar {
  background-color: #0076bd;
}

.blue::before {
  background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}

.blue:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
}

.postcard .postcard__tagbox .red.play:hover {
  background: #bd150b;
}

.red .postcard__title:hover {
  color: #bd150b;
}

.red .postcard__bar {
  background-color: #bd150b;
}

.red::before {
  background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}

.red:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
}

.postcard .postcard__tagbox .yellow.play:hover {
  background: #bdbb49;
  color: black;
}

.yellow .postcard__title:hover {
  color: #bdbb49;
}

.yellow .postcard__bar {
  background-color: #bdbb49;
}

.yellow::before {
  background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}

.yellow:nth-child(2n)::before {
  background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
}

@media screen and (min-width: 769px) {
  .green::before {
    background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .green:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
  }

  .blue::before {
    background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .blue:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
  }

  .red::before {
    background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .red:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
  }

  .yellow::before {
    background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }

  .yellow:nth-child(2n)::before {
    background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
  }
}
@import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
</style>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            
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
                <section class="light" id="result-table">
                </section>
                <div id="pagination_link" class="text-right"></div>
            </div> 
        </div>
    </div>
     <div class="col-md-3">
        <div class="panel panel-default panel-border">
            <div class="panel-heading"> 
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title">Filter Berita         
                    </div>
                    <div class="col-md-2">
                        <button class="btn waves-effect waves-light btn-primary btn-sm" onclick="showModal('Berita')"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div> 
            <div class="panel-body" id="result-category"> 
                
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
                                <label>Judul</label>
                                <input type="text" name="<?= $label ?>" id="<?= $label ?>" class="form-control">
                            </div>
                        </div>
                         <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'id_category'; ?>
                                <label>Kategori</label>
                                <select name="<?=$label?>" id="<?=$label?>" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php $label = 'status'; ?>
                                <label>Status</label>
                                <select name="<?=$label?>" id="<?=$label?>" class="form-control">
                                    <option value="0">Aktif</option>
                                    <option value="0">TidakAktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php $label = 'desc'; ?>
                                <label>Deskripsi</label>
                                <textarea name="<?= $label ?>" id="<?=$label?>" class="form-control" rows="5" cols="50"></textarea>
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


<?php $this->load->view("bo/pages/modals/informasi/form-kategori",array("id"=>3,"name"=>"Berita"));?>
<script type="text/javascript">
$(document).ready(function() {
    load_data(1, {});
    load_category("Berita");
    set_ckeditor("desc");
}).on("click", ".pagination li a", function(event) {
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    var any = $("#any").val();
    if(page!==undefined) load_data(page, {any:any});
});

function loadData(e,val){
    load_data(1, {any:val});
}
</script>
<script src="<?= base_url() . 'assets/' ?>js/pages/berita.js" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/' ?>js/pages/kategori.js" type="text/javascript"></script>
