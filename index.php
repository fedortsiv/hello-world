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

<?php

$mysqli = new mysqli("localhost", "root", "root", "test");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}


$query = $mysqli -> query ("SELECT * FROM user");
$query_city = $mysqli -> query ("SELECT idcity, name_city FROM city");



 #записуєм значееня одного запиту в масив 

        while ( $row = $query_city->fetch_array(MYSQLI_ASSOC)) {
                 $count[] = $row;
        }



# Функція для заміни наданого значення на значення з масиву 
function FunctionName ( $value, $count ) {
        
        $int = (integer)$value;

        $item = null;
        foreach($count as $struct) {
            if ($int == $struct["idcity"]) {
                $item = $struct["name_city"];
                return($item);
        break;
            }
        }        
}


#вивід на екран
while ($row = $query->fetch_array(MYSQLI_ASSOC)) {

        if ($row["city_idcity"]) {
                $znacz = FunctionName($row["city_idcity"], $count);
        }
        printf ("%s (%s) [%s]\n", $row["iduser"], $row["name"], $znacz);
 
}


$query -> close();
$query_city -> close();
$mysqli -> close();


?>
        

	<script src="js/bootstrap.min.js"></script>
<!--	<script src="js/main.js"></script> -->
</body>


</html>
