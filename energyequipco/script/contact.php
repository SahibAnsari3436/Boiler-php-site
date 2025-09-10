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

$icEmailTo 		= "info@example.com";   /* Receiver Email Address */
$icEmailFrom    = "Industry Contact";


function pr($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}


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
								
			$icEmailHeader  	= "MIME-Version: 1.0\r\n";
			$icEmailHeader 		.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$icEmailHeader 		.= "From:$icEmailFrom <$icEmail>";
			$icEmailHeader 		.= "Reply-To: $icEmail\r\n"."X-Mailer: PHP/".phpversion();
			if(mail($icEmailTo, $icMailSubject, $icMailMessage, $icEmailHeader))
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
					$msg   = 'Please enter valid phone number 12 digit with country code.';
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
			
			if ($error) {
				$icRes['msg'] = $msg;
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
			
			$icEmailHeader  	= "MIME-Version: 1.0\r\n";
			$icEmailHeader 		.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$icEmailHeader 		.= "From:$icEmailFrom <$icEmail>";
			$icEmailHeader 		.= "Reply-To: $icEmail\r\n"."X-Mailer: PHP/".phpversion();
			if(mail($icEmailTo, $icMailSubject, $icMailMessage, $icEmailHeader))
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