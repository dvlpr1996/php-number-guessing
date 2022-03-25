<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('HTTP/1.0 403 Forbidden', TRUE, 403);
	die(header('Location: ../403.html'));
}

$_SESSION = null;
$msg = null;

try {

	if ($_SERVER["REQUEST_METHOD"] !== "POST") {
		$msg = "invalid request try again";
	}

	if (!isset($_POST["send"]) || empty($_POST["send"]) || $_POST["send"] != "send") {
		$msg = "invalid request try again";
	}

	if (!isset($_POST["number"]) || empty($_POST["number"])) {
		$rand_num = null;
	}

	$number = filter_var($_POST["number"], FILTER_SANITIZE_NUMBER_INT);

	$number = intval($number);

	if (!is_numeric($number)) {
		$msg = "the input is not valid try again only accept the number between 1 and 500";
	}

	$options = [
		"options" => [
			"min_range" => 1,
			"max_range" => 500,
			"cleanData"
		]
	];

	if (
		filter_var($number, FILTER_VALIDATE_INT, $options) === 0 ||
		!filter_var($number, FILTER_VALIDATE_INT, $options) === false
	) {
		$msg = null;
	} else {
		$msg = "your input is not valid or not in the range";
	}

	$rand_num = mt_rand(1, 500);

	$_SESSION["msg"]["result"] = false;

	if ($rand_num == $number) {
		$_SESSION["msg"]["result"] = TRUE;
	}

	$_SESSION["msg"]["error"] = $msg;
	$_SESSION["numbers"]["rand_num"] = $rand_num;
	$_SESSION["numbers"]["number"] = $number;

	header("Location: ../index.php");
} catch (exception $e) {
	echo $e->getMessage();
}
