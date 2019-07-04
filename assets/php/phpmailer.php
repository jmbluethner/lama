<?php

  // Check if Mailing even works!!

  function phpmailerSend($destination,$message,$subject) {
    $header = 'From: LAMA Server Manager' . "\r\n" .
        'Reply-To: test@test.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($destination, $subject, $message, $header);
  }
  
?>
