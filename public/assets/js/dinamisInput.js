document.addEventListener("DOMContentLoaded", function () {
    const ukuranContainer = document.getElementById("ukuran-container");
    const addUkuranButton = document.getElementById("add-ukuran");

    let ukuranCount = 1;

    addUkuranButton.addEventListener("click", function () {
        const div = document.createElement("div");
        div.classList.add("mb-3", "ukuran-input");

        const inputUkuran = document.createElement("input");
        inputUkuran.type = "text";
        inputUkuran.classList.add("form-control");
        inputUkuran.name = "ukuran_tenda[]";
        inputUkuran.placeholder = "Ukuran Tenda ";

        const inputHarga = document.createElement("input");
        inputHarga.type = "text";
        inputHarga.classList.add("form-control");
        inputHarga.name = "harga_tenda[]";
        inputHarga.placeholder = "Harga";

        div.appendChild(inputUkuran);
        div.appendChild(inputHarga);
        ukuranContainer.appendChild(div);

        ukuranCount++;
    });
});
