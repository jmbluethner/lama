<?php

  // Check if Mailing even works!!
  function checkMailing() {
    if(function_exists('mail')) {
      return true;
    }
    return false;
  }

  function phpmailerSend($destination,$message,$subject) {
    $header = 'From: LAMA Server Manager' . "\r\n" .
        'Reply-To: '.$_SERVER['SERVER_ADDR'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($destination, $subject, $message, $header)) {
      return true;
    }
    return false;
  }

?>
