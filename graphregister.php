<?php

include 'uriimage.php';
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$fleet = $_POST['fleet'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$wouldlike = $_POST['wouldlike'];
$blog = $_POST['blog'];
$msg = $_POST['msg'];


$servername = "localhost";
$username = "jmiguelvictoria";
$password = "304QwertyVM";
$dbname = "graphroute";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{


//.$name."', '".$email."', '".$company."', '".$fleet."', '".$phone."', '".$country."', '".$wouldlike."', '".$blog."', '".$msg."'"

$sql = "INSERT INTO register (name, email, company, fleet, phone,country,wouldlike,blog,msg)
VALUES ('".$name."', '".$email."', '".$company."', '".$fleet."', '".$phone."', '".$country."', '".$wouldlike."', '".$blog."', '".$msg."')";

if ($conn->query($sql) === TRUE) {
    
    echo "Gracias por escribir, en las próximas horas alguien del equipo comercial te contactará.";

    $to = $email;
    $subject = "¡Bienvenido a GraphRoute!";
    $message = "<html><head></head><body>";
    $message .= "Hola ".$name.",<br><br>";
    $message .= "Soy Miguel Victoria, Creador de GraphRoute.<br><br>";
    $message .= "Para nosotros es un gusto atenderte, en las próximas horas nos contácteremos para darte más detalles sobre GraphRoute.";
    
    if($blog == 'yes'){
        $message .= "<br>Adicional has quedado suscrito a nuestro Blog, te compartiremos noticias, consejos o temas relacionados con el mundo GraphRoute.";
    }
    
    $message .= "<br><br>Saludos <br>Miguel.<br>";
    $message .= "<img src='".$img."'/></body></html>";  

    
    $from = "info@graphroute.io";
    $headers = "From: GraphRoute " . $from . "\r\n";
    $headers .= 'Bcc: jmiguelvictoria@gmail.com'. "\r\n";
    $headers .= "Content-type: text/html";

    

    mail($to,$subject,$message,$headers);
    //echo "Mail Sent.";
    
    
} else {
    echo "Hubo un inconveniento en la recepción de sus datos, por favor contactenos telefónicamente."; //. $conn->error;
}

$conn->close();

    
}

?>
