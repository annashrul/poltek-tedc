
function load_data(page, data = {}) {
	_ajax("read/" + page, data, function (res) {
		$("#result-table").html(res.result_table);
		$("#pagination_link").html(res.pagination_link);
	});
}

function add() {
	$("#modal_title").text(`Tambah Program`);
	$("#param").val("add");
	$("#modal_form").modal("show");
	$("#form_input").trigger("reset");
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
	},
	messages: {
		name: {
			required: "Form Tidak Boleh Kosong",
			remote: "Nama Sudah Digunakan",
		},
	},
	errorElement: "div",
	errorPlacement: handleError(),
	submitHandler: function (form) {
		_ajax(
			`simpan`,
			$(`#form_input`).serialize(),
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
	_ajax(`edit`, { id: id }, function (res) {
		if (res.status) {
			$(`#modal_form`).modal("show");
			$("#modal_title").text(`Edit Program`);
			$("#param").val("edit");
			$("#id").val(res.res_data["id"]);
			$("#name").val(res.res_data["name"]);
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