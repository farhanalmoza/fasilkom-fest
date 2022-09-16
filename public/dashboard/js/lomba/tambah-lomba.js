$(document).ready(function() {
    // Datatable
    addCompetition();
});

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

function deleteCategory() {
    $(document).on('click', '.delete', function(e) {
        const id = $(this).data('bs-id')
        const urlDelete = URL_DATA + "/delete/bidang-lomba/" + id
        
        // submit-hapus diklik
        $('.submit-hapus').on('click', function(e) {
            e.preventDefault()
            Functions.prototype.deleteData(urlDelete)
            $('#hapusModal').modal('hide')
            getBidangLomba.loadData = "/bidang-lomba"
        })
    })
}