<?
	// include $_SERVER['DOCUMENT_ROOT'] . '/module/amocrm.php';

	# Получить JSON как строку
	$json_str = file_get_contents('php://input');

	# Получить объект
	$json_obj = json_decode($json_str, true);

	//var_dump($json_obj);

	$name = $json_obj['name'];
	$phone = $json_obj['phone'];

	$answer = $json_obj['answers'];
	$answer_arr = array();

	$subject = 'Ответы на вопросы';

	$message.= '<div>Имя: '.$name.'</div>';
	$message.= '<div>Телефон: '.$phone.'</div>';

	foreach ($answer as $key => $value) {
		array_push( $answer_arr, $value );
		$message.= '<div><b>'.$key.':</b> '.$value.'</div>';
	}

	//var_dump($name);
	//var_dump($phone);
	//var_dump($answer_arr);
	//var_dump($message);

	$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
	$headers .= "From: sk-development@".$_SERVER['HTTP_HOST']; ;

	$to  = "serge-82@mail.ru";
	// $to  = "esmaevskiy@gmail.com";

	@mail($to, $subject, $message, $headers);
	//addContact( $name, "#skimperia", $phone, $email, $answer );
?>
