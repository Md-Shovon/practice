<?php
include ('connect.php');

	if(isset($_POST['submit'])){
		//echo "<pre>";
		//print_r($_POST);
		//print_r($_FILES);

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rpw = $_POST['rpw'];
		$dob = $_POST['dob'];
		$mobile = $_POST['mobile'];
		$picture = $_FILES['picture']['name'];
		$error = 0;
		$msg = "";

		try {
		    $insert = "INSERT INTO students VALUES('','$name','','','','','','','','')";

        }catch(exception $e){
		    echo "<p>DATA INSERTED SUCCESSFULLY</p>";

        }

		if (isset($_POST["gender"])){
        $gender = $_POST["gender"];}
		
		if($name == "" || is_numeric($name)){
			$error = $error+1;
			$msg .= "<p>* name required</p>";
		}
		if($email == "" || filter_var($email,FILTER_VALIDATE_EMAIL) == false){
			$error = $error+1;
			$msg .= "<p>* email required</p>";
		}
		if($password == "" || !preg_match('/[0-9]?[A-Z]/',$password)){
			$error = $error+1;
			$msg .= "<p>* password must be Numbers with a capital letter </p>";
		}
/*(if($password !=$rpw){
            $error = $error+1;
            $msg .= "<p>* password Match required</p>";
        }
		if($dob != ""){
			$explode = explode('-',$dob);
			$count = count($explode);
			if($count == 3){
				list($y,$m,$d) = $explode;
				if(isset($m) && isset($d) && isset($y)){
					if(checkdate($m,$d,$y) == false){
						$error = $error+1;
						$msg .= "<p>* date formate problem</p>";
					}

				}
			}else{
				$error = $error+1;
				$msg .= "<p>* date formate problem</p>";
			}
		}
		if($dob == ""){
			$error = $error+1;
			$msg .= "<p>* date field required</p>";
		}*/
		if($mobile == "" || !is_numeric($mobile)){
			$error = $error+1;
			$msg .= "<p>* phone required</p>";
		}
        if(empty($_POST["gender"])){
            $error = $error+1;
            $msg .= "<p>* gender required</p>";
        }
		
		if($error == 0){
			echo "data ok";
		}else{
			echo $msg;
		}
		
		
	}



?>



<!doctype html>
<html>
<head>
	<title> Form Validation with php </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
</head>
 
<body>
	<div class="form-validaton">
		<h2> Form Validation	</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<table id="table">
				<tr class="row">
					<td class="label"> <label for="name"> Name </label></td>
					<td> <input class="text" type="text" id="name" name="name" placeholder="Name"  ></td>
				</tr>
				<tr class="row">
					<td class="label"> <label for="email"> Email </label></td>
					<td> <input class="text" type="text" id="email" name="email" placeholder="Email"  ></td>
				</tr>
				<tr class="row">
					<td class="label"> <label for="password"> Password </label></td>
					<td> <input class="text" type="password" id="password" name="password" placeholder="Password"  ></td>
				</tr>
				<!--<tr class="row">
					<td class="label"> <label for="rpw">Re-type Password </label></td>
					<td> <input class="text" type="password" id="rpw" name="rpw" placeholder="Re-type Password"  ></td>
				</tr>
				<tr class="row">
					<td class="label"> <label for="dob"> Date of Birth </label></td>
					<td>
						 <input class="text" type="date" id="dob" name="dob"  >
					</td>
				</tr>-->
				<tr class="row">
					<td class="label"> <label for="mobile"> Mobile Number</label></td>
					<td>
						 <input class="text" type="tel" id="mobile" name="mobile" placeholder="018-3853-4028">
					</td>
				</tr>

                <tr class="row">
                    <td class="label"> <label for="Address"> Address</label></td>
                    <td>
                        <input class="text" type="text" id="Address" name="Address" placeholder="Your address">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="Biography"> Biography</label></td>
                    <td>
                        <input class="text" type="text" id="Biography" name="Biography" placeholder="Your Biography">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="Skill_level"> Skill level</label></td>
                    <td>
                        <input class="text" type="number" id="Skill_level" name="Skill_level" placeholder="Skill_level">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="HSC"> HSC</label></td>
                    <td>
                        <input class="text" type="text" id="HSC" name="HSC" placeholder="HSC">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="SSC"> SSC</label></td>
                    <td>
                        <input class="text" type="text" id="SSC" name="SSC" placeholder="SSC">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="Graduation">Graduation</label></td>
                    <td>
                        <input class="text" type="text" id="Graduation" name="Graduation" placeholder="Graduation">
                    </td>
                </tr>

                <tr class="row">
                    <td class="label"> <label for="Post_graduation">Post graduation</label></td>
                    <td>
                        <input class="text" type="text" id="Post_graduation" name="Post_graduation" placeholder="Post_graduation">
                    </td>
                </tr>


				<tr class="row">
					<td class="label"> <label for="sex"> Gender </label></td>
					<td> 
						<input type="radio" name="gender" value="male"  >
						<label for="sex"> Male </label>
						 <input type="radio" name="gender" value="female"  >
						<label for="sex"> Female </label>
						<input type="radio" name="gender" value="other"  >
						<label for="sex"> Other </label>
					</td>
				</tr>
				<tr class="row">
					<td class="label"> <label for="avatar"> Select your avatar: </label></td>
					<td>
					<div class="avatar" id="picture"><input type="file" name="fileToUpload" class="input-file" <--*accept="image/*"--></div>
					</td>
				</tr>
				 
				<tr class="row">
					<td> <button type="submit" name="submit" value="submit" class="button">Submit </button> </td>
				</tr>
			</table>
		</form>
	</div>
	 
	  <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
</body>
</html>