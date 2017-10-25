<!DOCTYPE html>

<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fedortsiv</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">

        <link rel='stylesheet' href='/css/bootstrap.min.css' type='text/css' media='all'>

<!--       <link rel="stylesheet" href="css/main.css"> -->

</head>
<body>

<?php

$link = mysqli_connect("localhost", "root", "root", "test2");


$query = "SELECT * FROM name";
$query_work = "SELECT * FROM work";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    print "<table class='table table-bordere table-hover'><thead><tr><th>Id</th><th>Name</th><th>Work Place</th></tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        print "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) print "<td>$row[$j]</td>";
        print "</tr>";
    }
    print "</table>";
     
   
    mysqli_free_result($result);
}

$result = mysqli_query($link, $query_work) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    print "<table class='table table-bordere table-hover'><thead><tr><th>Id</th><th>Name</th><th>Adress</th></tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        print "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) print "<td>$row[$j]</td>";
        print "</tr>";
    }
    print "</table>";
     
   
    mysqli_free_result($result);
}


mysqli_close($link);

?>
	

	<script src="js/bootstrap.min.js"></script>
<!--	<script src="js/main.js"></script> -->
</body>


</html>
