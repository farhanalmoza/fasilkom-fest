const getPhotography = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getPhotography, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-photography')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                if (response[i].occupation == '1') {
                    var occupation = 'Student'
                } else if (response[i].occupation == '2') {
                    var occupation = 'College Student'
                } else if (response[i].occupation == '0') {
                    var occupation = 'Other'
                }
                container.innerHTML += `
                <tr>
                    <td><strong>${response[i].name}</strong></td>
                    <td>${response[i].email}</td>
                    <td>${response[i].no_wa}</td>
                    <td>${response[i].agency}</td>
                    <td>${response[i].origin}</td>
                    <td>${occupation}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
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

const getVideography = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getVideography, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-videography')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                if (response[i].occupation == '1') {
                    var occupation = 'Student'
                } else if (response[i].occupation == '2') {
                    var occupation = 'College Student'
                }

                if (response[i].participation == '1') {
                    var participation = 'Individual'
                } else if (response[i].participation == '2') {
                    var participation = 'Team'
                }

                container.innerHTML += `
                <tr>
                    <td><strong>${response[i].name}</strong></td>
                    <td>${participation}</td>
                    <td>${response[i].email}</td>
                    <td>${response[i].no_wa}</td>
                    <td>${response[i].agency}</td>
                    <td>${occupation}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
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

const getSoloCover = {
    set loadData(data) {
        const URL = URL_DATA + data
        Functions.prototype.getRequest(getSoloCover, URL);
    },
    set successData(response) {
        const container = document.getElementById('tb-solo-cover')

        if (container) {
            container.innerHTML = '';
    
            for (i = response.length-1; i >= 0; i--) {
                if (response[i].occupation == '1') {
                    var occupation = 'Student'
                } else if (response[i].occupation == '2') {
                    var occupation = 'College Student'
                }

                container.innerHTML += `
                <tr>
                    <td><strong>${response[i].name}</strong></td>
                    <td>${response[i].email}</td>
                    <td>${response[i].no_wa}</td>
                    <td>${response[i].agency}</td>
                    <td>${occupation}</td>
                    <td>
                        <a href="${BASE_URL}/storage/${response[i].bukti_bayar}" target="_blank" class="btn btn-primary btn-sm">Payment</a>
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