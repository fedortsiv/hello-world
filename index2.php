<!DOCTYPE html>

<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fedortsiv</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">

        <link rel='stylesheet' href='/css/bootstrap.min.css' type='text/css' media='all'>

      <link rel="stylesheet" href="css/main.css"> 

</head>
<body>
<div class="row">
<?php

$link = mysqli_connect("localhost", "root", "root", "test");


$query = "SELECT * FROM user";
$query_city = "SELECT `idcity`, `name_city` FROM city ";

$result = mysqli_query($link, $query) or die("Помилка " . mysqli_error($link));
$result_2table = mysqli_query($link, $query_city) or die("Помилка " . mysqli_error($link));

function str2int($int)
{
    return (integer) $int;
}



if($result)
{
    $rows = mysqli_num_rows($result); 

     
    print "<table class='col-6 table table-bordere table-hover'><thead><tr><th>Id</th><th>Name</th><th>Work Place</th></tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {      
        
             while ( $row = mysqli_fetch_object($result))  {


                if ($row->city_idcity) {

                                         
                    $znacz = str2int($row->city_idcity);


                    if ($stmt = mysqli_prepare($link, "SELECT name_city FROM city WHERE idcity=?")) {
                        mysqli_stmt_bind_param($stmt, "s", $znacz);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $district);
                        mysqli_stmt_fetch($stmt);
                        
                        mysqli_stmt_close($stmt);
                        
                
                }
            }
            print "<tr>";
            print ("<td>$row->iduser</td> <td>$row->name</td> <td>$district</td>");
            print "</tr>";

        }

    }
    print "</table>";

     
   
    mysqli_free_result($result);
}


mysqli_close($link);

?>

</div>

	<script src="js/bootstrap.min.js"></script>
<!--	<script src="js/main.js"></script> -->
</body>


</html>
