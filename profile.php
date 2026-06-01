<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?php require_once "layout/header.php" ?>

<div class="feedback">

	<?php
	global $pdo;
	$userEmail = $_COOKIE['email'];

	require_once "lib/db.php";

	$sql = 'SELECT * FROM users Where email = ?';
	$query = $pdo->prepare($sql);
	$query->execute([$userEmail]);
	$user = $query->fetch(PDO::FETCH_OBJ);
	?>

	<h2>Hello <?php echo htmlspecialchars($user->email) ?>.</h2>

	<form method="post" action="lib/update-user-data.php">
		<p style="margin-bottom: 30px"> Fill in only the fields you want to change. </p>

		<!--			XSS (Cross-Site Scripting) уязвимость при котором злоумышленник может вставить вредоносный
	 код на страницу, чтобы избежать этого, используется htmlspecialchars -->
		<label>Name</label>
		<input type="text" class="one-line" name="name" value="<?php echo htmlspecialchars($user->name) ?>">

		<label>Surname</label>
		<input type="text" class="one-line" name="surname" value="<?php echo htmlspecialchars($user->surname)
		?>">

		<button type="submit">Change</button>

	</form>

	<form style="margin-top: 150px" method="post" action="/lib/update-user-password.php">
		<p style="margin-bottom: 30px"> Change password </p>

		<label>Old Password</label>
		<input type="password" class="one-line" name="old-password">

		<label>New Password</label>
		<input type="password" class="one-line" name="new-password">

		<label>Repeat new password</label>
		<input type="password" class="one-line" name="new-re-password">

		<button type="submit">Change password</button>

	</form>

	<form class="container" style="margin-top: 150px">
		<a href="/lib/logout.php" class="logout-button">Logout</a>
		<a href="/remove-user.php" class="delete-button">Delete account</a>
	</form>

</div>

<?php require_once "layout/footer.php" ?>
</body>
</html>