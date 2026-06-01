<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="/css/main.css">
</head>


<body>
<?php require_once "layout/header.php" ?>

<div class="feedback">
	<div class="container">
		<h2>Registration</h2>
		<p>Welcome. Tell us about yourself!</p>

		<form method="post" action="/lib/reg.php">
			<div class="inline">
				<div>
					<label>Name</label>
					<input type="text" name="name">
				</div>
				<div>
					<label>Surname</label>
					<input type="text" name="surname">
				</div>
			</div>
			<label>Email</label>
			<input type="email" class="one-line" name="email">

			<label>Password</label>
			<input type="password" class="one-line " name="password">

			<button type="submit">Register</button>
		</form>
	</div>
</div>

<?php require_once "layout/footer.php" ?>
</body>

</html>