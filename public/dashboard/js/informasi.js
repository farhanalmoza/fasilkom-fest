$(document).ready(function () {
    getDetail.loadData = "1"
    ubahInformasi()
})

const getDetail = {
    set loadData(data) {
        const urlDetail = URL_DATA + "/informasi/" + data
        Functions.prototype.requestDetail(getDetail, urlDetail)
    },
    set successData(response) {
        $('#tgl_closing').val(response.closing_date)
        $('#tmp_closing').val(response.venue)
        $('#deskripsi').text(response.description)
        $('#email').val(response.email)
        $('#instagram').val(response.instagram)
    },
    set errorData(err) {
        console.log(err);
    }
}

function ubahInformasi() {
    $('#formInformasi').validate({
        rules: {
            tgl_closing: {
                required: true,
            },
            tmp_closing: {
                required: true,
            },
            deskripsi: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            instagram: {
                required: true,
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
        
            if (element.prop('type') === 'checkbox') {
              error.insertAfter(element.parent('label'));
            } else {
              error.insertAfter(element);
            }
        },
        // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form, e) {
            const urlPut = URL_DATA + "/update/informasi/1"
            const data = {
                tgl_closing: $('#tgl_closing').val(),
                tmp_closing: $('#tmp_closing').val(),
                deskripsi: $('#deskripsi').val(),
                email: $('#email').val(),
                instagram: $('#instagram').val(),
            }
            Functions.prototype.putRequest(putInformasi, urlPut, data)
            getDetail.loadData = "1"
        }
    })
    const putInformasi = {
        set successData(response) {
            getDetail.loadData = "1"
            $('#tgl_closing').removeClass('is-valid')
            $('#tmp_closing').removeClass('is-valid')
            $('#deskripsi').removeClass('is-valid')
            $('#email').removeClass('is-valid')
            $('#instagram').removeClass('is-valid')
        },
    }
}