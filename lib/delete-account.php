<?php
global $pdo;

// FILTER_SANITIZE_SPECIAL_CHARS удаляет специальные символы
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

require "password-encoder.php";

// DB
require "db.php";

$sql = 'SELECT id FROM users WHERE email = ? AND password = ?';
$query = $pdo->prepare($sql);
$query->execute([$email, $password]);

if ($query->rowCount() == 0) {
	echo "<script>alert('User not found');</script>";
	echo "<script>window.location.href = '/remove-user.php'</script>";
	exit();
} else {
	$sql = 'DELETE FROM users WHERE email = ?';
	$query = $pdo->prepare($sql);
	$query->execute([$email]);
	setcookie('email', '', time() - 1, "/");
	header('Location: /register.php');
}

