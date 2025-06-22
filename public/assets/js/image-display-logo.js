const fileInput = document.getElementById("logo_light");
const fileInputTwo = document.getElementById("logo_dark");

fileInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewOne");

    if (file && file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.style.display = "none";
    }
});

fileInputTwo.addEventListener("change", function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById("previewTwo");

    if (file && file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.style.display = "none";
    }
});
