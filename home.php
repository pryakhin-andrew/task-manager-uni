<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php require_once "layout/header.php" ?>

<div class="wrapper">
    <div class="hero container">
        <div class="hero--info">
            <h2>Manage your life</h2>
            <h1>Organize your life with RSB company</h1>
            <p>
                We have created an application that will make your life easier. Manage your tasks and projects,
                stay focused and live your best life.
            </p>
            <a href="task-manager.php" class="btn">Try task manager</a>
            <a style="margin-left: 30px">Or</a>
            <a style="margin-left: 30px" href="#" class="btn">Download App</a>
        </div>
        <img src="img/index-big-img.png" alt="">
    </div>

    <div class="container cards-container">
        <h3>What is waiting for you:</h3>

        <div class="cards">
            <?php
            global $pdo;
            require_once "lib/db.php";

            $sql = 'SELECT * FROM cards ORDER BY id DESC LIMIT 3';
            $query = $pdo->prepare($sql);
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($array as $el) {
                echo '<div class="block">
									<img src="/img/' . $el->image . '" alt="">
									<span>' . $el->description . '</span>
								</div>';
            }
            ?>

        </div>
    </div>
</div>

<div class="wrapper">
    <div class="container email">
        <div class="block">
            <div>
                <h4>Stay in the loop</h4>
                <p>Subscribe to receive the latest news and updates about RSB products.
                    We promise not to spam you! </p>
            </div>
            <div>
                <input type="email" id="emailField" placeholder="Enter email address">
                <button onclick="checkEmail()" type="submit">Continue</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "layout/footer.php" ?>

<script src="js/mailing.js"></script>
</body>
</html>