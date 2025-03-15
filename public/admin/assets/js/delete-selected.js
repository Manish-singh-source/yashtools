$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#deleteAll", function () {
        let checkedValues = [];

        $(".multiSelectCheckbox:checked").each(function () {
            checkedValues.push($(this).val()); // Get value of each checked checkbox
        });

        let checkValues = checkedValues.filter((num) => num !== 0);

        const currentUrl = window.location.pathname; // Get only the path (e.g., /something)
        const newUrl = "/delete-" + currentUrl.replace(/^\/+/, ""); // Remove leading / and add /delete-

        $.ajax({
            url: newUrl,
            type: "POST",
            data: {
                checkValues: checkValues,
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
