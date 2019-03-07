function cambiarImagen() {
    input = document.getElementById("imagen")
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("showImg").remove()
            jQuery('#colocar').html('<img id="showImg" src="'+e.target.result+'" class="" style="height: 200px; width:200px; margin-left: 15vw; margin-top: 5%;" alt="">')
        }
        reader.readAsDataURL(input.files[0]);
    }
}
