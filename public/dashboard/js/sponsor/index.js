$(document).ready(function() {
    getSponsor.loadData = "/sponsor"
    addSponsor();
    updateSponsor();
    deleteSponsor();
});

const getSponsor = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getSponsor, URL);
    },
    set successData(response) {
        const container = document.querySelector('#sponsor-cards')

        if (container) {
            container.innerHTML = "";
            for (let i = 0; i < response.length; i++) {
                container.innerHTML += `
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="${BASE_URL}/storage/${response[i].logo}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">${response[i].name}</h5>
                            <a href="${BASE_URL}/admin/edit-sponsor/${response[i].id}" class="btn btn-primary mt-3">Edit</a>
                            <button class="btn btn-danger mt-3 delete" data-id="${response[i].id}" data-bs-toggle="modal" data-bs-target="#hapusModal">Hapus</button>
                        </div>
                    </div>
                </div>
                `;
            }
        }
    }
}

const getDetailEdit = {
    set loadData(data) {
        const URL = URL_DATA + "/sponsor/" + data
        Functions.prototype.getRequest(getDetailEdit, URL);
    },
    set successData(response) {
        $('#id').val(response.id)
        $('#old_thumb').val(response.logo)
        $('#name').val(response.name)
        $('#uploadedPicture').attr('src', BASE_URL+"/storage/"+response.logo)
        $('#uploadedPicture').attr('hidden', false)
    }
}

function addSponsor() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#uploadedPicture'))
            data.append('picture', file[0])
        }
    })

    $('#formTambahSponsor').validate({
        rules: {
            picture: { required: true },
            name: { required: true },
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
            const urlPost = URL_DATA + "/add/sponsor"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
            }
            const files = $("#picture")[0].files
            formData.append('name', data.name)
            for (let i = 0; i < files.length; i++) {
                const element = files[i];
                formData.append('files[]', element)
            }
            Functions.prototype.uploadFile(urlPost, formData, 'post', postSponsor)
            $('#formTambahSponsor')[0].reset()
        }
    })

    const postSponsor = {
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

function updateSponsor() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#uploadedPicture'))
            data.append('picture', file[0])
        }
    });
    $('#formEditSponsor').validate({
        rules: {
            picture: { required: true },
            name: { required: true },
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
            const urlPut = URL_DATA + "/update/sponsor/" + $('#id').val()
            const formData = new FormData()
            const data = {
                gambar: $('#old_thumb').val(),
                name: $('#name').val(),
            }
            const files = $("#picture")[0].files
            formData.append('name', data.name)

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const element = files[i];
                    formData.append('files[]', element)
                }
            } else {
                formData.append('files', data.gambar)
            }
            // console.log($('#old_thumb').val())
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataSponsor)
        }
    })
    const putDataSponsor = {
        set successData(response) {
            $('#uploadedPicture').attr('hidden', true)
            $('#picture').removeClass('is-valid')
            $('#name').removeClass('is-valid')
        },
    }
}

function deleteSponsor() {
    $(document).on('click', '.delete', function(e) {
        const id = $(this).data('id')
        const urlDelete = URL_DATA + "/delete/sponsor/" + id
        
        // submit-hapus diklik
        $('.submit-hapus').on('click', function(e) {
            console.log('delete')
            e.preventDefault()
            Functions.prototype.deleteData(urlDelete)
            $('#hapusModal').modal('hide')
            getSponsor.loadData = "/sponsor"
        })
    })
}