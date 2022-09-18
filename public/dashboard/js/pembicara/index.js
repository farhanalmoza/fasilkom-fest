$(document).ready(function() {
    getSpeaker.loadData = "/pembicara"
    addSpeaker()
})

const getSpeaker = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getSpeaker, URL);
    },
    set successData(response) {
        const container = document.querySelector('#speaker-cards')

        container.innerHTML = "";

        for (let i = 0; i < response.length; i++) {
            container.innerHTML += `
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="${BASE_URL}/storage/${response[i].photo}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${response[i].speaker_name}</h5>
                        <h6 class="card-subtitle text-muted">${response[i].headline}</h6>
                    </div>
                </div>
            </div>
            `;
        }
    }
}

function addSpeaker() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#uploadedPicture'))
            data.append('picture', file[0])
        }
    })

    $('#formTambahPembicara').validate({
        rules: {
            picture: { required: true },
            name: { required: true },
            headline: { required: true },
            email: { required: true, email: true },
            linkedin: { required: true },
            instagram: { required: true },
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
            const urlPost = URL_DATA + "/add/pembicara"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                headline: $('#headline').val(),
                email: $('#email').val(),
                linkedin: $('#linkedin').val(),
                instagram: $('#instagram').val(),
            }
            const files = $("#picture")[0].files
            formData.append('name', data.name)
            formData.append('headline', data.headline)
            formData.append('email', data.email)
            formData.append('linkedin', data.linkedin)
            formData.append('instagram', data.instagram)
            for (let i = 0; i < files.length; i++) {
                const element = files[i];
                formData.append('files[]', element)
            }
            Functions.prototype.uploadFile(urlPost, formData, 'post', postSpeaker)
            $('#formTambahPembicara')[0].reset()
        }
    })

    const postSpeaker = {
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
                $('#name').removeClass('is-valid')
                $('#headline').removeClass('is-valid')
                $('#email').removeClass('is-valid')
                $('#linkedin').removeClass('is-valid')
                $('#instagram').removeClass('is-valid')
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