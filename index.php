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

#while ($obj = mysqli_fetch_object($result_2table)) {
#        printf ("%s (%s)\n", $obj->idcity, $obj->name_city);
#        }

if($result)
{
    $rows = mysqli_num_rows($result); 
    $obj = mysqli_fetch_object($result_2table);
        var_dump($obj);
     
    print "<table class='col-6 table table-bordere table-hover'><thead><tr><th>Id</th><th>Name</th><th>Work Place</th></tr></thead>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        
        $row = mysqli_fetch_object($result);
        print "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) {
                
                $zapyt = "SELCT `name_city` FROM city WHERE `idcity` = intval($row->city_idcity)";
                echo "$row->city_idcity";
                printf ("%s (%s) [%s]\n", $row->iduser, $row->name, $city = mysqli_query($link, $zapyt));



                for ($k=0; $k <= $row->city_idcity; $k++) {                     
                        

                        if (intval($row->city_idcity) == intval($obj->name_city)) {

                               
                               
                               printf("[%s]", $obj->name_city);

                        }
                }

                #if ( $row->city_idc) {
                        # code...
                #}
                #print "<td>$row[$j]</td>";
        }
        print "</tr>";
    }
    print "</table>";

    printf ("%s (%s) 'jkdhjfdhfhjdo'\n", $obj->idcity, $obj->name_city);
     
   
    mysqli_free_result($result);
}


mysqli_close($link);

?>

</div>

	<script src="js/bootstrap.min.js"></script>
<!--	<script src="js/main.js"></script> -->
</body>


</html>
