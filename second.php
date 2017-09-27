
<?php

	if(isset($_POST['submit'])){
		echo "Form Submit received ! <br/>"; 
		
		$user = "jeeva";
		$password = "simple";
		$host = "localhost";
		$db = "users";
		$username = $_POST['username'];
		$pw = $_POST['password'];
		$connection = mysqli_connect($host,$user,$password,$db);
		
		if(mysqli_connect_error()){
			echo "Problem connecting ! <br/>";
		}else{
			echo "Successful !<br/>";
			$is_present = check_name($username);
			if($is_present){
				echo "Username Present already ! <br/>";
			}else{
				$query_string = "INSERT INTO user (name,password) VALUES ('{$username}','{$pw}');";
				$insert_status = mysqli_query($connection,$query_string);
				if(!$insert_status){
					echo "Problem Inserting ! <br/>";
				}else{
					echo "Inserted Successfully ! <br/>";
				}
			}
		}
		
	}else{
		echo "No Form Submit received ! <br/>"; 
	}
	
	function check_name($name){
		$user = "jeeva";
		$password = "simple";
		$host = "localhost";
		$db = "users";
		$connection = mysqli_connect($host,$user,$password,$db);
		if(mysqli_connect_error()){
			echo "Problem connecting ! <br/>";
		}else{
			$name_query = "SELECT name FROM user WHERE name = '{$name}'";
			$result = mysqli_query($connection,$name_query);
			echo "Result: ".mysqli_num_rows($result);
			if(mysqli_num_rows($result) == 0){
				return false;
			}else{
				return true;
			}
			
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Main Title </title>
</head>

<body>

</body>
</html>

<?php
mysql_close($connection);
?>