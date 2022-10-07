$(document).ready(function() {
    updateDetailTim();
})

const getDetailTim = {
    set loadData(data) {
        const URL = URL_DATA + "/tim-cso/" + data
        Functions.prototype.getRequest(getDetailTim, URL);
    },
    set successData(response) {
        $('#id').val(response.id)
        if (response.verified == 0) {
            const tombolSubmit = document.getElementById("tombolSubmit");
            tombolSubmit.innerHTML = `
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            `
        }

        if(response.verified != 0) {
            $("#teamName").val(response.team_name);
            $("#member_1").val(response.member_1);
            $("#member_2").val(response.member_2);

            // disable input
            $("#teamName").attr("disabled", true);
            $('#buktiBayar').attr("disabled", true);
            $("#member_1").attr("disabled", true);
            $('#kartuPelajar_1').attr("disabled", true);
            $("#member_2").attr("disabled", true);
            $('#kartuPelajar_2').attr("disabled", true);
        }
    }
}

function updateDetailTim() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $("#kartuPelajar_1").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('kartuPelajar_1', file[0])
        }
    });
    $("#kartuPelajar_2").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('kartuPelajar_2', file[0])
        }
    });
    $('#formDetailTim').validate({
        rules: {
            teamName: { required: true },
            buktiBayar: { required: true },
            member_1: { required: true },
            kartuPelajar_1: { required: true },
            member_2: { required: true },
            kartuPelajar_2: { required: true },
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
            const urlPut = URL_DATA + "/update/detail-tim/" + $('#id').val()
            const formData = new FormData()
            const data = {
                teamName: $('#teamName').val(),
                member_1: $('#member_1').val(),
                member_2: $('#member_2').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            const kartuPelajar_1 = $('#kartuPelajar_1')[0].files
            const kartuPelajar_2 = $('#kartuPelajar_2')[0].files
            formData.append('teamName', data.teamName)
            formData.append('member_1', data.member_1)
            formData.append('member_2', data.member_2)

            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            for (let i = 0; i < kartuPelajar_1.length; i++) {
                const element = kartuPelajar_1[i];
                formData.append('kartuPelajar_1[]', element)
            }
            for (let i = 0; i < kartuPelajar_2.length; i++) {
                const element = kartuPelajar_2[i];
                formData.append('kartuPelajar_2[]', element)
            }
            
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataDetailTim)
        }
    })
    const putDataDetailTim = {
        set successData(response) {
            $('#teamName').removeClass('is-valid')
            $('#buktiBayar').removeClass('is-valid')
            $('#member_1').removeClass('is-valid')
            $('#kartuPelajar_1').removeClass('is-valid')
            $('#member_2').removeClass('is-valid')
            $('#kartuPelajar_2').removeClass('is-valid')
        },
    }
}