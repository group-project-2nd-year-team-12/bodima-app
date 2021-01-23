var wrapper = document.getElementById("photo-wrapper");
var wrapper1 = document.getElementById("photo1");

wrapper1.querySelectorAll('input').forEach((input) => { input.addEventListener('change', readUrl) });
wrapper1.querySelectorAll('button').forEach((button) => { button.addEventListener('click', removeImg) });
inputs = wrapper.querySelectorAll('input').forEach((input) => { input.addEventListener('change', readUrl) });
inputs = wrapper.querySelectorAll('button').forEach((button) => { button.addEventListener('click', removeImg) });

function readUrl(event) {

    var photo = event.target.parentNode;

    photo.querySelector("label>img").src = URL.createObjectURL(event.target.files[0]);



}

function removeImg(event) {
    console.log("nima");
    var photo = event.target.parentNode.parentNode;
    photo.querySelector('label>img').src = "https://img.icons8.com/carbon-copy/100/000000/compact-camera.png";

    photo.querySelector('input').value = "";

}