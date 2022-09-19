$(document).ready(function() {
    register();
});

const getRoleUser = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getRoleUser, URL);
    },
    set successData(response) {
        $('#role_id').val(response.id);
    }
}

function register() {
    $('#formRegister').validate({
        rules: {
            username: { required: true },
            email: { required: true },
            password: { required: true },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            },
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "small",
        errorPlacement: function errorPlacement(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        // // eslint-disable-next-line object-shorthand
        highlight: function highlight(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        // // eslint-disable-next-line object-shorthand
        unhighlight: function unhighlight(element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
        submitHandler: function(form, e) {
            e.preventDefault()
            const urlPost = BASE_URL + "/register/peserta"
            const formData = new FormData()
            const data = {
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                role_id: $('#role_id').val(),
            }
            formData.append('username', data.username)
            formData.append('email', data.email)
            formData.append('password', data.password)
            formData.append('role_id', data.role_id)
            Functions.prototype.postRequest(postRegister, urlPost, data)
        }
    })

    const postRegister = {
        set successData(response) {
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                $('#uploadedPicture').attr('hidden', true)
                $('#picture').removeClass('is-valid')
                $('#username').removeClass('is-valid')
                $('#email').removeClass('is-valid')
                $('#password').removeClass('is-valid')
                $('#confirmPassword').removeClass('is-valid')
            }
        },
        set errorData(err) {
            const toastPlacementExample = document.querySelector('.toast-placement-ex') 
            const header = document.querySelector('.toast-header-text')
            const body = document.querySelector('.toast-body')
            let toastPlacement;

            if (toastPlacement) {
                toastDispose(toastPlacement);
            }
    
            toastPlacementExample.classList.add('bg-danger');
            header.innerHTML = `Error`
            body.innerHTML = err.responseJSON.message
            toastPlacement = new bootstrap.Toast(toastPlacementExample);
            toastPlacement.show();
        }
    }
}