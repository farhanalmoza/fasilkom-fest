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
                    <td>${response[i].instansi}</td>
                    <td>${response[i].no_wa}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].bmc}" target="_blank" class="btn btn-primary btn-sm">BMC</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/panitia-bpc/detail-pendaftar/${response[i].user_id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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

const getDetail = {
    set loadData(data) {
        const URL = URL_DATA + "/detail-bpc/" + data
        Functions.prototype.getRequest(getDetail, URL);
    },
    set successData(response) {
        console.log(response)
        $('#team_name').val(response.team_name)
        $('#no_wa').val(response.no_wa)
        $('#agency').val(response.instansi)
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