<?php
$con=mysqli_connect("localhost","root","","onlineshopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Persons");

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['LastName'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
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

                        <h2 class="title">SHOP ONLINE</h2>
                    </div>
                    <div>

                        <br>
                        <br>
                        <br>

                        <div>
                            <button class="btn btn--radius-2 btn--blue-2" href="http://localhost/practice" >Add items</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div>
                            <button class="btn btn--radius-2 btn--blue-2" href="http://localhost/login.php">Delete items</button>
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