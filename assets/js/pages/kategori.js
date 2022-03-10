
function load_category(param) {
	_ajax(base_controller+"master-konten/kategori/read/"+param, null, function (res) {
        $("#result-category").html(res.output)
	},false);
}
function showModal(param,id) {
	$("#modal_title_kategori").text(`Tambah Kategori ${param}`);
	$("#param_kategori").val("add");
	$("#type_name").val(param);
	$("#modal_form_kategori").modal("show");
	$("#form_input_kategori").trigger("reset");
}
$(`#form_input_kategori`).validate({
	rules: {
		name: {
			required: true,
			remote: {
				url: base_controller+"master-konten/kategori/check_column",
				type: "post",
				data: {
					param: function () {
						return $("#param_kategori").val();
					},
                    type_name: function () {
						return $("#type_name").val();
					},
				},
			},
		},
	},
	errorPlacement: handleError(),
	submitHandler: function (form) {
		_ajax(
			base_controller+"master-konten/kategori/simpan",
			$(`#form_input_kategori`).serialize(),
			function (res) {
				if (res.status) {
					load_category($("#type_name").val());
					notif("success");
					$(`#modal_form_kategori`).modal("hide");
					$(`#form_input_kategori`)[0].reset();
					$("#param_kategori").val("add");
				} else {
					notif("failed");
				}
			},false
		);
	},
});

function edit_category(id){
    _ajax(base_controller+"master-konten/kategori/edit", { id: id }, function (res) {
        if (res.status) {
            $(`#modal_form_kategori`).modal("show");
            $("#modal_title_kategori").text(`Edit Kategori ${$("#type_name").val()}`);
            $("#param_kategori").val("edit");
            $("#id_kategori").val(res.res_data["id"]);
            $("#name_kategori").val(res.res_data["name"]);
        } else {
            notif("failed");
        }
    },false);
}

function hapus_category(id) {
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
			_ajax(base_controller+"master-konten/kategori/hapus", { id: id }, function (res) {
				if (res.status) {
					load_category($("#type_name").val());
					notif("success");
				} else {
					notif("failed");
				}
			},false);
		}
	});
}