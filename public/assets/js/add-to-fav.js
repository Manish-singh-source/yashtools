$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#wishlistBtn", function () {
        let id = parseInt($(this).data('productid')) || 0;
        let status = $(this).siblings(".status").val() || 0;

        console.log(id);
        console.log(status);
        // $.ajax({
        //     url: newUrl,
        //     type: "POST",
        //     data: {
        //         statusId: id,
        //         status: status,
        //     },
        //     success: function (data) {
        //         if (data.status) {
        //             console.log(data.status);
        //             // console.log(data.message)
        //             // console.log(data.data)
        //             location.reload();
        //         }
        //     },
        //     error: function (xhr, status, error) {
        //         console.log(xhr);
        //         console.log(status);
        //         console.log(error);
        //     },
        // });
    });
});
