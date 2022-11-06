$(document).ready(function() {
    updateDetailTim();
    uploadProposal();
    uploadPPTFinal();
})

const getDetailTim = {
    set loadData(data) {
        const URL = URL_DATA + "/tim-bpc/" + data
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
            $("#member_3").val(response.member_3);
            $('#instansi').val(response.instansi);
            $('#wa').val(response.no_wa);

            // disable input
            $("#teamName").attr("disabled", true);
            $('#instansi').attr("disabled", true);
            $('#wa').attr("disabled", true);
            $('#bmc').attr("disabled", true);
            $('#buktiBayar').attr("disabled", true);
            $("#member_1").attr("disabled", true);
            $('#identitas_1').attr("disabled", true);
            $("#member_2").attr("disabled", true);
            $('#identitas_2').attr("disabled", true);
            $("#member_3").attr("disabled", true);
            $('#identitas_3').attr("disabled", true);
        }

        if (response.proposal) {
            $('#proposal').attr('disabled', true)
            // hide button upload
            $('#submitProposal').hide()
        }

        if (response.ppt) {
            $('#ppt').attr('disabled', true)
            // hide button upload
            $('#submitPPT').hide()
        }
    }
}

function updateDetailTim() {
    $("#bmc").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('bmc', file[0])
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
    $("#identitas_3").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('identitas_3', file[0])
        }
    });
    $('#formDetailTim').validate({
        rules: {
            teamName: { required: true },
            sekolah: { required: true },
            wa: { required: true, number: true },
            bmc: { required: true, extension: "pdf" },
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
            const urlPut = URL_DATA + "/update/detail-tim-bpc/" + $('#id').val()
            const formData = new FormData()
            const data = {
                teamName: $('#teamName').val(),
                member_1: $('#member_1').val(),
                member_2: $('#member_2').val(),
                member_3: $('#member_3').val(),
                instansi: $('#instansi').val(),
                wa: $('#wa').val(),
            }
            const bmc = $('#bmc')[0].files
            const identitas_1 = $('#identitas_1')[0].files
            const identitas_2 = $('#identitas_2')[0].files
            const identitas_3 = $('#identitas_3')[0].files
            formData.append('teamName', data.teamName)
            formData.append('member_1', data.member_1)
            formData.append('member_2', data.member_2)
            formData.append('member_3', data.member_3)
            formData.append('instansi', data.instansi)
            formData.append('wa', data.wa)

            
            for (let i = 0; i < bmc.length; i++) {
                const element = bmc[i];
                formData.append('bmc[]', element)
            }
            for (let i = 0; i < identitas_1.length; i++) {
                const element = identitas_1[i];
                formData.append('identitas_1[]', element)
            }
            for (let i = 0; i < identitas_2.length; i++) {
                const element = identitas_2[i];
                formData.append('identitas_2[]', element)
            }
            for (let i = 0; i < identitas_3.length; i++) {
                const element = identitas_3[i];
                formData.append('identitas_3[]', element)
            }
            
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataDetailTim)
            getDetailTim.loadData = user_id
        }
    })
    const putDataDetailTim = {
        set successData(response) {
            $('#teamName').removeClass('is-valid')
            $('#instansi').removeClass('is-valid')
            $('#wa').removeClass('is-valid')
            $('#bmc').removeClass('is-valid')
            $('#member_1').removeClass('is-valid')
            $('#identitas_1').removeClass('is-valid')
            $('#member_2').removeClass('is-valid')
            $('#identitas_2').removeClass('is-valid')
            $('#member_3').removeClass('is-valid')
            $('#identitas_3').removeClass('is-valid')
        },
    }
}

function uploadProposal() {
    $("#buktiBayar").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('buktiBayar', file[0])
        }
    });
    $("#porposal").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('porposal', file[0])
        }
    });
    $('#formTahap2').validate({
        rules: {
            proposal: {
                required: true,
                extension: "pdf"
            },
            buktiBayar: { required: true },
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
            const urlPut = URL_DATA + "/update/tahap-2-bpc/" + team_id
            const formData = new FormData()
            const data = {
                proposal: $('#proposal').val(),
            }
            const buktiBayar = $('#buktiBayar')[0].files
            const proposal = $('#proposal')[0].files
            
            for (let i = 0; i < buktiBayar.length; i++) {
                const element = buktiBayar[i];
                formData.append('buktiBayar[]', element)
            }
            for (let i = 0; i < proposal.length; i++) {
                const element = proposal[i];
                formData.append('proposal[]', element)
            }
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataProposal)
            getDetailTim.loadData = user_id
        }
    })
    const putDataProposal = {
        set successData(response) {
            $('#proposal').removeClass('is-valid')
            $('#buktiBayar').removeClass('is-valid')
        },
    }
}

function uploadPPTFinal() {
    $("#ppt").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            data.append('ppt', file[0])
        }
    });
    $('#formFinal').validate({
        rules: {
            ppt: {
                required: true,
                extension: "pptx"
            },
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
            const urlPut = URL_DATA + "/update/final-bpc/" + team_id
            const formData = new FormData()
            const data = {
                ppt: $('#ppt').val(),
            }
            const ppt = $('#ppt')[0].files
            
            for (let i = 0; i < ppt.length; i++) {
                const element = ppt[i];
                formData.append('ppt[]', element)
            }
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataPpt)
            getDetailTim.loadData = user_id
        }
    })
    const putDataPpt = {
        set successData(response) {
            $('#ppt').removeClass('is-valid')
        },
    }
}