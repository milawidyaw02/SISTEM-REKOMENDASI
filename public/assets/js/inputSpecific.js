document.addEventListener("DOMContentLoaded", function () {
    var inputUkuran = document.getElementById("ukuran");
    var inputKapasitas = document.getElementById("kapasitas");
    var option1 = document.getElementById("radio1");
    var option2 = document.getElementById("radio2");

    option1.addEventListener("change", function () {
        if (option1.checked) {
            inputUkuran.style.display = "block";
            inputKapasitas.style.display = "none";
        } else {
            inputUkuran.style.display = "none";
        }
    });

    option2.addEventListener("change", function () {
        if (option2.checked) {
            inputKapasitas.style.display = "block";
            inputUkuran.style.display = "none";
        } else {
            inputKapasitas.style.display = "none";
        }
    });
});
