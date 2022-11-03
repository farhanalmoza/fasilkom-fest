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
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
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