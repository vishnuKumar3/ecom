<!doctype html>
<title>registration</title>
<style>body{text-align:center;} input{margin-top:10px;}</style>
<h1>Registration</h1>
<form style="margin-top:10%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Username:<input type="text" name="username" autofocus/><br>
Password:<input type="password" name="password"/><br>
<input type="submit" value="submit"/>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$user=$_POST['username'];
$pass=$_POST['password'];
if(!empty($user) && !empty($pass)){
		$host="localhost";
		$username="root";
		$password="";
		$db="trail";
		$conn=new mysqli($host,$username,$password,$db);
		$insert=$conn->prepare("insert into trailtable1 (id,password) values(?,?)");
		$insert->bind_param("si",$user,$pass);
		$insert->execute();
		$insert->close();
		echo "<script>alert('registered successfully');</script>";
		}
else{
	echo "<script>alert('username or password is empty');</script>";}
}

?>


