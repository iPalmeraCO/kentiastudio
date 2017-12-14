<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



class MailM
{


public $Host; 		
public $username;   
public $password;   
public $namesend;
public $secure;   
public $port;   

public function __construct() 
    {
        $this->host     = "smtp.gmail.com";
        $this->username = "julian.escobar@ipalmera.co";
        $this->password = "Riverplate_12";
        $this->namesend = "Kentia Studio";
        $this->secure   = "tls";
        $this->port     = "587";        
    }

public function enviarmail($emailenviar, $nombre, $asunto, $plantilla, $archivo) {

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = $this->host;  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = $this->username;                 // SMTP username
	    $mail->Password = $this->password;                           // SMTP password
	    $mail->SMTPSecure = $this->secure;                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = $this->port;                                    // TCP port to connect to
	    $mail->SMTPOptions = array (
	    'ssl' => array (
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	    )
	);

	    //Recipients
	    $mail->setFrom($this->username, $this->namesend);
	    $mail->addAddress($emailenviar, $nombre);     // Add a recipient    
	    $mail->addReplyTo($this->username, $this->namesend);

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject =  $asunto;
	    $mail->Body    =  $plantilla;	    
	    $mail->CharSet = 'UTF-8';	
	    if ($archivo != -1){
	    	$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);	
		}	    
	    $mail->send();
	    
	} catch (Exception $e) {
	    echo 'Message could not be sent.';
	    print_r($e);
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}

}

?>