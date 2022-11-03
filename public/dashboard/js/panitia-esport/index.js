$(document).ready(function () {
})

const getMl = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getMl, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-ml')

        const ml = response

        if (container) {
            container.innerHTML = '';
    
            for (i = ml.length-1; i >= 0; i--) {
                if (ml[i].major == '1') {
                    var major = 'Informatic'
                } else if (ml[i].major == '2') {
                    var major = 'Information System'
                } else if (ml[i].major == '3') {
                    var major = 'Data Science'
                }
                container.innerHTML += `
                <tr>
                    <td><strong>${ml[i].team_name}</strong></td>
                    <td>${ml[i].team_leader}</td>
                    <td>${ml[i].email}</td>
                    <td>${ml[i].no_wa}</td>
                    <td>${major}</td>
                    <td>
                        <a href="${BASE_URL}/panitia-esport/mobile-legend/${ml[i].id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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

const getDetailMl = {
    set loadData(data) {
        const URL = URL_DATA + "/detail-ml/" + data
        Functions.prototype.getRequest(getDetailMl, URL);
    },
    set successData(response) {
        if (response.major == '1') {
            var major = 'Informatic'
        } else if (response.major == '2') {
            var major = 'Information System'
        } else if (response.major == '3') {
            var major = 'Data Science'
        }

        $('#team_name').val(response.team_name)
        $('#major').val(major)
        $('#captain').val(response.team_leader)
        $('#email').val(response.email)
        $('#no_wa').val(response.no_wa)
        // download ktm with rename file
        $('#bukti_bayar').attr('href', BASE_URL + '/storage/' + response.bukti_bayar)
        $('#formulir').attr('href', BASE_URL + '/storage/' + response.formulir)
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