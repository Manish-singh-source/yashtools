$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".toggleSwitch", function () {
        let customerId = parseInt($(this).val()) || 0;
        let status = $(this).siblings(".status").val() || 0;
        $.ajax({
            url: "/toggle-customer-status",
            type: "POST",
            data: {
                customerId: customerId,
                status: status,
            },
            success: function (data) {
                if (data.status) {
                    console.log(data);
                    console.log(data.status);
                    location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                console.log(data);
            },
        });
    });
});
