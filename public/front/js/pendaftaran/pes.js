$(document).ready(function() {
    pendaftaranPes();
});

function pendaftaranPes() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $("#ktm").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('ktm', file[0])
        }
    });
    $("#formulir").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('formulir', file[0])
        }
    });
    $('#daftarPes').validate({
        rules: {
            name: { required: true, },
            major: { required: true, },
            email: { required: true, email: true, },
            npm: { required: true, number: true, },
            noWa: { required: true, number: true, },
            ktm: { required: true, extension: "jpg|jpeg|png" },
            formulir: { required: true, extension: "pdf" },
            buktiBayar: { required: true, extension: "jpg|jpeg|png" },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
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
            e.preventDefault()
            const urlPost = URL_DATA + "/add/pes/"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                major: $('#major').val(),
                email: $('#email').val(),
                npm: $('#npm').val(),
                noWa: $('#noWa').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            const ktm = $('#ktm')[0].files
            const formulir = $('#formulir')[0].files
            
            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            for (let i = 0; i < ktm.length; i++) {
                const element = ktm[i];
                formData.append('ktm[]', element)
            }
            for (let i = 0; i < formulir.length; i++) {
                const element = formulir[i];
                formData.append('formulir[]', element)
            }
            formData.append('name', data.name)
            formData.append('major', data.major)
            formData.append('email', data.email)
            formData.append('npm', data.npm)
            formData.append('noWa', data.noWa)
            Functions.prototype.pendaftaranLomba(urlPost, formData, 'post', putDataMl)
        }
    })
    const putDataMl = {
        set successData(response) {
            $('#daftarPes').trigger('reset')
            $('#daftarPes').find('.is-valid').removeClass('is-valid')
            $('#daftarPes').find('.is-invalid').removeClass('is-invalid')
            $('#daftarPes').find('.invalid-feedback').remove()
            
            $('#alert-message').addClass('pt-100')
            $('#alert-message').html(`
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert gray-bg alert-dismissible fade show" role="alert">
                                Pendaftaran berhasil, silakan bergabung dengan grup Whatsapp <a href="${response.message}" target="_blank">Peserta PES Fasilkom Fest 2022</a> untuk mendapatkan informasi terbaru.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `)
        },
    }
}