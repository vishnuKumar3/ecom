<!doctype html>
<title>login_owner</title>
<style>body{text-align:center;} input{margin-top:10px;}</style>
<h1>OWNER_LOGIN</h1>
<form style="margin-top:10%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Username:<input type="text" name="username" autofocus/><br>
Password:<input type="password" name="password"/><br>
<input type="submit" value="submit"/>
</form>

<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
$user=$_POST['username'];
$pass=$_POST['password'];
if(!empty($user) && !empty($pass)){
		$host="localhost";
		$username="root";
		$password="";
		$db="trail";
		$conn=new mysqli($host,$username,$password,$db);
		$select="select * from trailtable2";
		$list=$conn->query($select);
		while($row=$list->fetch_assoc()){
			if($user==$row['id'] && $pass==$row['password']){
				$_SESSION['open']='open_success';
				header("Location:../products/products.php");
				echo "<script>alert('LoggedIn successfully');</script>";
			}
		}
		echo "<script>alert('unsuccessful login');</script>";
		}
else{
	echo "<script>alert('username or password is empty');</script>";}
}

?>


