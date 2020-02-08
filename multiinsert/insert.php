<!DOCTYPE html>
<html>
<head>
<title>Multiple Insert</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="width: 60%">
	<form action="insert.php" method="post">
	  <?php 

   for ($i=1; $i <3 ; $i++) { ?>
    <h1>Form Number : <?php echo "$i"; ?></h1>
    <hr>
       	 <div class="form-group">
       	 	<label for="">Enter your name</label>
       	 	<input type="text" name="name[]" class="form-control">
       	 </div>
       	<div class="form-group">
       	 	<label for="">Enter your email</label>
       	 	<input type="email" name="email[]" class="form-control">
       	 </div>
       	 <div class="form-group">
       	 	<label for="">Enter your age</label>
       	 	<input type="text" name="age[]" class="form-control">
       	 </div>
      <br>

   <?php }  ?>
   <input type="submit" name="submit" class="btn btn-primary" value="submit">
   <br>
    </form> 
</div>

</body>
</html>


<?php 
include 'db.php';
if (isset($_POST['submit'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];

foreach ($name as $key => $value) {
 
$sql="insert into user(name,email,age)values('".$name[$key]."','".$email[$key]."','".$age[$key]."')";
		$query=mysqli_query($conn,$sql);
}


if ($query) {
	echo "<h1>Data has been successfully Inserted!</h1>";
}else{
	echo "Please Try Again";
}
}


?>