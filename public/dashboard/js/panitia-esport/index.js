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


const getPubg = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPubg, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-pubg')

        const pubg = response

        if (container) {
            container.innerHTML = '';
    
            for (i = pubg.length-1; i >= 0; i--) {
                if (pubg[i].major == '1') {
                    var major = 'Informatic'
                } else if (pubg[i].major == '2') {
                    var major = 'Information System'
                } else if (pubg[i].major == '3') {
                    var major = 'Data Science'
                }
                container.innerHTML += `
                <tr>
                    <td><strong>${pubg[i].team_name}</strong></td>
                    <td>${pubg[i].team_leader}</td>
                    <td>${pubg[i].no_wa}</td>
                    <td>${major}</td>
                    <td>
                        <a href="${BASE_URL}/panitia-esport/pubg-mobile/${pubg[i].id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
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

const getDetailPubg = {
    set loadData(data) {
        const URL = URL_DATA + "/detail-pubg/" + data
        Functions.prototype.getRequest(getDetailPubg, URL);
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
        $('#no_wa').val(response.no_wa)
        $('#player_2').val(response.player_2)
        $('#player_3').val(response.player_3)
        $('#player_4').val(response.player_4)
        $('#player_5').val(response.player_5)
        // download ktm with rename file
        $('#bukti_bayar').attr('href', BASE_URL + '/storage/' + response.bukti_bayar)
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


const getPes = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPes, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-pes')

        const pes = response

        if (container) {
            container.innerHTML = '';
    
            for (i = pes.length-1; i >= 0; i--) {
                if (pes[i].major == '1') {
                    var major = 'Informatic'
                } else if (pes[i].major == '2') {
                    var major = 'Information System'
                } else if (pes[i].major == '3') {
                    var major = 'Data Science'
                }
                container.innerHTML += `
                <tr>
                    <td><strong>${pes[i].name}</strong></td>
                    <td>${pes[i].npm}</td>
                    <td>${pes[i].email}</td>
                    <td>${pes[i].no_wa}</td>
                    <td>${major}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${pes[i].ktm}" target="_blank" class="btn btn-primary btn-sm">KTM</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/storage/${pes[i].formulir}" download class="btn btn-primary btn-sm">Formulir</a>
                    </td>
                    <td>
                        <a href="${BASE_URL}/storage/${pes[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
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