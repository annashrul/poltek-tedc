function load_program() {
	_ajax(base_controller+"master-data/program/get_option", null, function (res) {
        $("#id_program").html(res.output)
	},false);
}


function load_data(page, data = {}) {
	_ajax("read/" + page, data, function (res) {
		$("#result-table").html(res.result_table);
		$("#pagination_link").html(res.pagination_link);
	});
}

function add() {
	$("#modal_title").text(`Tambah Jurusan`);
	$("#param").val("add");
	$("#modal_form").modal("show");
	$("#form_input").trigger("reset");
    load_program();
		CKEDITOR.instances.visi.setData();
		CKEDITOR.instances.misi.setData();
		CKEDITOR.instances.deskripsi.setData();
		CKEDITOR.instances.kompetensi.setData();

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
		id_program: {required: true},
		akreditasi: {required: true},
		sk: {required: true},
		phone: {required: true,number:true},
		email: {required: true,email: true},
		tgl_berdiri: {required: true},
		visi: {required: function () {CKEDITOR.instances.visi.updateElement();}},
		misi: {required: function () {CKEDITOR.instances.misi.updateElement();}},
		deskripsi: {required: function () {CKEDITOR.instances.deskripsi.updateElement();}},
		kompetensi: {required: function () {CKEDITOR.instances.kompetensi.updateElement();}},
	},
	messages: {
		name: {
			remote: "name already exsist",
		},
	},
	ignore: [],

	errorElement: "div",
	errorPlacement: handleError(),
	submitHandler: function (form) {
		console.log($(`#form_input`).serialize())
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
			load_program();
			$(`#modal_form`).modal("show");
			$("#modal_title").text(`Edit Jurusan`);
			$("#param").val("edit");
			$("#id").val(res.res_data["id"]);
			setTimeout(function(){$("#id_program").val(res.res_data["id_program"]);},300)
			$("#name").val(res.res_data["name"]);
			$("#akreditasi").val(res.res_data["akreditasi"]);
			$("#sk").val(res.res_data["sk"]);
			$("#phone").val(res.res_data["phone"]);
			$("#email").val(res.res_data["email"]);
			$("#website").val(res.res_data["link"]);
			$("#tgl_berdiri").val(res.res_data["tgl_berdiri"]);
			CKEDITOR.instances.visi.setData(res.res_data["visi"]);
			CKEDITOR.instances.misi.setData(res.res_data["misi"]);
			CKEDITOR.instances.deskripsi.setData(res.res_data["deskripsi"]);
			CKEDITOR.instances.kompetensi.setData(res.res_data["kompetensi"]);

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