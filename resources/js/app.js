import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

//preview image
if (document.getElementById("image")) {
    const previewImage = document.getElementById("image");
    previewImage.addEventListener("change", (event) => {
        var oFReader = new FileReader();
        // var image  =  previewImage.files[0];
        // console.log(image);
        oFReader.readAsDataURL(previewImage.files[0]);

        oFReader.onload = function (oFREvent) {
            //console.log(oFREvent);
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    });
}

// function for button 'delete' in modal
const deleteSubmitButtons = document.querySelectorAll(".delete-button");

deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute("data-item-title");

        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector("button.btn-danger");

        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});

window.Chart = require('chart.js');
