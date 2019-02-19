<?php

$fullname =  filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

if(!empty($fullname)){
	if(!empty($email)){
		if(!empty($message)){

				$host="localhost";
				$dbusername="root";
				$dbpassword="";
				$dbname="LoveSpring";

				//Create Connection
				$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

				if (mysqli_connect_error()) {

				  die('Connection Error ('. mysqli_connect_errno() .') '.mysqli_connect_error());
				}
				else{
				  $sql = "INSERT INTO Submit(name, email,message)
				  values ('$fullname','$email','$message')";
				  if ($conn->query($sql)){
					echo "New record is inserted sucessfully";
				  }
				  else{
					echo "Error: ". $sql ."<br>".$conn->error;
				  }
				  $conn->close();
				}
			}
		else{
			echo "Error - Message Cannot Be Empty!";
			die();
	}
}
	else{
		echo "Email Space cannot be left Blank.";
		die();
	}
}

else{
	echo "Error: Name cannot be left blank.";
	die();
}


?>
