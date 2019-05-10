<?php
	if (isset($_POST['submit'])) {

		include_once 'dbh.inc.php';

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
			header("Location: ../signup.php?signup=empty");
			exit();
		} else {
			//Check if input characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
				header("Location: ../signup.php?signup=invalid");
				exit();
			} else {
				//Check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../signup.php?signup=email");
					exit();
				} else {
					//Check if username exists
					$sql = "SELECT * FROM user WHERE username=?";
					//Create a prepared statement
					$stmt = mysqli_stmt_init($conn);
					//Check if prepared statement fails
					if(!mysqli_stmt_prepare($stmt, $sql)) {
					    header("Location: ../index.php?login=error");
					    exit();
					} else {
						//Bind parameters to the placeholder
						//The "s" means we are defining the placeholder as a string
						mysqli_stmt_bind_param($stmt, "s", $username);

						//Run query in database
						mysqli_stmt_execute($stmt);

						//Check if user exists
						mysqli_stmt_store_result($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=usertaken");
							exit();
						} else {
							//Hashing the password
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							//Insert the user into the database
							$sql = "INSERT INTO user (firstname, lastname, email, username, password, birthdate, gender)
							VALUES (?, ?, ?, ?, ?, ?, ?);"; // ? = Anzahl der Variablen
							//Create second prepared statement
							$stmt2 = mysqli_stmt_init($conn);

							//Check if prepared statement fails
							if(!mysqli_stmt_prepare($stmt2, $sql)) {
							    header("Location: ../index.php?login=error");
							    exit();
							} else {
								//Bind parameters to the placeholder
								// "s = Anzahl der Variablen"
								mysqli_stmt_bind_param($stmt2, "sssssss", $firstname, $lastname, $email, $username, $hashedPwd, $birthdate, $gender);

								//Run query in database
								mysqli_stmt_execute($stmt2);
								header("Location: ../signup.php?signup=success");
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
