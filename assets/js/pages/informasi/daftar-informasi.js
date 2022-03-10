$(`#form_input_daftar_informasi`).validate({
	rules: {
		title: {
			required: true,
		},
		id_information_type: {
			required: true,
		},
		id_information_category: {
			required: true,
		},

		desc: {
			required: function () {
				CKEDITOR.instances.desc.updateElement();
			},

			minlength: 10,
		},
	},
	ignore: [],
	errorPlacement: handleError(),
	submitHandler: function (form) {
		var myForm = document.getElementById("form_input_daftar_informasi");
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
		_ajax_file("daftarInformasi/simpan", new FormData(myForm), function (res) {
			if (res.status) {
				load_data(1, {}, "Daftar_Informasi");
				notif("success");
				$(`#modal_form_${menuActive.toLowerCase()}`).modal("hide");
				$(`#form_input_${menuActive.toLowerCase()}`)[0].reset();
				$(`#param_${menuActive.toLowerCase()}`).val("add");
			} else {
				notif("failed");
			}
		});
	},
});
$("#id_information_type").on("change", function (e) {
	loadCategory($(this).val());
});
async function loadCategory(id) {
	_ajax(
		`kategoriInformasi/get_all_by_type`,
		{
			type_id: id,
		},
		function (res) {
			console.log(res);
			$("#id_information_category").val("");
			$("#id_information_category").html(res.output);
		}
	);
}
function editInformasi(id) {
	_ajax(`${camelCase(menuActive)}/edit`, { id: id }, function (res) {
		if (res.status) {
			loadCategory(res.res_data["type_id"]).then({});
			$(`#modal_form_${menuActive.toLowerCase()}`).modal("show");
			$("#modal_title_" + menuActive.toLowerCase()).text(
				`Edit ${menuActive.replaceAll("_", " ")}`
			);
			$("#param_" + menuActive.toLowerCase()).val("edit");
			$("#id_" + menuActive.toLowerCase()).val(res.res_data["information_id"]);
			$("#title").val(res.res_data["information_title"]);

			$("#id_information_type").val(res.res_data["type_id"]);
			$("#status").val(res.res_data["information_status"]);
			// $("#id_information_category").val(res.res_data["category_id"]);
			$("#file_uploaded").val(
				res.res_data["information_image"] != ""
					? res.res_data["information_image"]
					: ""
			);
			$("#result_image").attr(
				"src",
				base_assets +
					(res.res_data["information_image"] != ""
						? res.res_data["information_image"]
						: "assets/no_image.png")
			);
			CKEDITOR.instances.desc.setData(res.res_data["information_desc"]);
			setTimeout(function () {
				$("#id_information_category").val(res.res_data["category_id"]);
			}, 400);
		} else {
			notif("failed");
		}
	});
}
function hapusInformasi(id) {
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
					load_data(1, {}, "Daftar_Informasi");
					notif("success");
				} else {
					notif("failed");
				}
			});
		}
	});
}
