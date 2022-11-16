$(document).ready(function() {
    lolosTim()
})

const getPendaftar = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPendaftar, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-pendaftar')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                container.innerHTML += `
                <tr>
                    <td><strong>${response[i].team_name}</strong></td>
                    <td>${response[i].sekolah}</td>
                    <td>${response[i].no_wa}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/panitia-cso/detail-pendaftar/${response[i].user_id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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

const getTahap2 = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getTahap2, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-tahap2')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                if (response[i].finalis == '2') {
                    var finalis = '<span class="badge bg-label-success me-1">Lolos</span>'
                } else {
                    var finalis = '<span class="badge bg-label-danger me-1">Belum Lolos</span>'
                }
                container.innerHTML += `
                <tr>
                    <td><strong>${response[i].team_name}</strong></td>
                    <td>${response[i].sekolah}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].proposal}" target="_blank" class="btn btn-primary btn-sm">Proposal</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/panitia-cso/detail-pendaftar/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
                    </td>
                    <td>${finalis}</td>
                    <td>
                        <a href="${BASE_URL}/panitia-cso/detail-pendaftar/${response[i].user_id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
                        <button class="btn btn-success btn-sm lolos" data-id="${response[i].id}" data-bs-toggle="modal" data-bs-target="#lolosModal">Lolos</button>
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

const getFinal = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getFinal, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-final')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                if (response[i].finalis == '1') {
                    container.innerHTML += `
                <tr>
                    <td><strong>${response[i].team_name}</strong></td>
                    <td>${response[i].sekolah}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].ppt}" target="_blank" class="btn btn-primary btn-sm">PPT</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/panitia-cso/detail-pendaftar/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/panitia-cso/detail-pendaftar/${response[i].user_id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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

const getDetail = {
    set loadData(data) {
        const URL = URL_DATA + "/detail-cso/" + data
        Functions.prototype.getRequest(getDetail, URL);
    },
    set successData(response) {
        console.log(response)
        $('#team_name').val(response.team_name)
        $('#no_wa').val(response.no_wa)
        $('#agency').val(response.sekolah)
        $('#member_1').val(response.member_1)
        $('#member_2').val(response.member_2)
        $('#member_3').val(response.member_3)
        
        $('#identitas_1').attr('href', BASE_URL + '/storage/' + response.identitas_1)
        $('#identitas_2').attr('href', BASE_URL + '/storage/' + response.identitas_2)
        $('#identitas_3').attr('href', BASE_URL + '/storage/' + response.identitas_3)
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

function lolosTim() {
    $(document).on('click', '.lolos', function(e) {
        const id = $(this).data('id')
        const urlPut = URL_DATA + "/update/lolos-cso/" + id
        
        // submit-hapus diklik
        $('.submit-lolos').on('click', function(e) {
            e.preventDefault()
            const data = {
                finalis: '2'
            }
            Functions.prototype.putRequest(putDataRole, urlPut, data)
            $('#lolosModal').modal('hide')
            getTahap2.loadData = "/pendaftar-cso";
        })
    })
    const putDataRole = {
        set successData(response) {
        },
    }
}