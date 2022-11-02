$(document).ready(function() {
    pendaftaranPubg();
});

function pendaftaranPubg() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $('#daftarPubg').validate({
        rules: {
            teamName: { required: true, },
            leader: { required: true },
            noWa: { required: true },
            major: { required: true },
            player_2: { required: true },
            player_3: { required: true },
            player_4: { required: true },
            player_5: { required: true },
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
            const urlPost = URL_DATA + "/add/pubg/"
            const formData = new FormData()
            const data = {
                teamName: $('#teamName').val(),
                leader: $('#leader').val(),
                noWa: $('#noWa').val(),
                major: $('#major').val(),
                player_2: $('#player_2').val(),
                player_3: $('#player_3').val(),
                player_4: $('#player_4').val(),
                player_5: $('#player_5').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            
            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            formData.append('teamName', data.teamName)
            formData.append('leader', data.leader)
            formData.append('noWa', data.noWa)
            formData.append('major', data.major)
            formData.append('player_2', data.player_2)
            formData.append('player_3', data.player_3)
            formData.append('player_4', data.player_4)
            formData.append('player_5', data.player_5)
            Functions.prototype.pendaftaranLomba(urlPost, formData, 'post', putDataMl)
        }
    })
    const putDataMl = {
        set successData(response) {
            $('#daftarPubg').trigger('reset')
            $('#daftarPubg').find('.is-valid').removeClass('is-valid')
            $('#daftarPubg').find('.is-invalid').removeClass('is-invalid')
            $('#daftarPubg').find('.invalid-feedback').remove()
            
            $('#alert-message').addClass('pt-100')
            $('#alert-message').html(`
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert gray-bg alert-dismissible fade show" role="alert">
                                Pendaftaran berhasil, silakan bergabung dengan grup Whatsapp <a href="${response.message}" target="_blank">Peserta PUBG Fasilkom Fest 2022</a> untuk mendapatkan informasi terbaru.
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