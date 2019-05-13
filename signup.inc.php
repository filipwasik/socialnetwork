<?php
	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$birthdate = $_POST['birthdate'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password =  $_POST['password'];
		// Input  Fehlerüberprüfung
			// leere Eingabe
		if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
			header("Location: ../signup.php?signup=empty");
			exit();
		} else {
			//Zeichen Überprüfung
			if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
				header("Location: ../signup.php?signup=invalid");
				exit();
			} else {
				//E-Mail Überprüfung
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?signup=email");
					exit();
				} else {
					//Username Überprüfung
					$sql = "SELECT * FROM user WHERE username=?";
					//prepared statement
					$stmt = mysqli_stmt_init($conn);
					//prepared statement TEST
					if(!mysqli_stmt_prepare($stmt, $sql)) {
					    header("Location: ../index.php?login=error");
					    exit();
					} else {
						//"s" = placeholder
						mysqli_stmt_bind_param($stmt, "s", $username);

						//Query ausführen
						mysqli_stmt_execute($stmt);

						//Username Überprüfung
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=usertaken");
							exit();
						} else {
							//Password Hashing
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							//in Datenbank einfügen
							$sql = "INSERT INTO user (firstname, lastname, email, username, password, birthdate, gender)
							VALUES (?, ?, ?, ?, ?, ?, ?);"; // ? = Anzahl der Variablen
							$stmt2 = mysqli_stmt_init($conn);

							//Fehlerüberprüfung Datenbank
							if(!mysqli_stmt_prepare($stmt2, $sql)) {
							    header("Location: ../index.php?login=error");
							    exit();
							} else {
								// "s = Anzahl der übergebenden Variablen"
								mysqli_stmt_bind_param($stmt2, "sssssss", $firstname, $lastname, $email, $username, $hashedPwd, $birthdate, $gender);

								//Query ausführen
								mysqli_stmt_execute($stmt2);
									header("Location: ../index.php?signup=success");
								exit();
							}
						}
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_stmt_close($stmt2);

	} else {
		header("Location: ../signup.php");
		exit();
	}
