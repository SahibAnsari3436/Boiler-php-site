<?php
/*
Template Name: Industry & Factory HTML Template

Variable
	$recaptchaSecret : Recaptcha Secret Key
 
	$icName : Contact Person Name
	$icEmail : Contact Person Email
	$icMessage : Contact Person Message
	$icRes : response holder
	$icOtherField : Form other additional fields
	
	
	$icMailSubject : Mail Subject.
	$icMailMessage : Mail Body
	$icMailHeader : Mail Header
	$icEmailReceiver : Contact receiver email address
	$icEmailFrom : Mail Form title
	$icEmailHeader : Mail headers
*/
/* require ReCaptcha class */
require('recaptcha-master/src/autoload.php');

/* ReCaptch Secret */
$recaptchaSecret = '<!-- Put Your reCaptcha Secret Key -->';

$icEmailTo 		= "shabuddin@webzent.in";   /* Receiver Email Address */
$icEmailFrom    = "Energy Equipment Co. Inc.";

#### Load PHP Mailer Library ####
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'php_mail/vendor/autoload.php';
#### Load PHP Mailer Library End ####



// DB connection
$host = "localhost";
$username = "root";
$password = ""; // Change if needed
$database = "energyequipco_db";

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['icToDo']) && $_POST['icToDo'] === 'Contact') {
    $firstName = $_POST['icFirstName'];
    $lastName = $_POST['icLastName'];
    $email = $_POST['icEmail'];
    $phone = $_POST['icPhoneNumber'];
    $subject = $_POST['icOther'];
    $message = $_POST['icMessage'];

    // Save to database
    $stmt = $con->prepare("INSERT INTO contact_messages (first_name, last_name, email, phone_number, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!'); window.location.href = '../contact.php';</script>";
    } else {
        echo "<script>alert('Failed to send message.');</script>";
    }
    $stmt->close();
}

mysqli_close($con);





