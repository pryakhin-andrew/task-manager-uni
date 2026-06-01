<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"   content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?php require_once "layout/header.php" ?>

<div class="feedback">
	<div class="container">
		<h2>Login</h2>
		<p>Welcome back!</p>

		<form method="post" action="/lib/auth.php">

			<label>Email</label>
			<input type="email" class="one-line" name="email">

			<label>Password</label>
			<input type="password" class="one-line" name="password">

			<button type="submit">Login</button>
		</form>
	</div>
</div>

<?php require_once "layout/footer.php" ?>
</body>

</html>