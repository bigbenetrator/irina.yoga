<?


//pr($_GET);
$orderNum = time();
foreach ($_GET as $k=>$v){
    $GET_DATA[$k] = $v;//iconv("utf-8", "windows-1251", $v);
}

//pr($FEEDBACK_DATA);
// если форма была отправлена
                
        
// Заголовки письма
	$mail_subj = 'kraska-politek.ru / new order';
	$mail_headers = "From: info@kraska-politek.ru\n";
//	$mail_headers .= "Content-Type: text/plain; charset=windows-1251\n";
	$mail_headers .= "Content-Type: text/plain; charset=UTF-8\n";
	$message = "-----------------------------------------------------\n";
	$message .= "ФИО: ".$GET_DATA['name']."\n";
	$message .= "Телефон: ".$GET_DATA['phone']."\n";
	$message .= "E-mail: ".$GET_DATA['email']."\n";
	$message .= "Оплата: ".$GET_DATA['payment']."\n";
	$message .= "Доставка: ".$GET_DATA['shipping']."\n";
	$message .= "Комментарий: ".$GET_DATA['comment']."\n";
	$message .= "-----------------------------------------------------\n";    
	$message .= "ЗАКАЗ:\n".$GET_DATA['paintsList']."\n";
        

		if ( mail('uuueeelll@gmail.com, info@kraska-politek.ru', $mail_subj, $message, $mail_headers) ){
  	     $res = array(
              'txt'   => 'mail sent !!! OK!!!',
              'status'=>'OK',
          );
		}else{
    	   $res = array(
                'txt'   => 'mail sending error',
                'status'=>0,
           );
		};// Тестирование
    	/*if (0){//mail($EBOX['mailto'], $mail_subj, $message, $mail_headers)){
    	   if (mail($FEEDBACK_DATA['email'], $mail_subj, $message, $mail_headers)){
    	     $res = array(
                'txt'   => 'mail sent !!! OK!!!',
                'status'=>'OK',
            );  
    	   }//клиенту   
    	}else{
    	   $res = array(
                'txt'   => 'mail sending error',
                'status'=>0,
           );  
    	}*/
        
        
    


// вывод в XML формате
	header('Content-Type: text/xml');
	echo '<data>';
	// Return total number of images so the callback
	// can set the size of the carousel.
    foreach($res as $k=>$v){
        echo "<$k>$v</$k>";
    }
	echo '</data>';

?>