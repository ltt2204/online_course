/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
var Modals = function () {

    // Bootbox extension
    var _componentModalBootbox = function() {
        if (typeof bootbox == 'undefined') {
            console.warn('Warning - bootbox.min.js is not loaded.');
            return;
        }

        // Accept-Delete dialog
        $('.accept-delete-old').on('click', function() {
            var link = $(this).attr("href");
            // alert(link);
            bootbox.confirm({
                title: '<h2 style="color:red">Chú ý:</h2>',
                message: '<h5 style="color:blue">Bạn có thực sự muốn xoá không?</h5>',
                buttons: {
                    confirm: {
                        label: 'Có, tôi đồng ý',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Ồ không',
                        className: 'btn-info'
                    }
                },
                callback: function (result) {
                    if (result) {
                        window.location.href = link;
                    }
                    //alert(result);
                    // bootbox.alert({
                    //     title: 'Confirmation result',
                    //     message: 'Confirm result: ' + result
                    // });
                }
            });
        });

        // Alert dialog
        $('#alert').on('click', function() {
            bootbox.alert({
                title: 'Check this out!',
                message: 'Native alert dialog has been replaced with Bootbox alert box.'
            });
        });

        // Confirmation dialog
        $('#confirm').on('click', function() {
            bootbox.confirm({
                title: 'Confirm dialog',
                message: 'Native confirm dialog has been replaced with Bootbox confirm box.',
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-primary'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-link'
                    }
                },
                callback: function (result) {
                    bootbox.alert({
                        title: 'Confirmation result',
                        message: 'Confirm result: ' + result
                    });
                }
            });
        });

        // Prompt dialog
        $('#prompt').on('click', function() {
            bootbox.prompt({
                title: 'Please enter your name',
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-primary'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-link'
                    }
                },
                callback: function (result) {
                    if (result === null) {                                             
                        bootbox.alert({
                            title: 'Prompt dismissed',
                            message: 'You have cancelled this damn thing'
                        });                              
                    } else {
                        bootbox.alert({
                            title: 'Hi <strong>' + result + '</strong>',
                            message: 'How are you doing today?'
                        });                              
                    }
                }
            });
        });
    }
    //
    // Return objects assigned to module
    //

    return {
        initComponents: function() {
            //_componentModalRemote();
            //_componentModalCallbacks();
            _componentModalBootbox();
        }
    }
}();

var DatatableButtonsHtml5 = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableButtonsHtml5 = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });


        // Basic initialization
        $('.datatable-button-html5-basic').DataTable({
            buttons: {            
                dom: {
                    button: {
                        className: 'btn btn-light'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            }
        });


        // PDF with image
        $('.datatable-button-html5-image').DataTable({
            buttons: [
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF <i class="icon-file-pdf ml-2"></i>',
                    className: 'btn bg-teal-400',
                    customize: function (doc) {
                        doc.content.splice(1, 0, {
                            margin: [0, 0, 0, 12],
                            alignment: 'center',
                            fontFamily: 'Helvetica',
                            image: ''
                        });
                    }
                }
            ]
        });


        // Column selectors
        $('.datatable-button-html5-columns').DataTable({
            buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [0, 1, 2, 5]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn bg-blue btn-icon dropdown-toggle'
                    }
                ]
            }
        });


        // Tab separated values
        $('.datatable-button-html5-tab').DataTable({
            buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        text: '<i class="icon-copy3 mr-2"></i> Copy'
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'btn btn-light',
                        text: '<i class="icon-file-spreadsheet mr-2"></i> CSV',
                        fieldSeparator: '\t',
                        extension: '.tsv'
                    }
                ]
            }
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableButtonsHtml5();
            _componentSelect2();
        }
    }
}();

var InputsBasic = function () {


    //
    // Setup module components
    //

    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // File input
		$('.form-control-uniform').uniform();

        // Custom select
        $('.form-control-uniform-custom').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentUniform();
        }
    }
}();

