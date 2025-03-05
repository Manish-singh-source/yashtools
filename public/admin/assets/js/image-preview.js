$(document).ready(function () {
    $("#imageUpload").change(function (event) {
        let file = event.target.files[0]; // Get the selected file
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#imagePreview").attr("src", e.target.result).show(); // Update and show preview
            };
            reader.readAsDataURL(file);
        }
    });

    // Live Preview for Image Upload
    $("#productDrawing").change(function (event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#product_drawing_preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $("#product_pdf").change(function (event) {
        let file = event.target.files[0]; // Get the selected file

        if (file) {
            let objectURL = URL.createObjectURL(file); // Create a temporary URL for the file
            $("#product_pdf_preview")
                .attr("href", objectURL)
                .text("Preview PDF")
                .show();
        }
    });
    $("#product_optional_pdf").change(function (event) {
        let file = event.target.files[0]; // Get the selected file

        if (file) {
            let objectURL = URL.createObjectURL(file); // Create a temporary URL for the file
            $("#product_optional_pdf_preview")
                .attr("href", objectURL)
                .text("Preview PDF")
                .show();
        }
    });
    $("#product_catalogue").change(function (event) {
        let file = event.target.files[0]; // Get the selected file

        if (file) {
            let objectURL = URL.createObjectURL(file); // Create a temporary URL for the file
            $("#product_catalogue_preview")
                .attr("href", objectURL)
                .text("Preview Catalogue")
                .show();
        }
    });
    
    $("#product_specs").change(function (event) {
        let file = event.target.files[0]; // Get the selected file

        if (file) {
            let objectURL = URL.createObjectURL(file); // Create a temporary URL for the file
            $("#product_specs_preview")
                .attr("href", objectURL)
                .text("Preview Specs")
                .show();
        }
    });
});
