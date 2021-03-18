<?php

if(isset($_POST["register"])) {

    $name = $_POST["name"];
    $gender = '';
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $skills = '';
    $about = $_POST["about"];
    $address = $_POST["addr"];
    $education = $_POST["education"];
    $linkedin = $_POST["linkedin"];
    $github = $_POST["github"];

    $error = false;

	// Validation for Name 
    if ( empty($name)) {
    	echo "Enter your name". "<br />";
    	$error = true;
    } 

    elseif (!preg_match('/^[A-Za-z ]+$/', $name)) {
    	echo "Name should only contain alphabets" . "<br />";
    	$error = true;
    }

    elseif (strlen($name) < 3) {
    	echo "Name should be more than 3 characters" . "<br />";
    	$error = true;
    }

	// Validation for Gender
    if (empty($_POST["gender"])) {
    	echo "Please select your gender". "<br />";
    	$error = true;
    }
    else {
    	$gender = $_POST["gender"];
    }


	// Validation for Skills
    if (empty($_POST["skills"])) {
    	echo "Please select atleast one skill" . "<br/>";
    	$error = true;
    }
    else{
    	$skills = $_POST['skills'];
    }

	// Validation for Email 
    if (empty($email)) {
    	echo "Enter your email" . "<br />";
    	$error = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	echo "Enter a valid email address" . "<br />";
    	$error = true;
    }

	// Validation for Phone Number 
    if (empty($phone)) {
    	echo "Enter your Phone number" . "<br />";
    	$error = true;
    }

    elseif (!preg_match('/^[0-9]+$/', $phone)) {
    	echo "There can be only numbers" . "<br />";
    	$error = true;
    }

    if (strlen($phone) != 10) {
    	echo "Phone number should be 10 digits long" . "<br />";
    	$error = true;
    }

	// validation for File 
    if(!empty($_FILES["profile_pic"]["name"])) {
        if($_FILES["profile_pic"]["error"] == 0) {
            // Allowed file types array
            $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");
            
            if((in_array($_FILES["profile_pic"]["type"], $allowed_types))) {
                // Get the dot position
                $dot_pos = strrpos($_FILES["profile_pic"]["name"], ".");
                
                // From dot position to the end is the extension
                $extension = substr($_FILES["profile_pic"]["name"], $dot_pos);
                
                // use date function to get random number
                $random_name = date("YmdHis");
                
                // add date function value with extension to get unique new file name
                $new_name = $random_name . $extension;
                

                if($_FILES["profile_pic"]["size"] < 200000) {
                    $uploaded = move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "upload/" . $new_name);
                    
                    if($uploaded) {}
                    else {
                        echo "File could not be uploaded". "<br />";
                        $error = true;
                    }   
                }
                else {
                    echo "File should be less than 20KB " . "<br />" . "Your file size: " . $_FILES["profile_pic"]["size"]. "<br />";
                    $error = true;
                }
            }
            else {
                // Invalid file type
                echo "Please upload JPG or PNG files". "<br />";
                $error = true;
            }
        }
        else {
            // Error with the file uploading
            echo "There are some errors with the file". "<br />";
            $error = true;
        }
    }
    else {
        //error message for not selecting any file
        echo "Please browse a file to upload". "<br />";
        $error = true;
    }

// About Validation
    if (empty($about)) {
    	echo "Please enter something about yourself" . "<br />";
    	$error = true;
    }

    elseif (strlen($about) < 10) {
    	echo "About section should be more than 10 characters" . "<br />";
    	$error = true;
    }

// Address Validation
    if (empty($address)) {
    	echo "Address field should not be empty" . "<br />";
    	$error = true;
    }

    elseif (strlen($address) < 8) {
    	echo "Address section should be more than 8 characters" . "<br />";
    	$error = true;
    }

// Education Validation
    if ($education == '0') {
    	echo "Please choose your educational qualification" . "<br />";
    	$error = true;
    }

