<?php
$remitente = $request['email'];
$destinatario = 'f.fuentes.pro@gmail.com'; 
$asunto = 'Consulta a través de la web'; 
if (!$request){
?>

<?php
}else{
	 
    $cuerpo = "Nombre : " . $request["name"] . "\r\n"; 
    $cuerpo .= "Email: " . $request["email"] . "\r\n";
    $cuerpo .= "Consulta: " . $request["subject"] . "\r\n";
    $cuerpo .= "Mensaje: " . $request["message"] . "\r\n";

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "From: \"".$request['name']."\" <".$remitente.">\n";

    mail($destinatario, $asunto, $cuerpo, $headers);

}
?>