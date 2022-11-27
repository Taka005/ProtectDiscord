<?php
require "./includes/discord.php";
require "./config.php";
require "./includes/lib.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Protect Discord</title>

    <link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<main>
        <div class="container w-75">
		    <h1 class="text-center text-light my-5">Protect Discord</h1>
        </div>
        <form action="" method="post" class="mb-4 position-absolute top-50 start-50 translate-middle">
            <input name="id" class="form-control form-control-lg" placeholder="検索するユーザーID" autocomplete="off" required>
        </form>
	</main>
</body>
