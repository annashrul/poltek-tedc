</div>
<!-- END wrapper -->

<script>
var resizefunc = [];
</script>


<script src="<?= base_url() . 'assets/' ?>js/waves.js"></script>
<script src="<?= base_url() . 'assets/' ?>js/wow.min.js"></script>
<script src="<?= base_url() .
    'assets/' ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/' ?>js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/jquery-detectmobile/detect.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/fastclick/fastclick.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/jquery-blockui/jquery.blockUI.js"></script>
<!-- CUSTOM JS -->
<script src="<?= base_url() . 'assets/' ?>js/jquery.app.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/timepicker/bootstrap-datepicker.js"></script>


<script src="<?= base_url() .
    'assets/' ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript">
</script>
<!-- jvectormap -->
<script src="<?= base_url() .
    'assets/' ?>plugin/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() .
    'assets/' ?>plugin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="<?= base_url() .
    'assets/' ?>assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<script type="text/javascript">
/* ==============================================
	Counter Up
	=============================================== */
jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 100,
        time: 1200
    });
});
</script>

<style>
select {
    display: block !important;
}

.myFont {
    font-family: 'Sniglet', cursive !important;
}
</style>
<script>
jQuery(document).ready(function() {
    // Time Picker
    jQuery('#timepicker').timepicker({
        defaultTIme: false
    });
    jQuery('#timepicker2').timepicker({
        showMeridian: false
    });
    jQuery('#timepicker3').timepicker({
        minuteStep: 15
    });

    // Date Picker
    jQuery('#datepicker').datepicker();
    jQuery('#datepicker-inline').datepicker();
    jQuery('#datepicker-multiple').datepicker({
        numberOfMonths: 3,
        showButtonPanel: true
    });
    // Select2
    jQuery(".select2").select2({
        width: '100%',
        placeholder: "Select a state",
        containerCssClass: "myFont"

    });
    $('select').on('change', function() { // when the value changes
        $(this).valid(); // trigger validation on this element
    });
});

CKEDITOR.on('instanceCreated', function(event) {
 	var editor = event.editor,
	element = editor.element;
	editor.on('change', function() {
		$('label[for="'+element.getId()+'"]').hide();
	});
 });
function set_ckeditor(id) {
    $.validator.messages.required = 'tidak boleh kosong';
	$.validator.messages.remote = 'telah digunakan';
	var validator = $("#"+id).validate();
	validator.form();
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace(id, {
            toolbar: [{
                    name: 'document',
                    groups: ['mode', 'document', 'doctools'],
                    items: ['Source']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Undo', 'Redo']
                },
                //'/',
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-',
                        'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-',
                        'BidiLtr', 'BidiRtl'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table']
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks']
                },
                {
                    name: 'others',
                    items: ['-']
                },
                {
                    name: 'about',
                    items: ['About']
                },

            ]
        });
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });

    $.fn.modal.Constructor.prototype.enforceFocus = function() {
        modal_this = this
        $(document).on('focusin.modal', function(e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length &&
                !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') &&
                !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
}
</script>
</body>

</html>