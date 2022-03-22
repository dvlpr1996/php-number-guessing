<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>PHP Number guessing game</title>
	<meta charset="UTF-8">
	<meta name="language" content="en">
	<meta name=”robots” content="index , follow">
	<!-- todo : add github links -->
	<meta name="designer" content="Nima jahan bakhshian">
	<meta name="owner" content="Nima jahan bakhshian">
	<meta name="description" content="The user has to guess the randomly generated number that lies between the range from 1 to 500">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="./assets/img/fav-icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./assets/vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/style.min.css">
	<!-- [if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif] -->
	<style>

	</style>
</head>

<body>

	<?php if (isset($_SESSION["msg"]["result"]) && !empty($_SESSION["msg"]["result"])) : ?>
		<?php unset($_SESSION["msg"]["result"]) ?>
	<?php endif ?>

	<div class="container-fluid">

		<div class="d-flex flex-column justify-content-center align-items-center text-center vh-100">

			<div class="row">
				<h1>PHP Number Guessing Game</h1>
			</div>

			<div class="row mt-4">
				<h4>guessing numbers between 1 & 500</h4>
				<form action="process/action.php" method="POST" class="mt-2">

					<div>
						<input type="text" class="text-center" name="number" placeholder="Enter Your Number" minlength="1" maxlength="3" autofocus required>
					</div>

					<?php if (isset($_SESSION["msg"]["error"]) && !empty($_SESSION["msg"]["error"])) : ?>

						<div class="row justify-content-center mt-4">
							<div class="col-6">
								<div class="alert alert-danger">
									<?= $_SESSION["msg"]["error"] ?>
								</div>
							</div>
						</div>

						<?php unset($_SESSION["msg"]["error"]) ?>
					<?php endif ?>

					<div class="mt-3">
						<button type="submit" class="btn" name="send" value="check">check</button>
					</div>

				</form>

				<div class="row mt-4">
					<div>
						<p>Your Number : <?= $_SESSION["numbers"]["number"] ?? "000" ?></p>
						<p>Our Number : <?= $_SESSION["numbers"]["rand_num"] ?? "000" ?></p>
					</div>
				</div>
			</div>

		</div>

	</div>
</body>

</html>