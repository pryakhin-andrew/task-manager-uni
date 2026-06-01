<header>
	<span class="logo">rsb</span>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>

			<li><a href="/task-manager.php">Task Manager</a></li>

			<li><a href="/register.php">Register</a></li>

			<?php
			if (isset($_COOKIE['email'])) {
				echo '<li class="btn"><a href="/profile.php">Profile</a></li>';
			} else {
				echo '<li class="btn"><a href="/login.php">Login</a></li>';
			}
			?>


		</ul>
	</nav>
</header>