// Professional link validation
	if (empty($linkedin)) {
	    	echo "Please enter your Linkedin url". "<br/>";
	    	$error = true;
	}

	else{
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
            echo "Please enter a valid url". "<br/>";
            $error = 'true';
          }
	}

	if (empty($github)) {
		echo "Please enter your Github url" . "<br/>";
		$error = true;
	}
	else{
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
            echo "Please enter a valid url". "<br/>";
            $error = 'true';
          }
	}

    if(!$error) {
    	echo "Your inputs:". "<br />";
    	echo "-------------------------------------". "<br />";
    	echo "Name: " . $name . "<br />";
    	echo "Gender: " . $_POST['gender'] . "<br />";
    	echo "Email: " . $email . "<br />";
    	echo "Phone: " . $phone . "<br />";
    	echo "Skill: ";
    	foreach ($skills as $key => $value) {
    		echo $value.", "."\r";
    	}
    	echo "<br/>";
    	echo "File uploaded successfully". "<br />";
    	echo "About: " . $about . "<br />";
    	echo "Address: " . $address . "<br />";
    	echo "Education Qualification: " . $education . "<br />";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Form Validation in PHP</title>
</head>
<body>
	<div class="container" id="main_container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<header class="card-header">
						<a href class="float-right btn btn-outline-primary mt-1">Log In</a>
						<h4 class="card-title mt-2">Form Validation Assignment in PHP</h4>
					</header>
					<article class="card-body">
						<form  id="signup" class="form" method="post" action="#" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col">
									<label  for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name">
									<span class="error">This field is required</span>
								</div>														
							</div>
							
							<div class="form-group">
								<label class="form-check-inline">
									<input class="form-check-input" type="radio" id="male" name="gender" value="male">
									<span class="form-check-label"> Male </span>
								</label>
								<label class="form-check-inline">
									<input class="form-check-input" type="radio" id="female" name="gender" value="female">
									<span class="form-check-label"> Female </span>
								</label>
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email">
								<span class="error">A valid email address is required</span>
							</div>
							<div class="form-group">
								<label for="phone">Contact Number</label>
								<input type="text" class="form-control"  name="phone">
								<span class="error">This field is required</span>
							</div>
							
							<div class="form-group">
								<label>Skills</label>
							</div>
							<div class="form-group ml-5">
								<label class="checkbox-inline" for="c++"><input type="checkbox" name="skills[]" class="checkboxvar" value="c++" id="c++"> C++ </label>
								<label class="checkbox-inline" for="java"><input type="checkbox" name="skills[]" class="checkboxvar" value="java" id="java"> Java </label>
								<label class="checkbox-inline" for="python"><input type="checkbox" name="skills[]" class="checkboxvar" value="python" id="python"> Python </label>
								<label class="checkbox-inline" for="html"><input type="checkbox" name="skills[]" class="checkboxvar" value="html" id="html"> HTML </label>
								<label class="checkbox-inline" for="php"><input type="checkbox" name="skills[]" class="checkboxvar" value="php" id="php"> PHP</label>
								
								<span class="error">Please select atleast one skill</span>
							</div> 
							<div class="form-group">
								<label for="file">Upload Profile Photo:</label>
								
								<input type="file" class="form-control" name="profile_pic" id="file">
								<span class="error">Please upload a profile photo</span>
							</div>
							<div class="form-group">
								<label for="about">About</label>
								<textarea class="form-control" rows="3" name="about" placeholder="Enter something about yourself." id="about"></textarea>
								<span class="error">This field is required</span>
							</div>
							<div class="form-group">
								<label for="addr">Address</label>
								<input type="text" class="form-control" id="addr" name="addr">
								<span class="error">This field is required</span>
							</div>
							<div class="form-group">
								<label for="education">Educational Qualification</label>
								<div class="dropdown" id="drop_education" name="drop_education">
									<select id="education" class="form-control" name="education">
										<option value="0">Choose</option>
										<option value="metric">Metric</option>
										<option value="higher_secondary">Higher Secondary</option>
										<option value="graduate">Graduate</option>
										<option value="post_graduate">Post Graduate</option>
									</select>
									<span class="error">This field is required</span>	
								</div>
							</div>
							<div class="form-group">
								<label for="links">Professional Links:</label>
								<br>
								<input type="text" name="linkedin" placeholder="LinkedIn link">
								<input type="text" name="github" placeholder="Github">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-outline-success" name="register">Submit</button>
							</div>
						</form>
					</article>
				</div>
			</div>
			<div class="form-group">
				
			</div>
		</div>
	</div>

	<!-- scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/form.js"></script>

</body>
</html>