var InputsCheckboxesRadios = function () {



    // Bootstrap switch
    var _componentBootstrapSwitch = function() {
        if (!$().bootstrapSwitch) {
            console.warn('Warning - switch.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-check-input-switch').bootstrapSwitch();
    };


    //
    // Return objects assigned to module
    //

    return {
        initComponents: function() {
            _componentBootstrapSwitch();
        }
    }
}();

var NotyJgrowl = function() {


    //
    // Setup module components
    //

    // jGrowl examples
    var _componentJgrowl = function() {
        if (!$().jGrowl) {
            console.warn('Warning - jgrowl.min.js is not loaded.');
            return;
        }

        // Defaults override - hide "close all" button
        $.jGrowl.defaults.closer = false;


        //
        // Contextual options
        //

        // Solid color theme
        $('#jgrowl-default').on('click', function () {
            $.jGrowl('We are glad to see you again', {
                header: 'Good morning!',
                theme: 'bg-primary'
            });
        });

        // Danger notification
        $('#jgrowl-danger').on('click', function () {
            $.jGrowl('Change a few things up and try submitting again', {
                header: 'Oh snap!',
                theme: 'bg-danger'
            });
        });

        // Success notification
        $('#jgrowl-success').on('click', function () {
            $.jGrowl('You successfully read this important alert message', {
                header: 'Well done!',
                theme: 'bg-success'
            });
        });

        // Warning notification
        $('#jgrowl-warning').on('click', function () {
            $.jGrowl('Better check yourself, you\'re not looking too good', {
                header: 'Attention Here!',
                theme: 'bg-warning'
            });
        });

        // Info notification
        $('#jgrowl-info').on('click', function () {
            $.jGrowl('This alert needs your attention, but it\'s not super important.', {
                header: 'Heads up!',
                theme: 'bg-info'
            });
        });

        // Basic style
        $('#jgrowl-alert-default').on('click', function () {
            $.jGrowl('Default alert style example', {
                header: 'Default alert style',
                theme: 'alert-bordered alert-primary'
            });
        });

        // Custom style
        $('#jgrowl-custom-styled').on('click', function () {
            $.jGrowl('Notification with custom style', {
                header: 'Custom style',
                theme: 'alert-styled-left alert-styled-custom alpha-teal text-teal-800 border-teal'
            });
        });

        // Styled with arrow
        $('#jgrowl-styled-arrow').on('click', function () {
            $.jGrowl('Styled alert with arrow', {
                header: 'Styled with arrow',
                theme: 'alert-styled-left alert-arrow-left alert-primary'
            });
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentJgrowl();
        }
    }
}();

var SweetAlert = function () {


    //
    // Setup module components
    //

    // Sweet Alerts
    var _componentSweetAlert = function() {
        if (typeof swal == 'undefined') {
            console.warn('Warning - sweet_alert.min.js is not loaded.');
            return;
        }

        // Defaults
        var swalInit = swal.mixin({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });

        // Success alert
        $('#sweet_success').on('click', function() {
            swalInit.fire({
                title: 'Good job!',
                text: 'You clicked the button!',
                type: 'success'
            });
        });

        // Error alert
        $('#sweet_error').on('click', function() {
            swalInit.fire({
                title: 'Oops...',
                text: 'Something went wrong!',
                type: 'error'
            });
        });

        // Warning alert
        $('#sweet_warning').on('click', function() {
            swalInit.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            });
        });

        // Info alert
        $('#sweet_info').on('click', function() {
            swalInit.fire({
                title: 'For your information',
                text: 'This is some sort of a custom alert',
                type: 'info'
            });
        });

        // Question
        $('#sweet_question').on('click', function() {
            swalInit.fire({
                title: 'Got question?',
                text: 'You will get the answer soon!',
                type: 'question'
            });
        });

        // Alert combination
        $('#sweet_combine').on('click', function() {
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
                    swalInit.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
                else if(result.dismiss === swal.DismissReason.cancel) {
                    swalInit.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });

        // Alert combination
        $('.accept-delete').on('click', function(e) {

            e.preventDefault();

            var link = $(this).attr("href");
            
            swalInit.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn không thể phục hồi được nữa!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Vâng, hãy xoá!',
                cancelButtonText: 'Ồ không!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
                    window.location.href = link;
                }
            });
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        initComponents: function() {
            _componentSweetAlert();
        }
    }
}();

// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    Modals.initComponents();
    DatatableButtonsHtml5.init();
    InputsBasic.init();
    InputsCheckboxesRadios.initComponents();
    NotyJgrowl.init();
    SweetAlert.initComponents();
});
