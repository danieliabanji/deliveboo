import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// // funzione di preview dell'immagine
// const previewImage = document.getElementById('image');
// previewImage.addEventListener('change', (event) =>{
//     var oFReader = new FileReader();
//     // var image  =  previewImage.files[0];
//     // console.log(image);
//     oFReader.readAsDataURL(previewImage.files[0]);

//     oFReader.onload = function (oFREvent) {
//         //console.log(oFREvent);
//         document.getElementById("uploadPreview").src = oFREvent.target.result;
//     };
// });

//preview image
if(document.getElementById('image')){
    const previewImage = document.getElementById('image');
    previewImage.addEventListener('change', (event) => {
    var oFReader = new FileReader();
    // var image  =  previewImage.files[0];
    // console.log(image);
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        //console.log(oFREvent);
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});
}