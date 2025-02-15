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
        alert("Checked Values: " + checkedValues.join(", "));
        console.log("Checked Values:", checkedValues);

        const currentUrl = window.location.pathname; // Get only the path (e.g., /something)
        const newUrl = "/delete-" + currentUrl.replace(/^\/+/, ""); // Remove leading / and add /delete-
        console.log(newUrl);

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
