<?php
header('Access-Control-Allow-Origin: *');
//$userName = $_GET['inputName'];
/*
foreach ($_GET as $k=>$v){
	echo json_encode(array(
	    $k => sprintf($v),
	));
}
*/
// Заголовки письма
//    	$mail_subj = 'Вопрос с сайта ZELURIST.RU  / от '.$_GET['inputName'];
		$mail_subj = "=?utf-8?B?".base64_encode('Вопрос с сайта ZELURIST.RU  / от '.$_GET['inputName'])."?=";
    	$mail_headers = "From: info@zelurist.ru\n";
    	$mail_headers .= "Content-Type: text/plain; charset=UTF-8\n";
        $message = "Имя: ".$_GET['inputName']."\n";
    	$message .= "E-mail: ".$_GET['inputPhone']."\n";
    	$message .= "Телефон: ".$_GET['inputEmail']."\n";
    	$message .= "-----------------------------------------------------\n";
    	$message .= "Вопрос: ".$_GET['inputQuestion']."\n";
    	$message .= "-----------------------------------------------------\n";

//		pr($to);
       if (mail('7707439@mail.ru', $mail_subj, $message, $mail_headers)){
        if (mail('uuueeelll@gmail.com', $mail_subj, $message, $mail_headers)){
            echo json_encode(array('result' => 'ok',));
        }
        else{
            echo json_encode(array('result' => 'error',));
        }
	  }

//echo json_encode($_GET);
//echo json_encode(array('result' => 'ok',));

?>