<?php
include_once('config.php');
if(isset($_POST['submit2']))
{
$itemid=$_POST['itemid'];
$quantity=$_POST['quantity'];

//Serverside Validation

 if(empty($itemid))
 {
  $error = "Enter ID!";
  $code = 1;
 }
 else if(strlen($itemid) > 5 )
 {
  $error = "ID is 5 characters";
  $code = 1;
 }
  else if(empty($quantity))
 {
    $error = "Enter quantity !";
  $code = 2;
 }

 else if(strlen($quantity) > 2 )
 {
  $error = "Cannot order too many items";
  $code = 2;
 }

else{
$query=mysqli_query($con,"insert into items(itemid,quantity) values('$itemid','$quantity')");
if($query){
echo "<script>alert('Order added to your cart')</script>";


}


 else {
echo "<script>alert('Something went wrong. Please try again.')</script>";
echo "<script>window.location.href='index.php';</script>";
}
}
}







if(isset($_POST['submit3']))
{
$itemid=$_POST['itemid'];
$quantity=$_POST['quantity'];

//Serverside Validation

 if(empty($itemid))
 {
  $error = "Enter ID!";
  $code = 1;
 }
 else if(strlen($itemid) > 5 )
 {
  $error = "ID is 5 characters";
  $code = 1;
 }

 else if(strlen($quantity) > 2 )
 {
  $error = "Cannot order too many items";
  $code = 2;
 }

else{
$query=mysqli_query($con,"delete from items where itemid='$itemid'");
if($query){
echo "<script>alert('Order removed from your cart')</script>";

}

 else {
echo "<script>alert('Something went wrong. Please try again.')</script>";
echo "<script>window.location.href='items.php';</script>";
}
}

}












?>





<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="PHPGurukul">
    <meta name="keywords" content="PHPGurukul Scripts">

    <!-- Title Page-->
    <title>Shopping Cart</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>



    <div class="page-wrapper bg-dark p-t-10 p-b-50">
        <div class="wrapper wrapper--w900">
               <form method="post">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">My Shopping Cart</h2>
                </div>

<div class="card-footer" >

<?php
echo "<table style='border: solid 2px black; '>";
 echo "<tr><th>Item ID</th><th>Quantity</th>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 200px; height:30px; border: 2px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineshopping";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT itemid, quantity FROM items");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</div>
<br>
<br>
                <div class="card-body">
 <p style="color:red;" align="center"><?php if(isset($error)) { echo $error; }?> </p>                
                        
<div class="form-row">
<div class="name">Item ID</div>
<div class="value">
<input type="text" name="itemid" class="input--style-6" value="<?php if(isset($itemid)){echo $itemid;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> />
</div>
</div>
                        
<div class="form-row">
<div class="name">Quantity</div>
<div class="value">
<div class="input-group">
<input type="text" name="quantity" class="input--style-6" value="<?php if(isset($quantity)){echo $quantity;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; } ?> />
 </div>
</div>
</div>
      

</div>

<div class="card-footer" >
<button class="btn btn--radius-2 btn--blue-2" type="submit2" name="submit2">Add to Cart</button>
<button class="btn btn--radius-2 btn--blue-2" type="submit3" name="submit3">Remove from Cart</button>
</div>
</div>
</form>

        </div>
    </div>



</body>
</html>
