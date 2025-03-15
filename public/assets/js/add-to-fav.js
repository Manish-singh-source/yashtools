$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#wishlistBtn", function () {
        let productid = $(this).data("productid");
        let productStatus = $(this).siblings(".status").val() || 0;

        $.ajax({
            url: "/add-to-favourite",
            type: "POST",
            data: {
                productid: productid,
                productStatus: productStatus,
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
