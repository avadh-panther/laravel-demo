function delete_record(url) {
    $("#modal_delete").attr("href", url);
}

var ENDPOINT = "http://lara-admin.test";
var page = 1;
var numbering = 21;
var checkArr = [];

// -------------------------------------------------Scroll Pagination--------------------------------------------------------------

$(window).scroll(function () {
    if (
        $(window).scrollTop() + $(window).height() >= $(document).height() &&
        checkArr.length == 0
    ) {
        numbering += 20;
        page++;
        infinteLoadMore(page, numbering);
    }
});

function infinteLoadMore(page, numbering) {
    $.ajax({
        url: "http://lara-admin.test/template?page=" + page,
        datatype: "html",
        type: "get",
        success: function (response) {
            if (response.length == 0) {
                return;
            }
            let data = response.data;
            handel_response(data, numbering);
        },
    });
}

// -------------------------------------------------AJAX and Response--------------------------------------------------------------

function handel_response(data, check = 0) {
    let tbody_data = "";

    if (check != 0) var counter = check - 20;

    for (let i = 0; i < data.length; i++) {
        if (check != 0) {
            var j = counter;
            counter++;
        } else {
            var j = i + 1;
        }

        tbody_data += `<tr>
                    <td> ${j} </td>
                    <td> ${data[i]["name"]} </td>
                    <td class="editor_data wrap"> ${data[i]["description"]} </td>
                    <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm" href="http://lara-admin.test/template/edit?id=${data[i]["id"]}"> <i class="fas fa-pencil-alt"> </i> Edit </a>
                        <button class="btn btn-danger btn-sm" onclick="sweet_del(${data[i]["id"]})" id="del"> <i class="fas fa-trash"> </i> Delete </button>
                    </td>
                    </tr>`;
    }

    if (check == 0) $("#tbody_template").html(tbody_data);
    else $("#tbody_template").append(tbody_data);
}

function ajax_filter(route, method, data = {}) {
    checkArr.push(true);
    $.ajax({
        url: route,
        type: method,
        data: data,
        success: function (response) {
            handel_response(response);
        },
    });
}

//----------------------------------Sweet alert------------------------------------

function sweet_del(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            let url = "http://lara-admin.test/template/delete?id=" + id;
            ajax_filter(url, "GET");
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
}
