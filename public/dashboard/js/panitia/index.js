$(document).ready(function () {
    addPanitia();
})

const getPanitia = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPanitia, URL);
    },
    set successData(response) {
        const container = document.getElementById('panitia-table')

        const panitia = response

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

const getDivisi = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getDivisi, URL);
    },
    set successData(response) {
        const container = document.getElementById('divisi')

        const divisi = response

        if (container) {    
            for (i = divisi.length-1; i >= 0; i--) {
                if (divisi[i].id !== 1 && divisi[i].id !== 2 && divisi[i].id !== 3 && divisi[i].id !== 4) {
                    container.innerHTML += `
                        <option value="${divisi[i].id}">${divisi[i].name}</option>
                    `;
                }
            }
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

function addPanitia() {
    $('#formTambahPanitia').validate({
        rules: {
            name: { required: true },
            email: { required: true },
            divisi: { required: true },
            password: { required: true },
            confirmPassword: { required: true },
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
            const urlPost = BASE_URL + "/register-panitia"
            const data = {
                name: $('#name').val(),
                email: $('#email').val(),
                role_id: $('#divisi').find(":selected").val(),
                password: $('#password').val(),
                password_confirmation: $('#confirmPassword').val(),
            }
            Functions.prototype.postRequest(postPanitia, urlPost, data)
            getPanitia.loadData = "/panitia"
        }
    })

    const postPanitia = {
        set successData(response) {
            if(window.location.search != "") {
                const urlParams = new URLSearchParams(window.location.search)
                if(urlParams.get('redirect') != "") {
                    setTimeout(() => {
                        window.location.href = urlParams.get('redirect')
                    }, 1500);
                }
            } else {
                $('#tambahPanitiaModal').modal('hide')
                $('#formTambahPanitia')[0].reset()
                $('#name').removeClass('is-valid')
                $('#email').removeClass('is-valid')
                $('#divisi').removeClass('is-valid')
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