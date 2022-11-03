$(document).ready(function () {
})

const getSport = {
    set loadData(data) {
        const URL = URL_DATA + "/sport/" + data
        Functions.prototype.getRequest(getSport, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-sport')

        const sport = response

        if (container) {
            container.innerHTML = '';
    
            for (i = sport.length-1; i >= 0; i--) {
                container.innerHTML += `
                <tr>
                    <td><strong>${sport[i].team_name}</strong></td>
                    <td>${sport[i].leader}</td>
                    <td>${sport[i].email}</td>
                    <td>${sport[i].no_wa}</td>
                    <td>
                        <a href="${BASE_URL}/panitia-sport/detail/${sport[i].id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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
        const URL = URL_DATA + "/detail-sport/" + data
        Functions.prototype.getRequest(getDetail, URL);
    },
    set successData(response) {
        if (response.category == '1') {
            var category = 'Futsal';
        } else if (response.category == '2') {
            var category = 'Basket Putra';
        } else if (response.category == '3') {
            var category = 'Basket Putri';
        }

        $('#team_name').val(response.team_name)
        $('#category').val(category)
        $('#captain').val(response.leader)
        $('#npm').val(response.npm)
        $('#email').val(response.email)
        $('#no_wa').val(response.no_wa)
        // download ktm with rename file
        $('#ktm').attr('href', BASE_URL + '/storage/' + response.ktm)
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