<!DOCTYPE html>
<html>
	<head>
		<title>Formulier</title>
	</head>
	<body>
		<form action="" method="POST">
			<label for="naam">Naam:</label>
			<input type="text" name="naam" required></input>
			<label for="email">Email:</label>
			<input type="text" name="email" required></input>
			<label for="bericht">Uw bericht:</label>
			<input type="textbox" name="bericht"></input>
			<input type="submit" name="submit" value="Verstuur naar database"></input>
		</form>
		<?php
		//DB configuration Constants
			define('_HOST_NAME_', 'localhost');
			define('_USER_NAME_', 'root');
			define('_DB_PASSWORD', '');
			define('_DATABASE_NAME_', 'mdb2');
	
			//PDO Database Connection
			try {
				$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
				$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
			
		if(isset($_POST["submit"])){
			$user = trim($_POST['naam']);
			$email = trim($_POST['email']);
			$message = trim($_POST['bericht']);
			$stmt = $databaseConnection->prepare("INSERT INTO form (user, email, bericht) VALUES (:naam, :email, :bericht)");
			$stmt->bindParam(':naam', $user);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':bericht', $message);
			$stmt->execute();
			echo "SUCCESS";
		}
		?>
	</body>
</html>