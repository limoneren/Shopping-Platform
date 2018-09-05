<?php

	define('db_hostname', 'istavrit.eng.ku.edu.tr');
	define('db_username', 'group8');
	define('db_password', 'group8comp306');
	define('db_name', 'group8');

	$conn = mysqli_connect(db_hostname,db_username,db_password,db_name);
	
	if (mysqli_connect_errno())
  	{
  		echo "Unsuccessfull connection to MySQL: " . mysqli_connect_error();
  	}
	
?>