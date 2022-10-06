var ENDPOINT = "http://lara-admin.test";
var page = 1;
var numbering = 21;
var checkArr = [];
var _token = $("input[name='_token']").val();

// -------------------------------------------------Scroll Pagination--------------------------------------------------------------

$(window).scroll(function () {
    if (
        $(window).scrollTop() + $(window).height() >= $(document).height() &&
        $("#filter_btn").hasClass("d-none") &&
        checkArr.length == 0
    ) {
        numbering += 20;
        page++;
        infinteLoadMore(page, numbering);
    }
});

function infinteLoadMore(page, numbering) {
    $.ajax({
        url: "http://lara-admin.test/store?page=" + page,
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
                    <td> ${data[i]["domain"]} </td>
                    <td> ${data[i]["email"]} </td>
                    <td> ${data[i]["timezone"]} </td>
                    <td> ${data[i]["json_data"]} </td>
                    <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm" href="http://lara-admin.test/store/edit?id=${data[i]["id"]}"> <i class="fas fa-pencil-alt"> </i> Edit </a>
                        <button class="btn btn-danger btn-sm" onclick="sweet_del(${data[i]["id"]})" id="del"> <i class="fas fa-trash"> </i> Delete </button>
                    </td>
                    </tr>`;
    }

    if (check == 0) $("#tbody_store").html(tbody_data);
    else $("#tbody_store").append(tbody_data);
}

// -------------------------------------------------Filter----------------------------------------------------------------------

$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        let input_value = $(this).val();
        let url = "http://lara-admin.test/store/search?type=search";
        let data = { _token: _token, input_value: input_value };

        if (input_value.length != 0) $("#filter_btn").removeClass("d-none");
        else $("#filter_btn").addClass("d-none");

        ajax_filter(url, "POST", data);
    });
});

function filter_date() {
    let input_value = $("#reservation").val();
    let url = "http://lara-admin.test/store/search?type=date";
    let data = { _token: _token, input_value: input_value };

    if (input_value.length != 0) $("#filter_btn").removeClass("d-none");
    else $("#filter_btn").addClass("d-none");

    ajax_filter(url, "POST", data);
}

function filter_data() {
    let input_value = $("#json_data").val();
    let url = "http://lara-admin.test/store/search?type=tag";
    let data = { _token: _token, input_value: input_value };

    if (input_value.length != 0) {
        $("#filter_btn").removeClass("d-none");
        ajax_filter(url, "POST", data);
    } else {
        $("#filter_btn").addClass("d-none");
        ajax_filter(
            "http://lara-admin.test/store/search?type=etc",
            "POST",
            data
        );
    }
}

function delete_record(url) {
    $("#modal_delete").attr("href", url);
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
            let url = "http://lara-admin.test/store/delete?id=" + id;
            ajax_filter(url, "GET");
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
}
