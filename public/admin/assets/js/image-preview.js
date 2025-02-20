$(document).ready(function() {
    $("#imageUpload").change(function(event) {
        let file = event.target.files[0]; // Get the selected file
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").attr("src", e.target.result)
                    .show(); // Update and show preview
            }
            reader.readAsDataURL(file);
        }
    });
});