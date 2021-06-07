<?php
	$user=getenv('USER');
	$db=getenv('DATABASE');
	$pass="password";
	$connection=mysqli_connect('localhost',$user,$pass,$db);
	// Check connection
	if (mysqli_connect_errno()) {
	  die("Failed to connect to MySQL: ".mysqli_connect_error());
	  
	}
	echo "Connection Succesfull! <br>";
	try{
		//Creating Table

		$sql_table = "CREATE TABLE IF NOT EXISTS users (
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(30) NOT NULL,
		email VARCHAR(50)
		)";

		if (mysqli_query($connection,$sql_table) === TRUE) {
		  echo "Table Users created successfully <br>";
		} else {
		  echo "Error creating table: " . $connection->error;
		}

		// Inserting Values
		$first_name=$_POST['firstname'];
		$last_name=$_POST['lastname'];
		$email=$_POST['email'];

	    $sql = "INSERT INTO users (first_name,last_name,email) values('$first_name','$last_name','$email')";
		mysqli_query($connection,$sql);
		echo "Data Added Successfully <br>";
		$select="SELECT * FROM users";
		$result=mysqli_query($connection,$select);
		$rowcount=mysqli_num_rows($result);
		if($rowcount > 0)
		{
			echo "Result has rows: ".$rowcount;
			echo "<br>";

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo "First Name: " . $row["first_name"]. " - Last Name: " . $row["last_name"]. "- Email: ".$row["email"] ."<br>";
			}
		}
		else
		{
			echo "No Results";

		}
		echo "<a href='index.php'> Add another user </a>";	
	}

	catch(Exception $e)
	{
		echo "Caught Exception: ", $e->message();
	}
	$connection->close();	
 ?>