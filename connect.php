<?php
//https://www.youtube.com/watch?v=mmz79gH0l6c - turn info from database into array

	// Set up connection credentials
	$url = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_d3student";
	
	$mysqli = mysqli_connect($url, $user, $pass, $db); //PC
	
	//check connection
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$query = "SELECT country_name,country_pop,country_completion,country_employment,country_edurating FROM tbl_country"; //query the database to grab the required info
	$result = $mysqli->query($query);
	$data = array();

	//turn the info into an array and get it ready for JavaScript

	if($result->num_rows != 0) {
		while($row = $result->fetch_assoc())
		{
		    $data[] = $row; //place the info found into array
		}
	}else{
		echo "no results found";
	}

	$result->close();
	$mysqli->close();

	$someJson = json_encode($data); //place the data into a readable json format for javascript

	//create a new json file and fill it with the array info (based on info from database) and insert it into the root file
	$newFile = fopen('newDataFile.json', 'w');
	fwrite($newFile, $someJson);
	fclose($newFile);

	echo $someJson;
?>