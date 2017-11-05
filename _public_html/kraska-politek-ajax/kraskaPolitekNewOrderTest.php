<?
header('Access-Control-Allow-Origin: *');
//pr($_GET);
$orderNum = time();
                

	// Заказ от физического лица
	if ( $_GET['inputPersonName']!='' ){
		$mail_subj = "=?utf-8?B?".base64_encode('Заказ с сайта KRASKA-POLITEK.RU  / от '.stripslashes($_GET['inputPersonName']))."?=";
		$mail_headers = "From: sales@kraska-politek.ru\n";
		$mail_headers .= "Content-Type: text/plain; charset=UTF-8\n";
		
		$message = "-----------------------------------------------------\n";
		$message .= "ФИО: ".stripslashes($_GET['inputPersonName'])."\n";
		$message .= "Телефон: ".stripslashes($_GET['inputPersonPhone'])."\n";
		$message .= "E-mail: ".stripslashes($_GET['inputPersonEmail'])."\n";
		$message .= "Оплата: ".$_GET['optionsPersonPayment']."\n";
		$message .= "Доставка: ".$_GET['optionsPersonShipping']."\n";
		$message .= "Комментарий: ".stripslashes($_GET['textareaPersonComment'])."\n";
		$message .= "-----------------------------------------------------\n";    
		$message .= "ЗАКАЗ:\n".$_GET['paintsList']."\n";
	}

	// Заказ от юридического лица
	if ( $_GET['inputCompanyName']!='' ){
		$mail_subj = "=?utf-8?B?".base64_encode('Заказ с сайта KRASKA-POLITEK.RU  / от '.stripslashes($_GET['inputCompanyName']))."?=";
		$mail_headers = "From: sales@kraska-politek.ru\n";
		$mail_headers .= "Content-Type: text/plain; charset=UTF-8\n";

		$message = "-----------------------------------------------------\n";
		$message .= "ФИО: ".stripslashes($_GET['inputCompanyName'])."\n";
		$message .= "Телефон: ".stripslashes($_GET['inputCompanyPhone'])."\n";
		$message .= "E-mail: ".stripslashes($_GET['inputCompanyEmail'])."\n";
		$message .= "Оплата: ".$_GET['optionsCompanyPayment']."\n";
		$message .= "Доставка: ".$_GET['optionsCompanyShipping']."\n";
		$message .= "Комментарий: ".stripslashes($_GET['textareaCompanyComment'])."\n";
		$message .= "-----------------------------------------------------\n";		
		// Оплата по безналу
		if ( $_GET['inputCompanyBeznalName']!='' ){
			$message .= "Название организации: ".stripslashes($_GET['inputCompanyBeznalName'])."\n";
			$message .= "ИНН: ".stripslashes($_GET['inputCompanyBeznalInn'])."\n";
			$message .= "КПП: ".stripslashes($_GET['inputCompanyBeznalKpp'])."\n";
			$message .= "Кор. счет: ".stripslashes($_GET['inputCompanyBeznalKorSchet'])."\n";
			$message .= "БИК: ".stripslashes($_GET['inputCompanyBeznalBik'])."\n";
			$message .= "Адрес: ".stripslashes($_GET['inputCompanyBeznalAddress'])."\n";
			$message .= "-----------------------------------------------------\n";    
		}		
		$message .= "ЗАКАЗ:\n".$_GET['paintsList']."\n";
	}
        
	if (mail('info@kraska-politek.ru', $mail_subj, $message, $mail_headers)){
		echo json_encode(array('result' => 'ok',));
		mail('uuueeelll@gmail.com', $mail_subj, $message, $mail_headers);
	}
	else{
		echo json_encode(array('result' => 'error',));
	}

?>