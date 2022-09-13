$(document).ready(function () {
    // CRUD
    addRole() // tambah role/divisi
    // deletePlace()
    // updatePlace()
})

const getDivisi = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getDivisi, URL);
    },
    set successData(response) {
        const container = document.getElementById('divisi-table')

        const divisi = response

        if (container) {
            container.innerHTML = '';
    
            for (i = divisi.length-1; i >= 0; i--) {
                if (divisi[i].id !== 1) {
                    container.innerHTML += `
                    <tr>
                        <td><strong>${divisi[i].name}</strong></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">Hapus</button>
                        </td>
                    </tr>
                    `;
                }
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
        var content = {};
        content.title = "Error";
        content.message = err.responseJSON.message;
        content.icon = "fa fa-times";
        $.notify(content, {
            type: "danger",
            placement: {
                from: "top",
                align: "right",
            },
            time: 1000,
            delay: 10000,
        });
    },
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