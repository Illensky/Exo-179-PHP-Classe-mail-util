<?php
include '/classes/Mailutils';

$mail = new MailUtils('alexis.laroche.02240@gmail.com','test','testestestestest');
$mail->send();