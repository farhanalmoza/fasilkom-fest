$(document).ready(function() {
    updateDetailTim();
    addPenyisihan();
    addFinalis();
})

const getDetailTim = {
    set loadData(data) {
        const URL = URL_DATA + "/tim-uiux/" + data
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
            $('#instansi').val(response.instansi);
            $('#wa').val(response.no_wa);

            // disable input
            $("#teamName").attr("disabled", true);
            $('#instansi').attr("disabled", true);
            $('#wa').attr("disabled", true);
            $('#orisinalitas').attr("disabled", true);
            $('#buktiBayar').attr("disabled", true);
            $("#member_1").attr("disabled", true);
            $('#identitas_1').attr("disabled", true);
            $("#member_2").attr("disabled", true);
            $('#identitas_2').attr("disabled", true);
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
    $("#orisinalitas").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('orisinalitas', file[0])
        }
    });
    $("#identitas_1").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('identitas_1', file[0])
        }
    });
    $("#identitas_2").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('identitas_2', file[0])
        }
    });
    $('#formDetailTim').validate({
        rules: {
            teamName: { required: true },
            sekolah: { required: true },
            wa: { required: true, number: true },
            buktiBayar: { required: true },
            orisinalitas: { required: true },
            member_1: { required: true },
            identitas_1: { required: true },
            member_2: { required: true },
            identitas_2: { required: true },
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
            const urlPut = URL_DATA + "/update/detail-tim-uiux/" + $('#id').val()
            const formData = new FormData()
            const data = {
                teamName: $('#teamName').val(),
                member_1: $('#member_1').val(),
                member_2: $('#member_2').val(),
                instansi: $('#instansi').val(),
                wa: $('#wa').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            const orisinalitas = $('#orisinalitas')[0].files
            const identitas_1 = $('#identitas_1')[0].files
            const identitas_2 = $('#identitas_2')[0].files
            formData.append('teamName', data.teamName)
            formData.append('member_1', data.member_1)
            formData.append('member_2', data.member_2)
            formData.append('instansi', data.instansi)
            formData.append('wa', data.wa)

            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            for (let i = 0; i < orisinalitas.length; i++) {
                const element = orisinalitas[i];
                formData.append('orisinalitas[]', element)
            }
            for (let i = 0; i < identitas_1.length; i++) {
                const element = identitas_1[i];
                formData.append('identitas_1[]', element)
            }
            for (let i = 0; i < identitas_2.length; i++) {
                const element = identitas_2[i];
                formData.append('identitas_2[]', element)
            }
            
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataDetailTim)
        }
    })
    const putDataDetailTim = {
        set successData(response) {
            $('#teamName').removeClass('is-valid')
            $('#instansi').removeClass('is-valid')
            $('#wa').removeClass('is-valid')
            $('#buktiBayar').removeClass('is-valid')
            $('#orisinalitas').removeClass('is-valid')
            $('#member_1').removeClass('is-valid')
            $('#identitas_1').removeClass('is-valid')
            $('#member_2').removeClass('is-valid')
            $('#identitas_2').removeClass('is-valid')
        },
    }
}

const getPenyisihan = {
    set loadData(data) {
        const URL = URL_DATA + "/penyisihan/" + data
        Functions.prototype.getRequest(getPenyisihan, URL);
    },
    set successData(response) {
        // jika ada data
        if (response) {
            $('#screen').val(response.screen)
            $('#proposal').val(response.proposal)
            // disable form
            $('#screen').attr("disabled", true);
            $('#proposal').attr("disabled", true);

            // hilangkan tombol submit
            $('#btnSubmit').hide()
        }

        if (response.demo && response.prototype) {
            $('#demo').val(response.demo)
            $('#prototype').val(response.prototype)
            // disable form
            $('#demo').attr("disabled", true);
            $('#prototype').attr("disabled", true);

            // hilangkan tombol submit
            $('#btnSubmit').hide()
        }
    }
}

function addPenyisihan() {
    $('#formPenyisihan').validate({
        rules: {
            screen: { required: true },
            proposal: { required: true },
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
            const urlPost = URL_DATA + "/add/penyisihan-uiux"
            const data = {
                team_id: team_id,
                screen: $('#screen').val(),
                proposal: $('#proposal').val(),
            }
            Functions.prototype.postRequest(postPenyisihan, urlPost, data)
        }
    })
    const postPenyisihan = {
        set successData(response) {
            $('#screen').removeClass('is-valid')
            $('#proposal').removeClass('is-valid')
        },
    }
}

function addFinalis() {
    $('#formFinal').validate({
        rules: {
            demo: { required: true },
            prototype: { required: true },
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
            const urlPut = URL_DATA + "/update/karya-uiux/" + team_id
            const data = {
                demo: $('#demo').val(),
                prototype: $('#prototype').val(),
            }
            Functions.prototype.putRequest(putKaryaUiux, urlPut, data)
            getPenyisihan.loadData = team_id
        }
    })
    const putKaryaUiux = {
        set successData(response) {
            $('#demo').removeClass('is-valid')
            $('#prototype').removeClass('is-valid')
        },
    }
}