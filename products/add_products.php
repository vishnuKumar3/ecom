<!doctype html>
<style>body{text-align:center;} input{margin-top:10px;}</style>
<h1>ADD PRODUCTS</h1>

<form style="margin-top:10%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Product:<input type="text" name="product" autofocus/><br>
Price:<input style="margin-left:20px;" type="text" name="price"/><br>
<input type="submit" value="submit"/>
</form>

<div style="margin-top:5%;">
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$product_add=$_POST["product"];
$price_add=$_POST["price"];
$host="localhost";
$username="root";
$password="";
$db="trail";
$conn=new mysqli($host,$username,$password,$db);
$result=$conn->prepare("insert into trailtable3 (product,price) values (?,?)");
$result->bind_param("si",$product_add,$price_add);
$result->execute();
$result->close();
echo "<script>alert('product added');</script>";
}
?>
</div>

