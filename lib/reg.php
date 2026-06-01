<?php
global $pdo;

// FILTER_SANITIZE_SPECIAL_CHARS удаляет специальные символы
$name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$surname = trim(filter_var($_POST['surname'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if ($name == '') {
	echo "<script>alert('Name is empty');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

if ($surname == '') {
	echo "<script>alert('Surname is empty');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

if ($email == '') {
	echo "<script>alert('Email is empty');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

if (!str_contains($email, '@') && !str_contains($email, '.')) {
	echo "<script>alert('Email must contain @ and .');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

if ($password == '') {
	echo "<script>alert('Password is empty');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

if (strlen($password) < 6) {
	echo "<script>alert('Password must have 6 or more symbols');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

require "db.php";

// Проверка email на уникальность
$sql = 'SELECT id FROM users WHERE email = ?';
$query = $pdo->prepare($sql);
$query->execute([$email]);

if ($query->rowCount() == 1) {
	echo "<script>alert('User with this email already exists');</script>";
	echo "<script>window.location.href = '/register.php'</script>";
	exit();
}

require "password-encoder.php";


// Если мы будем использовать сразу переменные вместо вопросительных знаков, это может привести к sql
// инъекциям
$sql = 'INSERT INTO users(name, surname, email, password) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$name, $surname, $email, $password]);

header('Location: /login.php');