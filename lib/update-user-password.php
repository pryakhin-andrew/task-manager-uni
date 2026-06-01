<?php

global $password, $pdo;

// FILTER_SANITIZE_SPECIAL_CHARS удаляет специальные символы
$oldPassword = trim(filter_var($_POST['old-password'], FILTER_SANITIZE_SPECIAL_CHARS));
$newPassword = trim(filter_var($_POST['new-password'], FILTER_SANITIZE_SPECIAL_CHARS));
$newRePassword = trim(filter_var($_POST['new-re-password'], FILTER_SANITIZE_SPECIAL_CHARS));

require_once "db.php";

$userEmail = $_COOKIE['email'];

$sql = 'SELECT * FROM users Where email = ?';
$query = $pdo->prepare($sql);
$query->execute([$userEmail]);
$user = $query->fetch(PDO::FETCH_OBJ);

$password = $oldPassword;

require "password-encoder.php";

$oldPassword = $password;


if ($oldPassword == $user->password) {
	if (strlen($newPassword) >= 6) {
		if ($newPassword == $newRePassword) {
			$password = $newPassword;
			require "password-encoder.php";

			$sql = 'UPDATE users SET password = ? WHERE email = ?';
			$query = $pdo->prepare($sql);
			$query->execute([$password, $userEmail]);
		} else {
			echo "<script>alert('Old password and new password do not match');</script>";
			echo "<script>window.location.href = '/profile.php'</script>";
			exit();
		}

	} else {
		echo "<script>alert('Password must have 6 or more symbols');</script>";
		echo "<script>window.location.href = '/profile.php'</script>";
		exit();
	}
} else {
	echo "<script>alert('Incorrect old password');</script>";
	echo "<script>window.location.href = '/profile.php'</script>";
	exit();
}

header('Location: /profile.php');