function pr($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

#### SMTP Mail Function ####
function smtp_mail($icEmailTo, $icEmailFrom, $icEmail, $icMailSubject, $icMailMessage)
{
    $mail = new PHPMailer(true);
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                		//Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dizzlebrand2024@gmail.com';               //SMTP username
    $mail->Password   = 'Webzent@tech2025';                         //SMTP password
    $mail->SMTPSecure = 'TLS';            						//Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($icEmailTo, $icEmailFrom);
    $mail->addAddress($icEmailTo, $icEmailFrom);     //Add a recipient
    $mail->addReplyTo($icEmail);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $icMailSubject;
    $mail->Body    = $icMailMessage;

    return $mail->send();
}
#### SMTP Mail Function End ####

try {
    if (!empty($_POST)) {
	
		$icRes = array('status' => 0, 'msg'=>'Something Went Wrong.');
	
		$reCaptchaEnable = isset($_POST['reCaptchaEnable']) ? $_POST['reCaptchaEnable'] : 1;
		
		
		if($reCaptchaEnable)
		{
		
			/* validate the ReCaptcha, if something is wrong, we throw an Exception,
				i.e. code stops executing and goes to catch() block */
			
			if (!isset($_POST['g-recaptcha-response'])) {
				$icRes['status'] = 0;
				$icRes['msg'] = 'ReCaptcha is not set.';
				echo json_encode($icRes);
				exit;
			}

			/* do not forget to enter your secret key from https://www.google.com/recaptcha/admin */
			
			$recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
			
			/* we validate the ReCaptcha field together with the user's IP address */
			
			$response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$response->isSuccess()) {
				$icRes['status'] = 0;
				$icRes['msg'] = 'ReCaptcha was not validated.';
				echo json_encode($icRes);
				exit;
			}
        }
		
		#### Contact Form Script ####
		if($_POST['icToDo'] == 'Contact')
		{
			$error 			= false;
			$icName			= !empty($_POST['icName'])?trim(strip_tags($_POST['icName'])):'';
			$icEmail		= !empty($_POST['icEmail'])?trim(strip_tags($_POST['icEmail'])):'';
			$icMessage		= !empty($_POST['icMessage'])?strip_tags($_POST['icMessage']):'';

			if(empty($icName)){
				
				if(isset($_POST['icFirstName']) || isset($_POST['icLastName'])){
					if(empty($_POST['icFirstName']) || empty($_POST['icLastName'])){
							$error	=	true;
							$msg	=	'Please fill name.';
					}else{
						$icName = $_POST['icFirstName'].' '.$_POST['icLastName'];
					}
				}else{
					$error	=	true;
					$msg	=	'Please fill name.';	
				}
				
			}else if(!isAlphabetic($icName)){
				$error = true;
				$msg	=	'Please enter alphbetic  characters.';
			}
			
			$icPhoneMessage  = '';
			if(isset($_POST['icPhoneNumber'])){
				
				$icPhoneNumber = !empty($_POST['icPhoneNumber']) ? $_POST['icPhoneNumber']:'';
				
				if(empty($icPhoneNumber)){
					$error = true;
					$msg   = 'Please enter phone number.';	
				}else if(!isValidPhonenumber($icPhoneNumber)){
					$error = true;
					$msg   = 'Please enter valid phone number.';
				}
				
				if(!empty($icPhoneNumber)){
					$icPhoneMessage = "Phone Number: $icPhoneNumber <br/>";
				}
				
			}
			
			if(empty($icEmail)){
				$error = true;
				$msg = 'Please enter email.';
			}else if (!filter_var($icEmail, FILTER_VALIDATE_EMAIL)) 
			{
				$error	=	true;
				$msg	= 'Wrong Email Format.';
			}
			
			if(empty($icMessage)){
				$error = true;
				$msg = 'Please enter message.';
			}
			
			if ($error) {
				$icRes['msg'] = $msg;
				echo json_encode($icRes);
				exit;
			}
			
			$icMailSubject = 'Industry|Contact Form: A Person want to contact';
			$icMailMessage	= 	"
								A person want to contact you: <br><br>
								Name: $icName<br/>
								Email: $icEmail<br/>".$icPhoneMessage."
								Message: $icMessage<br/>
								";
								
			$icOtherField = "";
			if(!empty($_POST['icOther']))
			{
				$icOther = $_POST['icOther'];
				$message = "";
				foreach($icOther as $key => $value)
				{
					$fieldName = ucfirst(str_replace('_',' ',$key));
					$fieldValue = ucfirst(str_replace('_',' ',$value));
					$icOtherField .= $fieldName." : ".$fieldValue."<br>";
				}
			}
			$icMailMessage .= $icOtherField; 
        
            #### Calling SMTP Mail Function ####
			$res = smtp_mail($icEmailTo, $icEmailFrom, $icEmail, $icMailSubject, $icMailMessage);
            #### Calling SMTP Mail Function End ####
            
			if($res)
			{
				$icRes['status'] = 1;
				$icRes['msg'] = 'We have received your message successfully. Thanks for Contact.';
			}
			else
			{
				$icRes['status'] = 0;
				$icRes['msg'] = 'Some problem in sending mail, please try again later.';
			}
			echo json_encode($icRes);
			exit;
		}
		#### Contact Form Script End ####
		
		#### Appointment Form Script ####
		if($_POST['icToDo'] == 'Appointment')
		{
			$error 			= false;
			$icName			= !empty($_POST['icName'])?trim(strip_tags($_POST['icName'])):'';
			$icEmail		= !empty($_POST['icEmail'])?trim(strip_tags($_POST['icEmail'])):'';
			
			if(empty($icName)){
				
				if(isset($_POST['icFirstName']) || isset($_POST['icLastName'])){
					if(empty($_POST['icFirstName']) || empty($_POST['icLastName'])){
							$error	=	true;
							$msg	=	'Please fill name.';
					}else{
						$icName = $_POST['icFirstName'].' '.$_POST['icLastName'];
					}
				}else{
					$error	=	true;
					$msg	=	'Please fill name.';	
				}
				
				
			}else if(!isAlphabetic($icName)){
				$error = true;
				$msg	=	'Please enter alphbetic  characters.';
			}
			
			$icPhoneMessage  = '';
			if(isset($_POST['icPhoneNumber'])){
				
				$icPhoneNumber = !empty($_POST['icPhoneNumber']) ? $_POST['icPhoneNumber']:'';
				
				if(empty($icPhoneNumber)){
					$error = true;
					$msg   = 'Please enter phone number.';	
				}else if(!isValidPhonenumber($icPhoneNumber)){
					$error = true;
					$msg   = 'Please enter valid phone number.';
				}
				
				if(!empty($icPhoneNumber)){
					$icPhoneMessage = "Phone Number: $icPhoneNumber <br/>";
				}
			}
			
			if(empty($icEmail)){
				$error = true;
				$msg = 'Please enter email.';
			}else if(!filter_var($icEmail, FILTER_VALIDATE_EMAIL)){
				$error = true;
				$msg = 'Wrong Email Format.';
			}
			
			
			if ($error) {
				echo json_encode($icRes);
				exit;
			}
			
				
			
			$icMailSubject = 'Industry|Appointment Form: A Person want to contact';
			$icMailMessage	= 	"
								A person want to contact you: <br><br>
								Name: $icName<br/>
								Email: $icEmail<br/>".$icPhoneMessage."
								Message: $icMessage<br/>
								";
			$icOtherField = "";
			if(!empty($_POST['icOther']))
			{
				$icOther = $_POST['icOther'];
				$message = "";
				foreach($icOther as $key => $value)
				{
					$fieldName = ucfirst(str_replace('_',' ',$key));
					$fieldValue = ucfirst(str_replace('_',' ',$value));
					$icOtherField .= $fieldName." : ".$fieldValue."<br>";
				}
			}
			$icMailMessage .= $icOtherField; 
			
			#### Calling SMTP Mail Function ####
			$res = smtp_mail($icEmailTo, $icEmailFrom, $icEmail, $icMailSubject, $icMailMessage);
			#### Calling SMTP Mail Function End ####
			
			if($res)
			{
				$icRes['status'] = 1;
				$icRes['msg'] = 'We have received your message successfully. Thanks for Contact.';
			}
			else
			{
				$icRes['status'] = 0;
				$icRes['msg'] = 'Some problem in sending mail, please try again later.';
			}
			echo json_encode($icRes);
			exit;
		}	
		#### Appointment Form Script End ####
		
	}
} catch (\Exception $e) {
    $icRes['status'] = 0;
	$icRes['msg'] = $e->getMessage().'Some problem in sending mail, please try again later.';
	echo json_encode($icRes);
	exit;
}



function isAlphabetic($data){
	if (!preg_match('/[^A-Za-z 0-9]/', $data)) // '/[^a-z\d]/i' should also work.
	{
		return true;
	} else{
		return false;
	}
}

function isValidPhonenumber($phone_number){
	if(preg_match('/^[0-9]{10}+$/', $phone_number)) {
		return true;
	} else{
		return false;
	}
}

