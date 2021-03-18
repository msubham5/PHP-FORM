<?php

if(isset($_POST["register"]))
{

// Reading values of form data using POST method
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$skills = $_POST["skills"];
	$photo = $_POST["profile_pic"];
	$about = $_POST["about"];
	$address = $_POST["addr"];
	$education = $_POST["education"];
	$linkedin = $_POST["linkedin"];
	$github = $_POST["github"];


// Showing the data inputs by the user 
	echo "Your inputs:". "<br />";
	echo "-------------------------------------". "<br />";
	echo "Name: " . $name . "<br />";
	echo "Gender:";
	if ($gender==1) {
		echo "Male" . "<br/>";
	}
	else{
		echo "Female" . "<br/>";
	}
	echo "Email: " . $email . "<br />";
	echo "Phone: " . $phone . "<br />";
	echo "Skill: " ;
	foreach ($skills as $key => $value) {
		echo $value . ', ';
	}
	echo "<br/>";
	echo "Photo: " . $photo ."<br/>";
	echo '<img src="../upload/'.$photo .'" alt="Random image" />'."<br /><br />";
	echo "About: " . $about . "<br />";
	echo "Address: " . $address . "<br />";
	echo "Education Qualification: " . $education . "<br />";
	echo "Linkedin url: ". $linkedin. "<br/>";
	echo "Github url: ". $github. "<br/>";

}

?>