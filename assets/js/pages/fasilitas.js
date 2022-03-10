

function load_jurusan() {
	_ajax(base_controller+"master-data/jurusan/get_option", {id:null}, function (res) {
        $("#id_vocational").html(res.output)
	},false);
}



function load_data(page, data = {}) {
	_ajax("read/" + page, data, function (res) {
		$("#result-table").html(res.result_table);
		$("#pagination_link").html(res.pagination_link);
	});
}

function add() {
	$("#modal_title").text(`Tambah Fasilitas`);
	$("#param").val("add");
	$("#modal_form").modal("show");
	$("#form_input").trigger("reset");
    load_jurusan();
}

$(`#form_input`).validate({
	rules: {
		name: {
			required: true,
			remote: {
				url: base_url + `check_column`,
				type: "post",
				data: {
					param: function () {
						return $("#param").val();
					},
				},
			},
		},
		id_vocational:{
			required:true
		}
	},
	
	errorPlacement: handleError(),
	submitHandler: function (form) {
        var myForm = document.getElementById("form_input");
		_ajax_file(
			`simpan`,
			new FormData(myForm),
			function (res) {
				if (res.status) {
					load_data(1, {});
					notif("success");
					$(`#modal_form`).modal("hide");
					$(`#form_input`)[0].reset();
					$("#param").val("add");
				} else {
					notif("failed");
				}
			}
		);
	},
});
function edit(id) {
    load_jurusan();
	_ajax(`edit`, { id: id }, function (res) {
		if (res.status) {
			$(`#modal_form`).modal("show");
			$("#modal_title").text(`Edit Fasilitas`);
			$("#param").val("edit");
			$("#id").val(res.res_data["id"]);
			$("#name").val(res.res_data["name"]);
			$("#link").val(res.res_data["link"]);
			$("#file_uploaded").val(res.res_data["image"] != ""? res.res_data["image"]: "");
			$("#result_image").attr("src",base_assets +(res.res_data["image"] != ""? res.res_data["image"]: "assets/no_image.png"));
            setTimeout(function () {
                $("#id_vocational").val(res.res_data["id_vocational"]);
	        }, 600);
		} else {
			notif("failed");
		}
	});
}
function hapus(id) {
	swal({
		title: "Anda yakin akan hapus data ini?",
		text: "Data yang dihapus tidak bisa dikembalikan lagi",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya !",
		cancelButtonText: "Tidak !",
		closeOnConfirm: false,
	}).then(function (isConfirm) {
		if (isConfirm) {
			_ajax(`hapus`, { id: id }, function (res) {
				if (res.status) {
					load_data(1, {});
					notif("success");
				} else {
					notif("failed");
				}
			});
		}
	});
}
function cari(e, val) {
	if (e.keyCode == 13) {
		load_data(1,{search: true,any: val});
	}
}
$(`#modal_form`).on("hide.bs.modal", function () {
	$(`.form-input`)[0].reset();
	$(`.form-input`).validate().resetForm();
});