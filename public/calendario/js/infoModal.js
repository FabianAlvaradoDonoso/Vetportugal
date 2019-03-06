var disponible = "#cccc";
var reservado = "#17a2b8";
var confirmado = "green";


$("#state_id").change(() => {
    
    if($("#state_id").val() == 1) {
        $("#state").css('color', confirmado);
    }
    else if($("#state_id").val() == 2) {
        $("#state").css('color', reservado);
    }
    else {
        $("#state").css('color', disponible);
    }
});