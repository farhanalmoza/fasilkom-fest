$(document).ready(function() {
    pendaftaranFotografi();
});

function pendaftaranFotografi() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $('#daftarFotografi').validate({
        rules: {
            name: {required:true},
            email: { required: true, email: true },
            noWa: { required: true },
            agency: { required: true },
            occupation: { required: true },
            origin: { required: true },
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
            const urlPost = URL_DATA + "/add/fotografi/"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                email: $('#email').val(),
                noWa: $('#noWa').val(),
                agency: $('#agency').val(),
                occupation: $('#occupation').val(),
                origin: $('#origin').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            
            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            formData.append('name', data.name)
            formData.append('email', data.email)
            formData.append('noWa', data.noWa)
            formData.append('agency', data.agency)
            formData.append('occupation', data.occupation)
            formData.append('origin', data.origin)
            Functions.prototype.pendaftaranLomba(urlPost, formData, 'post', putDataFotografi)
        }
    })
    const putDataFotografi = {
        set successData(response) {
            $('#daftarFotografi').trigger('reset')
            $('#daftarFotografi').find('.is-valid').removeClass('is-valid')
            $('#daftarFotografi').find('.is-invalid').removeClass('is-invalid')
            $('#daftarFotografi').find('.invalid-feedback').remove()
            
            $('#alert-message').addClass('pt-100')
            $('#alert-message').html(`
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert gray-bg alert-dismissible fade show" role="alert">
                                Pendaftaran berhasil, silakan bergabung dengan grup Whatsapp <a href="${response.message}" target="_blank">Peserta Fotografi Fasilkom Fest 2022</a> untuk mendapatkan informasi terbaru.
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