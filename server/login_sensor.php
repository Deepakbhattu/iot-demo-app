<html>
	<body>
		<?php
		include_once "db_connect.php";
		db_connect();
		$actuator = "actuator";
		$sql="SELECT name FROM board WHERE type='$actuator'";
		$result=mysql_query($sql);
		$sensor_name = $_SESSION["name"];
		?>
		<form name="login_sensor" action="register_value.php" method="post">
			<label> Sensor Name: </label>
			<input type='text' name='sensor_name'><br>
			<?php
			while($row = mysql_fetch_array($result, MYSQL_NUM)) { 
				echo "<label> $row[0]: </label>";
				echo "<input type='text' name='$row[0]'><br>";
				$actuator = 'actuator' . $num;
			}
	
			?>
			<input type="submit" name='submit' value="Submit">
		</form>
	</body>
</html>
