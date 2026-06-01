<?php
global $password;

$secret = 'gfdgf56_909423142%#@%#JKhjkn'; // Secret на основе которого хэшируется пароль
$password = md5($secret . $password); // Функция хеширования