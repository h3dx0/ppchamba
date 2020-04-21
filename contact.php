<?php
require("sendgrid/sendgrid-php.php"); 


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
if(isset($_POST['nombre'])){

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("hola@ppchambas.com", "Contacto web");
$email->setSubject("Contacto desde la web ");
$email->addTo("hola@ppchambas.com", "Contacto desde la web");
$first_name = $_POST['nombre'];
$telefono = $_POST['telefono'];
$emailUser = $_POST['correo'];
$message = $first_name . "con numero de telefono " . $telefono ." y correo ".$emailUser."\n" ." dejo el siguiente mensaje en la web:" . "\n\n" . $_POST['mensaje'];

$email->addContent("text/plain",$message);
$email->addContent(
    "text/html", $message
)
$sendgrid = new \SendGrid(getenv('SENDGRID_PHP'));
try {
    $response = $sendgrid->send($email);
/*    print $response->statusCode() . "\n";;
    print_r($response->headers());
    print $response->body() . "\n";*/
    echo "Correo enviado. Muchas gracias " . $first_name . ", muy pronto estaremos en contacto.";
    header("refresh:5;url=index.html");
} catch (Exception $e) {
    echo 'Error enviando mensaje: '. $e->getMessage() ."\n";
	}
}else{
    echo "debe ser un post";
}

?>
