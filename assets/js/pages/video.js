
function load_data(page, data = {}) {
	_ajax("read/" + page, data, function (res) {
		$("#result-table").html(res.result_table);
		$("#pagination_link").html(res.pagination_link);
	});
}

function add() {
	$("#modal_title").text(`Tambah Video`);
	$("#param").val("add");
	$("#modal_form").modal("show");
	$("#form_input").trigger("reset");
}

$(`#form_input`).validate({
	rules: {
		link: {
			required: true,
		},
	},
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
			$("#modal_title").text(`Edit Video`);
			$("#param").val("edit");
			$("#id").val(res.res_data["id"]);
			$("#link").val(res.res_data["link"]);
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