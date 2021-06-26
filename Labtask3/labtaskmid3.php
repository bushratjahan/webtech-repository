<!DOCTYPE html>
<html>
<head>
	<style>
		.error
		{
			color: RED;
		}
	</style>
</head>
<body>

<?php
$name = $pass = $user = $pas = $usermatch = $pasmatch = $newpass = $renewpass = $curpas = "";
$nameE = $passE = $newpassE = $renewpassE = $currpassE = "";
$currpass = "bushratpas1";
$currpasS = "" ;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if(isset($_POST["submit1"])){
	if(empty($_POST["username"])){
		$nameE="Username is requied";
	}
	else{
		$name = $_POST["username"];
		if(!preg_match("/^[a-zA-Z0-9_.-]{2,}$/",$name)) {
      	$nameE = "User Name can contain alpha numeric characters, period, dash or
underscore only and User Name must contain at least two (2) characters";
		$name = "";
		
	}else{
		$name = $_POST['username'];
		$user = "Username:". $name;
		$usermatch = 1;
	}
}

	if(empty($_POST["pass"])){
		$passE="Password is requied";
	}
	else{
		$pass = $_POST["pass"];
		if(!preg_match("/^(?=.*?[@#$%]).{8,}\S+$/",$pass)) {
      	$passE = "Password must not be less than eight (8) characters
D. Password must contain at least one of the special characters (@, #, $,%";
		$pass = "";
		
	}else{
		$pass = $_POST['pass'];
		$pas = "Password:". $pass;
		$pasmatch = 1;
	}
}
if($usermatch && $pasmatch == 1){
	$usermatch = "<p style = 'color:#00FF00'>Successfully login</p>";
}else{
	$usermatch = "<p style = 'color:#FF0000'>login failed!</p>";
}
}


if(isset($_POST["submit2"])){
	$curpas = $_POST['currpass'];
	$newpass = $_POST['newpass'];
	$renewpass = $_POST['renewpass'];
	if(empty($_POST["currpass"])){
		$currpassE="Type Current Password is requied";
	}else if(empty($_POST["newpass"])){
		$newpassE="Type New Password is requied";
	}else if(empty($_POST["renewpass"])){
		$renewpassE="Retype New Password is requied";
	}else{
		if($curpas != $currpass){
		$currpassE = "Please type current password";
	}else if($newpass == $curpas){
		$newpassE="New Password should not be same as the Current Password";
	}else if($newpass != $renewpass ){
		$renewpassE = "New Password must match with the Retyped Password";
	}else{
		$currpasS = "Password Changed";
	}
	
	}
	
}

}





?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px ; text-align: center ; max-width:600px; margin : 0 auto ">

<fieldset style="width: 500px; ">
<legend><b>Login</b></legend>
<label>User Name:</label>
<input type="text" name="username" value="" ><span class="error">* <?php echo $nameE; ?> </span><br><br>
<label>Password:</label>
<input type="text" name="pass" value="" ><span class="error">* <?php echo $passE; ?> </span><br>
<hr style="border: 0.1px solid;">
<input type="submit" name="submit1" value="Submit" style="width: 100px">
</fieldset>


<?php
	echo $user;
	echo "<br>";
	echo $pas;
	echo "<br>";
	echo $usermatch;

?>


<fieldset style="width: 500px; ">
<legend><b>CHANGE PASSWORD</b></legend>
<label>Current Password:</label>
<input type="text" name="currpass" value="" ><span class="error">* <?php echo $currpassE; ?> </span><br><br>
<label>New Password:</label>
<input type="text" name="newpass" value="" ><span class="error">* <?php echo $newpassE; ?> </span><br><br>
<label>Retype New Password:</label>
<input type="text" name="renewpass" value="" ><span class="error">* <?php echo $renewpassE; ?> </span><br>
<hr style="border: 0.1px solid;">
<input type="submit" name="submit2" value="Submit" style="width: 100px">
</fieldset>

<?php
	
	echo $currpasS;
?>
<br>

</form>


<form action="upload.php" method="post" enctype="multipart/form-data" style="padding-top: 10px ; text-align: center ; max-width:600px; margin : 0 auto ">
<fieldset style="width: 500px; ">
<legend><b>Profile Picture</b></legend>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit3">
  </fieldset>
</form>


<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit4"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  


              
                <form method="post" style="padding-top: 10px ; text-align: center ; max-width:600px; margin : 0 auto ">  
				
				<fieldset style="width: 500px; ">
				<legend><b>Registration</b></legend>  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name"  /><br />  <br />
                     <label>E-mail</label>
                     <input type="text" name = "email"  /><br /><br />
                     <label>User Name</label>
                     <input type="text" name = "un"  /><br /><br />
                     <label>Password</label>
                     <input type="password" name = "pass"  /><br /><br />
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass"  /><br /><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br>
					</fieldset>
					<fieldset>
                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> <br><br>
                    </fieldset> 
                     
                     <input type="submit" name="submit4" value="Append" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
					</fieldset>
                </form>  
				
				
				
				
				

?>


<

</form>





</body>
</html>