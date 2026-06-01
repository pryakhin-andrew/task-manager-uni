<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Removing</title>
	<link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?php require_once "layout/header.php" ?>

<div class="feedback">
	<div class="container">
		<h2>Are you sure you want to delete the account?</h2>
		<p>To delete your account, confirm your email and password.</p>

		<form method="post" action="/lib/delete-account.php">

			<label>Email</label>
			<input type="email" class="one-line" name="email">

			<label>Password</label>
			<input type="password" class="one-line" name="password">

			<button class="delete-button" type="submit">Delete Account</button>
		</form>
	</div>
</div>

<?php require_once "layout/footer.php" ?>
</body>

</html>