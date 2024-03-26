<?php
    
    include "connection.php";

    $city=$_GET["city"];
    $temp=$_GET["temp"];
    $weatherType=$_GET["weather"];
    // $weather_when=$_GET["data"];

    $fetch_query = "SELECT * FROM weather WHERE city = '{$city}' AND weather_when >= DATE_SUB(NOW(), interval 4000 SECOND)";
    $result = mysqli_query($con, $fetch_query);

    // var_dump($result);

    // $fetch_query="SELECT * FROM weather WHERE city='{$city}'";
    // $result=mysqli_query($con,$fetch_query);

    if($result->num_rows==0){
        
        $insert_query="INSERT INTO weather(`city`,`temp`,`weatherType`) VALUES('{$city}','{$temp}','{$weatherType}'";
        mysqli_query($con,$insert_query);
    }
    
    function display($city)
    {
        include "connection.php";
        $fetch_query="SELECT * FROM weather WHERE city='{$city}'";
        $res=mysqli_query($con,$fetch_query);
        $row=mysqli_fetch_array($res);
        
        
        
        include "index.php";

        echo "<div class='weather'>
        <div id='result'>{$row["city"]}</div>
        <h1 class='temp'>{$row["temp"]}°C</h1>
        <h1 class='city'>{$row["weatherType"]}</h1>
    </div>";
        }
      
        display($_GET["city"])
?>