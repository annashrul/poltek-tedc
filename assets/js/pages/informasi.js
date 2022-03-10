function tabChange(param) {
	$("#page").val(param);
	menuActive = $("#page").val();

	var menu = ["Daftar_Informasi", "Jenis_Informasi", "Kategori_Informasi"];
	if (menuActive === "Kategori_Informasi") {
		load_type("type_id");
	}
	if (menuActive === "Daftar_Informasi") {
		load_type("id_information_type");
	}
	for (let i = 0; i < menu.length; i++) {
		if (menu[i] === param) {
			$("#pagination_link_" + param).css({
				display: "block",
				float: "right",
			});
			load_data(1, {}, param);
		} else {
			$("#pagination_link_" + menu[i]).css({
				display: "none",
			});
		}
	}
}
function add() {
	$("#modal_title_" + menuActive.toLowerCase()).text(
		`Tambah ${menuActive.replaceAll("_", " ")}`
	);
	$("#param_" + menuActive.toLowerCase()).val("add");
	$("#modal_form_" + menuActive.toLowerCase()).modal("show");
	$("#form_input_" + menuActive.toLowerCase()).trigger("reset");
	CKEDITOR.instances.desc.setData();
	setTimeout(function () {
		$("#result_image").attr("src", base_assets + "assets/no_image.png");
	}, 600);
}

function load_data(page, data = {}, type) {
	_ajax(camelCase(type) + "/get_data/" + page, data, function (res) {
		$("#result-table-" + type).html(res.result_table);
		$("#pagination_link_" + type).html(res.pagination_link);
	});
}

function cari(e, val) {
	if (e.keyCode == 13) {
		console.log(menuActive, val);
		load_data(
			1,
			{
				search: true,
				any: val,
			},
			menuActive
		);
	}
}
$(`#modal_form_${menuActive.toLowerCase()}`).on("hide.bs.modal", function () {
	document.getElementById(`form_input_${menuActive.toLowerCase()}`).reset();
	$(`form_input_${menuActive.toLowerCase()}`).validate().resetForm();
});
