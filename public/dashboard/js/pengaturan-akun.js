$(document).ready(function () {
    gantiPass()
})

function gantiPass() {
    $('#formGantiPassword').validate({
        rules: {
            passLama: {
                required: true,
                minlength: 8
            },
            passBaru: {
                required: true,
                minlength: 8
            },
            konfirPassBaru: {
                required: true,
                equalTo: "#passBaru"
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
            const url = URL_DATA + "/pengaturan/ganti-password"
            const data = {
                passLama: $('#passLama').val(),
                passBaru: $('#passBaru').val(),
                konfirPassBaru: $('#konfirPassBaru').val(),
            }
            console.log(data)
            Functions.prototype.updateData(url, data, 'put')
            $('#formGantiPassword')[0].reset()
            $('#passLama').removeClass('is-valid')
            $('#passBaru').removeClass('is-valid')
            $('#konfirPassBaru').removeClass('is-valid')
        }
    })
}