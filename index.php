<!doctype html>
<html>
	<head>
		<title>Emart</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<link rel="icon" href="images/logo.svg"/>
		<link rel="stylesheet" href="styles/style.css"/>
	</head>
	<body>
		<div id="header">
			<div id="innerbox">
			</div>
			<div id="innerbox">
				<h1>EMart</h1>
			</div>
			<div id="innerbox">
				<button onclick="window.location.replace('login/login.php');">Login</button>
				<button onclick="window.location.replace('register/register.php');">Register</button>
			</div>
		</div>
		<div id="products">
		<?php
			$host="localhost";
			$username="root";
			$password="";
			$db="trail";	
			$conn=new mysqli($host,$username,$password,$db);
			$res=$conn->query("select * from trailtable3");
			while($row=$res->fetch_assoc()){
				$product=$row['product'];
				echo "<div id='product'>
						<div id='top-part'>
							<div>
							<h2>$product</h2>
							<p>price:$".$row["price"]."</p>
							<div><p>Rating:4.5</p><img src='star.png'></div>".
							"</div>
							<img src='shoe.jpeg'/>
						</div>
						<form action='details.php' method='post'>
							<input type='text' value=$product hidden name='product'/>
							<input type='submit' value='submit'/>
						</form>
					</div>";
			}
		?>
		</div>
	</body>
</html>
