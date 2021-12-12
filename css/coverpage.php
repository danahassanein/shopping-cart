

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
    <title>Online Shopping</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-10 p-b-50" style="background-image: url('imag.jpg');">
        <div class="wrapper wrapper--w900">
            <form method="post">
                <div class="card card-6">
                    <div class="card-heading">
                        <br>
                        <br>

                        <h2 class="title">SHOPPING CART</h2>
                    </div>
                    <div>
<?php 
$username = "root"; 
$password = ""; 
$database = "onlineshopping"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM items";
 
 
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
 
      </tr>';
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["col1"];
        $field2name = $row["col2"];

 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 

              </tr>';
    }
    $result->free();
} 
?>
                        <br>
                        <br>
                        <br>

                        <div>
                            <button class="btn btn--radius-2 btn--blue-2" href="http://localhost/practice" >Add item</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div>
                            <button class="btn btn--radius-2 btn--blue-2" href="http://localhost/login.php">Relete item</button>
                        </div>
                    </div>
                </div>

        </div>

    </div>
    </form>

    </div>
    </div>
</body>

</html>