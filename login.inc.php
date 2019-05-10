<?php
	if (isset($_POST['submit'])) {

		require 'dbh.inc.php';

		$username_mail = $_POST['username_mail'];
		$password = $_POST['password'];

		if (empty($username_mail) || empty($password)) {
			header("Location: ../index.php?login=empty");
			exit();
		}
		else {

			$sql = "SELECT * FROM user WHERE username=? OR email=?";

			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)) {
			    header("Location: ../index.php?login=sqlerror");
			    exit();
			}

			else {

				mysqli_stmt_bind_param($stmt, "ss", $username_mail, $username_mail);
				mysqli_stmt_execute($stmt);
	      $result = mysqli_stmt_get_result($stmt);

				if ($row = mysqli_fetch_assoc($result)) {

					$hashedPwdCheck = password_verify($password, $row['password']);

					if ($hashedPwdCheck == false) {
						header("Location: ../index.php?login=wrongpassword");
						exit();
					}

					elseif ($hashedPwdCheck == true) {

						session_start();

						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						header("Location: ../index.php?login=success");
						exit();
					}
	      } else {
	        header("Location: ../index.php?login=usernotfound");
				exit();
	      }
			}
		}

		mysqli_stmt_close($stmt);

	} else {
		header("Location: ../index.php?login=error");
		exit();
	}
