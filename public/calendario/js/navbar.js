var icon = true;
$("#menu-toggle").click((e) => {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if(icon) {
        $("#menu-toggle").html('<i class="fas fa-angle-double-left"></i>');
        icon = false;
    }
    else {
        $("#menu-toggle").html('<i class="fas fa-angle-double-right"></i>');
        icon = true;
    }
});