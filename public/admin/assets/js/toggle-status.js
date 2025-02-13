$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".toggleSwitch", function() {
        let productId = parseInt($(this).val()) || 0;
        let product_status = parseInt($(this).siblings(".product_status").val()) || 0;

        $.ajax({
            url: "/toggle-status",
            type: "POST",
            data: {
                productId: productId, 
                status: product_status,
            },
            success: function(data) {
                if (data.status) {
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
        });
    });
});