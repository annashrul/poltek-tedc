

function load_data(page, data = {}) {
	_ajax("read/" + page, data, function (res) {
		$("#result-table").html(res.result_table);
		$("#pagination_link").html(res.pagination_link);
	});
}

function add() {
	
	$("#modal_title").text(`Tambah Partnership`);
	$("#param").val("add");
	$("#modal_form").modal("show");
	$("#form_input").trigger("reset");
	setTimeout(function () {
		$("#result_image").attr("src", base_assets + "assets/no_image.png");
	}, 600);
}
 

$(`#form_input`).validate({
	rules: {
		name: {required: true},
		id_vocational: {required: true},
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
	_ajax(`edit`, { id: id }, function (res) {
		if (res.status) {
			$(`#modal_form`).modal("show");
			$("#modal_title").text(`Edit Partnership`);
			$("#param").val("edit");
			$("#id").val(res.res_data["id"]);
			$("#title").val(res.res_data["title"]);
			$("#desc").val(res.res_data["desc"]);
			$("#file_uploaded").val(res.res_data["image"] != ""? res.res_data["image"]: "");
			$("#result_image").attr("src",base_assets +(res.res_data["image"] != ""? res.res_data["image"]: "assets/no_image.png"));
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