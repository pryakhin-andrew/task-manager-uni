<?php
// Устанавливаем прошедшее время для cookie, например на секунду назад
setcookie('email', '', time() - 1, "/");
header('Location: /login.php');