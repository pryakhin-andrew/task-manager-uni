<?php
global $pdo;

// FILTER_SANITIZE_SPECIAL_CHARS удаляет специальные символы
$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$surname = trim(filter_var($_POST['surname'], FILTER_SANITIZE_SPECIAL_CHARS));

require_once "db.php";

$userEmail = $_COOKIE['email'];

$sql = 'SELECT * FROM users Where email = ?';
$query = $pdo->prepare($sql);
$query->execute([$userEmail]);
$user = $query->fetch(PDO::FETCH_OBJ);


if ($name != $user->name) {
	if ($name != '') {
		$sql = 'UPDATE users SET name = ? WHERE email = ?';
		$query = $pdo->prepare($sql);
		$query->execute([$name, $userEmail]);
	} else {
		echo "<script>alert('Name is empty');</script>";
		echo "<script>window.location.href = '/profile.php'</script>";
		exit();
	}
}

if ($surname != $user->surname) {
	if ($surname != '') {
		$sql = 'UPDATE users SET surname = ? WHERE email = ?';
		$query = $pdo->prepare($sql);
		$query->execute([$surname, $userEmail]);
	} else {
		echo "<script>alert('Surname is empty');</script>";
		echo "<script>window.location.href = '/profile.php'</script>";
		exit();
	}
}

header('Location: /profile.php');