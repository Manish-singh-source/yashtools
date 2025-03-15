$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".toggleSwitch", function () {
        let id = parseInt($(this).val()) || 0;
        let status = $(this).siblings(".status").val() || 0;

        const currentUrl = window.location.pathname;
        const newUrl = "/toggle-" + currentUrl.replace(/^\/+/, "");

        $.ajax({
            url: newUrl,
            type: "POST",
            data: {
                statusId: id,
                status: status,
            },
            success: function (data) {
                if (data.status) {
                    location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
        });
    });
});
