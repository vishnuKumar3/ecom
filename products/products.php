<!doctype html>
<style>#box{border:1px solid red;width:30%;height:150px;;display:flex;flex-direction:row;flex-wrap:wrap;justify-content:space-around;margin-right:3%;margin-bottom:3%;float:left;}
#form{float:right;}
#submit{margin-top:100px;}
</style>
<center><h1>PRODUCTS</h1></center>

<form action="../bill/bill.php">
<input type="submit" value="Bill"/>
</form>

<?php
session_start();
$open=$_SESSION['open'];
if($open=='open_success'){
	echo "<form id='form' action='add_products.php'><input type='submit' value='Add products'/></form>";}
?>
<div style="margin-top:10%;">
<?php
$host="localhost";
$username="root";
$password="";
$db="trail";
$conn=new mysqli($host,$username,$password,$db);
$select="select * from trailtable3";
$result=$conn->query($select);
while($row=$result->fetch_assoc()){
	$product=$row['product'];
	$price=$row['price'];
	$_SESSION['product']=$product;
	echo "<div id='box'>
		<p>$product</p>
		<p>$ $price</p>
		<form action='../price/price_enter.php' method='post'>
		<input type='text' hidden value=$product name='product'/>
		<input type='text' hidden value=$price name='price'/>
		<input type='submit' id='submit' value='add' name='products'/>
		</form>
		</div>";}

?>
</div>




