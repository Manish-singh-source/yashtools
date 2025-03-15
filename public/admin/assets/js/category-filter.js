$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // On home page Popular dishes filter API
    $(document).on("change", ".product_category", function() {
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let categoryId = parseInt($(this).val()) || 0;

        $.ajax({
            url: "/fetch-sub-categories",
            type: "POST",
            data: {
                categoryId: categoryId
            },
            success: function(data) {
                let content = "";
                if (data.status) {
                    data.subcategories.forEach((element) => {
                        content +=
                            `<option value="${element.id}">${element.sub_category_name}</option>`;
                    });
                    $("#product_sub_category").html(content);
                }
            },
            error: function(xhr, status, error) {
                let content = "";
                content += `<option value="0">Select Sub Category</option>`;
                $("#product_sub_category").html(content);
            },
        });
    });
});