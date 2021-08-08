<!DOCTYPE html>
<html>
<head>
    <title>Lab 6</title>
    
</head>
<body>
<?php include 'templates/nav.php';?>
<br>
<br>
<?php
session_start();
if (isset($_SESSION['uname'])) {
    header('Location: dashboard.php');

}

?>

<h1>Welcome to xCompany</h1>

<br>
<br>
</body>
<?php include 'templates/footer.php';?>
</html>