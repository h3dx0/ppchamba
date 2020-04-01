<?php 
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
if(isset($_POST['nombre'])){
    $to = "robert@puntoreica.com"; // this is your Email address
    $from = "robert@puntoreica.com"; // this is the sender's Email address
    $first_name = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $subject = "Contacto desde la web";
    $message = $first_name . " " . $telefono . " dejo el siguiente mensaje en la web:" . "\n\n" . $_POST['mensaje'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    echo "Correo enviado. Muchas gracias " . $first_name . ", muy pronto estaremos en contacto.";
    header("refresh:5;url=index.html");
    }else{
        echo "Error enviando su mensaje";    
    }
    
?>
