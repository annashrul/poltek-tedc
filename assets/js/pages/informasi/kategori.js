$("#type_id").select2({
	placeholder: "Pilih",
	allowClear: true,
	width: "100%",
});
$(`#form_input_kategori_informasi`).validate({
	rules: {
		name: {
			required: true,
			remote: {
				url: base_url + `kategoriInformasi/isExist`,
				type: "post",
				data: {
					param: function () {
						return $("#param_kategori_informasi").val();
					},
				},
			},
		},
		type_id: {
			required: true,
		},
	},
	errorPlacement: handleError(),

	submitHandler: function (form) {
		_ajax(
			`${camelCase(menuActive)}/simpan`,
			$(`#form_input_${menuActive.toLowerCase()}`).serialize(),
			function (res) {
				if (res.status) {
					load_data(1, {}, "Kategori_Informasi");
					notif("success");
					$(`#modal_form_${menuActive.toLowerCase()}`).modal("hide");
					$(`#form_input_${menuActive.toLowerCase()}`)[0].reset();
					$("#param").val("add");
				} else {
					notif("failed");
				}
			}
		);
	},
});
function load_type(param) {
	_ajax(`jenisInformasi/get_all`, null, function (res) {
		$("#" + param).html(res.output);
	});
}
function editKategori(id) {
	_ajax(`${camelCase(menuActive)}/edit`, { id: id }, function (res) {
		if (res.status) {
			$(`#modal_form_${menuActive.toLowerCase()}`).modal("show");
			$("#modal_title_" + menuActive.toLowerCase()).text(
				`Edit ${menuActive.replaceAll("_", " ")}`
			);
			$("#param_" + menuActive.toLowerCase()).val("edit");
			$("#id_" + menuActive.toLowerCase()).val(res.res_data["id"]);
			$("#name_kategori").val(res.res_data["name"]);
			$("#type_id").select2("val", res.res_data["id_information_type"]);
		} else {
			notif("failed");
		}
	});
}
function hapusKategori(id) {
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
			_ajax(`${camelCase(menuActive)}/hapus`, { id: id }, function (res) {
				if (res.status) {
					load_data(1, {}, "Kategori_Informasi");
					notif("success");
				} else {
					notif("failed");
				}
			});
		}
	});
}
