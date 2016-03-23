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
			<input type="submit" name="submit" value="Verstuur naar database"></input>
		</form>
		<?php
			if(isset($_POST["submit"])){
			$hostname='localhost';
			$username='root';
			$password='';
		
			try{
				$databaseConn = new PDO("mysql:host=$hostname;dbname=mdb",$username,$password);
				$databaseConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO formnaamemail (email, naam) VALUES ('".$_POST["email"]."','".$_POST["naam"]."')";
				if ($databaseConn->query($sql)) {
					echo "SUCCESS";
				}else{
					echo "FAILED TO EXECUTE!";
				}
				
				$databaseConn = null;
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}	
			}
		?>
	</body>
</html>