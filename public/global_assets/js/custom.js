var SweetAlert = function () {
    var _componentSession = function () {

        $('#summernote').summernote();
        // Defaults
        var setCustomDefaults = function () {
            swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
        }
        setCustomDefaults();

        var request = $('.success').data('request');

        if (request) {
            var type, text;
            if (request == 'Success') {
                type = 'success';
                text = 'Berhasil'
            } else {
                type = 'error';
                text = 'Gagal'
            }
            swal({
                title: request,
                text: text,
                type: type,
                showCloseButton: true
            }).catch(swal.noop);
        }

    };

    var _componentDelete = function () {
        // Defaults
        var setCustomDefaults = function () {
            swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
        }
        setCustomDefaults();

        $('table .deleted').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus Data!',
                cancelButtonText: 'Batalkan!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
                console.log(result);
                if (result.value) {
                    window.location = url;
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Dibatalkan',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });

        $('.deleted-card').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus Data!',
                cancelButtonText: 'Batalkan!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
                console.log(result);
                if (result.value) {
                    window.location = url;
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Dibatalkan',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });
    };

    return {
        init: function () {
            _componentSession();
            _componentDelete();
        }
    }

}();

var Select2 = function () {
    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    var _componentSelect = function () {
        $('.select2').select2();
    }

    return {
        init: function () {
            _componentSelect();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    SweetAlert.init();
    Select2.init();
});