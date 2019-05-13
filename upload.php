<?php

require "3-config.php";

/* [Error Handling] */
if ($_FILES['upFile']['size']==0) { die("No file selected"); }
if (exif_imagetype($_FILES['upFile']['tmp_name'])===false) { die("Not an image"); }

/* [Datenbankverbindung] */
$pdo = new PDO(
  "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
  DB_USER, DB_PASSWORD,
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false]
);

/* [Image Upload] */
// mehr error handling ?
try {
	$stmt = $pdo->prepare("INSERT INTO `upload` (`name`, `data`) VALUES (?, ?)");
	$stmt->execute([$_FILES["upFile"]["name"], file_get_contents($_FILES['upFile']['tmp_name'])]);
} catch (Exception $ex) {
	echo "ERROR - " . $ex->getMessage();
	die();
}

/* [ON COMPLETE] */
// DO SOMETHING, MAYBE REDIRECT THE USER TO ANOTHER PAGE
// header("Location: http://example.com/abc.php");
echo "OK";
?>
