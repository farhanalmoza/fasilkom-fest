$(document).ready(function() {
    pendaftaranMl();
});

function pendaftaranMl() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $("#form").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('form', file[0])
        }
    });
    $('#daftarML').validate({
        rules: {
            teamName: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            leader: { required: true },
            noWa: { required: true },
            buktiBayar: { required: true, extension: "jpg|jpeg|png" },
            form: { required: true, extension: "pdf" },
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
            const urlPost = URL_DATA + "/add/ml/"
            const formData = new FormData()
            const data = {
                teamName: $('#teamName').val(),
                email: $('#email').val(),
                leader: $('#leader').val(),
                noWa: $('#noWa').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            const formulir = $('#form')[0].files
            
            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            for (let i = 0; i < formulir.length; i++) {
                const element = formulir[i];
                formData.append('formulir[]', element)
            }
            formData.append('teamName', data.teamName)
            formData.append('email', data.email)
            formData.append('leader', data.leader)
            formData.append('noWa', data.noWa)
            Functions.prototype.pendaftaranLomba(urlPost, formData, 'post', putDataMl)
        }
    })
    const putDataMl = {
        set successData(response) {
            $('#daftarML').trigger('reset')
            $('#daftarML').find('.is-valid').removeClass('is-valid')
            $('#daftarML').find('.is-invalid').removeClass('is-invalid')
            $('#daftarML').find('.invalid-feedback').remove()
            
            $('#alert-message').addClass('pt-100')
            $('#alert-message').html(`
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert gray-bg alert-dismissible fade show" role="alert">
                                Pendaftaran berhasil, silakan bergabung dengan grup Whatsapp <a href="${response.message}" target="_blank">Fasilkom Fest 2022</a> untuk mendapatkan informasi terbaru.
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