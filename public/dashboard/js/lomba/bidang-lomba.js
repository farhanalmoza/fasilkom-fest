$(document).ready(function() {
    // Datatable
    addCategory();
    deleteCategory();
});

const getBidangLomba = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getBidangLomba, URL);
    },
    set successData(response) {
        const container = document.getElementById('bidang-lomba-table')

        const bidangLomba = response

        if (container) {
            container.innerHTML = '';

            for (i = bidangLomba.length-1; i >= 0; i--) {
                container.innerHTML += `
                <tr>
                    <td><strong>${bidangLomba[i].name}</strong></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger delete" data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-id="${bidangLomba[i].id}">Hapus</button>
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
    }
}

function addCategory() {
    $('#tambahBidangLomba').validate({
        rules: {
            name: {
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
            const urlPost = URL_DATA + "/add/bidang-lomba"
            const data = {
                name: $('#name').val(),
            }
            Functions.prototype.postRequest(postRole, urlPost, data)
            getBidangLomba.loadData = "/bidang-lomba"
            $('#tambahBidangLomba')[0].reset()
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