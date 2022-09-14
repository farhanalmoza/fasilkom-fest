$(document).ready(function () {
    // CRUD
    addRole() // tambah role/divisi
    deleteRole()
    updateRole()
})

const getPanitia = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPanitia, URL);
    },
    set successData(response) {
        const container = document.getElementById('panitia-table')

        const panitia = response
        console.log(panitia)

        if (container) {
            container.innerHTML = '';
    
            for (i = panitia.length-1; i >= 0; i--) {
                container.innerHTML += `
                <tr>
                    <td><strong>${panitia[i].name}</strong></td>
                    <td>${panitia[i].email}</td>
                    <td><span class="badge bg-label-primary me-1">${panitia[0].role_name}</span></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary edit" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="${panitia[i].id}">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger delete" data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-id="${panitia[i].id}">Hapus</button>
                    </td>
                </tr>
                `;
            }
        }

        if (container.innerHTML == '') {
            container.innerHTML += `
                <tr>
                    <td>Belum ada data yang ditambahkan</td>
                </tr>
            `;
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
        body.innerHTML = err.message
        toastPlacement = new bootstrap.Toast(toastPlacementExample);
        toastPlacement.show();
    },
}

// ketika tombol .edit ditekan
$(document).on('click', '.edit', function () {
    const id = $(this).data('bs-id')
    getDetail.loadData = id
})

const getDetail = {
    set loadData(data) {
        const urlDetail = URL_DATA + "/divisi/" + data
        Functions.prototype.requestDetail(getDetail, urlDetail)
    },
    set successData(response) {
        // for preview detail
        $('#id').val(response.id)
        $('#nameEdit').val(response.name)
        $('#descEdit').text(response.description)
    },
    set errorData(err) {
        console.log(err);
    }
}


// CRUD
function addRole() {
    $('#tambahDivisi').validate({
        rules: {
            name: {
                required: true
            },
            desc: {
                required: true
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
            const urlPost = URL_DATA + "/add/divisi"
            const formData = new FormData()
            const data = {
                name: $('#name').val(),
                desc: $('#desc').val(),
            }
            formData.append('name', data.name)
            formData.append('desc', data.desc)
            Functions.prototype.postRequest(postRole, urlPost, data)
            getDivisi.loadData = "/divisi"
        }
    })

    const postRole = {
        set successData(response) {
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                $('#tambahDivisi')[0].reset()
                $('#name').removeClass('is-valid')
                $('#desc').removeClass('is-valid')
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

function updateRole() {
    $('#editDivisi').validate({
        rules: {
            nameEdit: {
                required: true
            },
            descEdit: {
                required: true
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
            const urlPut = URL_DATA + "/update/divisi/" + $('#id').val()
            const formData = new FormData()
            const data = {
                name:      $('#nameEdit').val(),
                desc:      $('#descEdit').val(),
            }
            formData.append('name', data.name)
            formData.append('desc', data.desc)
            // console.log($('#old_thumb').val())
            Functions.prototype.putRequest(putDataRole, urlPut, data)
            $('#editModal').modal('hide')
            getDivisi.loadData = "/divisi"
        }
    })
    const putDataRole = {
        set successData(response) {
            $('#nameEdit').removeClass('is-valid')
            $('#descEdit').removeClass('is-valid')
        },
    }
}

function deleteRole() {
    $(document).on('click', '.delete', function(e) {
        const id = $(this).data('bs-id')
        const urlDelete = URL_DATA + "/delete/divisi/" + id
        
        // submit-hapus diklik
        $('.submit-hapus').on('click', function(e) {
            e.preventDefault()
            Functions.prototype.deleteData(urlDelete)
            $('#hapusModal').modal('hide')
            getDivisi.loadData = "/divisi"
        })
    })
}