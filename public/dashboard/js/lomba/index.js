$(document).ready(function() {
    // Datatable
    addCompetition();
    updateCompetition();
});

const getLomba = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getLomba, URL);
    },
    set successData(response) {
        const academic = document.getElementById('row-academic')
        const art = document.getElementById('row-art')
        const sport = document.getElementById('row-sport')
        const eSport = document.getElementById('row-e-sport')

        const lomba = response

        for (i = lomba.length-1; i >= 0; i--) {
            if(lomba[i].id_category == 1) {
                academic.innerHTML += `
                    <div class="col-md-6 col-lg-4 mb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${lomba[i].name}</h5>
                                <div class="card-subtitle text-muted mb-3">${lomba[i].category_name}</div>
                                <p class="card-text">
                                    ${lomba[i].description}
                                </p>
                                <a href="${BASE_URL}/admin/edit-lomba/${lomba[i].id}">
                                    <button class="card-link btn btn-primary">Edit</button>
                                </a>
                                <button class="card-link btn btn-danger delete" data-id="${lomba[i].id}">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
            }

            if(lomba[i].id_category == 2) {
                art.innerHTML += `
                    <div class="col-md-6 col-lg-4 mb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${lomba[i].name}</h5>
                                <div class="card-subtitle text-muted mb-3">${lomba[i].category_name}</div>
                                <p class="card-text">
                                    ${lomba[i].description}
                                </p>
                                <a href="${BASE_URL}/admin/edit-lomba/${lomba[i].id}">
                                    <button class="card-link btn btn-primary">Edit</button>
                                </a>
                                <button class="card-link btn btn-danger delete" data-id="${lomba[i].id}">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
            }

            if(lomba[i].id_category == 3) {
                sport.innerHTML += `
                    <div class="col-md-6 col-lg-4 mb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${lomba[i].name}</h5>
                                <div class="card-subtitle text-muted mb-3">${lomba[i].category_name}</div>
                                <p class="card-text">
                                    ${lomba[i].description}
                                </p>
                                <a href="${BASE_URL}/admin/edit-lomba/${lomba[i].id}">
                                    <button class="card-link btn btn-primary">Edit</button>
                                </a>
                                <button class="card-link btn btn-danger delete" data-id="${lomba[i].id}">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
            }

            if(lomba[i].id_category == 3) {
                eSport.innerHTML += `
                    <div class="col-md-6 col-lg-4 mb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${lomba[i].name}</h5>
                                <div class="card-subtitle text-muted mb-3">${lomba[i].category_name}</div>
                                <p class="card-text">
                                    ${lomba[i].description}
                                </p>
                                <a href="${BASE_URL}/admin/edit-lomba/${lomba[i].id}">
                                    <button class="card-link btn btn-primary">Edit</button>
                                </a>
                                <button class="card-link btn btn-danger delete" data-id="${lomba[i].id}">Hapus</button>
                            </div>
                        </div>
                    </div>
                `;
            }
        }
    }
}

function addCompetition() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#uploadedPicture'))
            data.append('picture', file[0])
        }
    })

    $('#formTambahLomba').validate({
        rules: {
            picture: { required: true },
            name: { required: true },
            bidangLomba: { required: true },
            tgl_mulai: { required: true },
            tgl_selesai: { required: true },
            deskripsi: { required: true },
            lokasi: { required: true },
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
            const urlPost = URL_DATA + "/add/mata-lomba"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                bidang_lomba_id: $('#bidangLomba').val(),
                tgl_mulai: $('#tgl_mulai').val(),
                tgl_selesai: $('#tgl_selesai').val(),
                deskripsi: $('#deskripsi').val(),
                lokasi: $('#lokasi').val(),
            }
            const files = $("#picture")[0].files
            formData.append('name', data.name)
            formData.append('id_category', data.bidang_lomba_id)
            formData.append('start_date', data.tgl_mulai)
            formData.append('end_date', data.tgl_selesai)
            formData.append('description', data.deskripsi)
            formData.append('location', data.lokasi)
            for (let i = 0; i < files.length; i++) {
                const element = files[i];
                formData.append('files[]', element)
            }
            Functions.prototype.uploadFile(urlPost, formData, 'post', postCompetition)
            $('#formTambahLomba')[0].reset()
        }
    })

    const postCompetition = {
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
                $('#bidangLomba').removeClass('is-valid')
                $('#tgl_mulai').removeClass('is-valid')
                $('#tgl_selesai').removeClass('is-valid')
                $('#deskripsi').removeClass('is-valid')
                $('#lokasi').removeClass('is-valid')
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

const getDetailEdit = {
    set loadData(data) {
        const URL = URL_DATA + "/lomba/" + data
        Functions.prototype.getRequest(getDetailEdit, URL);
    },
    set successData(response) {
        const lomba = response.lomba
        const kategori = response.kategori

        const bidangLomba = document.querySelector('#bidangLomba')
        if(bidangLomba) {
            for (i = 0; i < kategori.length; i++) {
                bidangLomba.innerHTML += `
                    <option value="${kategori[i].id}">${kategori[i].name}</option>
                `;
            }
        }
        // change format date
        const date = new Date(lomba.start_date)
        const date2 = new Date(lomba.end_date)
        // change format to mm/dd/yyyy
        const dateStart = date.toLocaleDateString('en-CA')
        const dateEnd = date2.toLocaleDateString('en-CA')
        // set value to input

        $('#id').val(lomba.id)
        $('#name').val(lomba.name)
        $('#old_thumb').val(lomba.pict)
        $('#bidangLomba').val(lomba.id_category).change()
        $('#tgl_mulai').attr('value', dateStart)
        $('#tgl_selesai').attr('value', dateEnd)
        $('#deskripsi').val(lomba.description)
        $('#lokasi').val(lomba.location)
        $('#uploadedPicture').attr('src', BASE_URL+"/storage/"+lomba.pict)
        $('#uploadedPicture').attr('hidden', false)
    }
}

function updateCompetition() {
    $("#picture").on("change", function (e) {
        e.preventDefault();

        if (Functions.prototype.validateFile($(this))) {
            const data = new FormData()
            const file = $(this)[0].files
            Functions.prototype.prevImage(file[0], $('#uploadedPicture'))
            data.append('picture', file[0])
        }
    });
    $('#formEditLomba').validate({
        rules: {
            picture: { required: true },
            name: { required: true },
            bidangLomba: { required: true },
            tgl_mulai: { required: true },
            tgl_selesai: { required: true },
            deskripsi: { required: true },
            lokasi: { required: true },
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
            const urlPut = URL_DATA + "/update/lomba/" + $('#id').val()
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                gambar: $('#old_thumb').val(),
                bidang_lomba_id: $('#bidangLomba').val(),
                tgl_mulai: $('#tgl_mulai').val(),
                tgl_selesai: $('#tgl_selesai').val(),
                deskripsi: $('#deskripsi').val(),
                lokasi: $('#lokasi').val(),
            }
            const files = $("#picture")[0].files
            formData.append('name', data.name)
            formData.append('id_category', data.bidang_lomba_id)
            formData.append('start_date', data.tgl_mulai)
            formData.append('end_date', data.tgl_selesai)
            formData.append('description', data.deskripsi)
            formData.append('location', data.lokasi)

            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const element = files[i];
                    formData.append('files[]', element)
                }
            } else {
                formData.append('files', data.gambar)
            }
            // console.log($('#old_thumb').val())
            Functions.prototype.uploadFile(urlPut, formData, 'post', putDataCompetition)
        }
    })
    const putDataCompetition = {
        set successData(response) {
            $('#uploadedPicture').attr('hidden', true)
            $('#picture').removeClass('is-valid')
            $('#name').removeClass('is-valid')
            $('#bidangLomba').removeClass('is-valid')
            $('#tgl_mulai').removeClass('is-valid')
            $('#tgl_selesai').removeClass('is-valid')
            $('#deskripsi').removeClass('is-valid')
            $('#lokasi').removeClass('is-valid')
        },
    }
}