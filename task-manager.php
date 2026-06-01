<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Task Manager</title>
	<link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<?php require_once "layout/header.php" ?>

<div class="task-container">
	<div class="main">
		<h2 class="title">To-Do List</h2>


		<div class="row">
			<input type="text" id="input-box" placeholder="Enter task name"/>
			<button onclick="addTask()">Add</button>
		</div>

		<ul id="list-container"></ul>
	</div>
</div>

<?php require_once "layout/footer.php" ?>

<script src="js/task-manager.js"></script>
</body>
</html>
