
<!DOCTYPE html>
<html>
<head>
     <title>JSON</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
 <br />  
           
<?php
if(isset($_POST['upload']))
{
     $json_file = $_FILES['json']['name'];
     $json_loc = $_FILES['json']['tmp_name'];
     $folder="";
     if(move_uploaded_file($json_loc,$folder.$json_file))
     {


      $jsonString = file_get_contents($json_file);
      $data = json_decode($jsonString, true);

      

    foreach ($data as $key => $entry) {
    if ($entry['cena_m2'] > 9520 || $entry['l_mieszkancow'] > 1700 || $entry['cena_m2'] < 2250 || $entry['l_mieszkancow'] < 1 || $entry['cena_m2'] == " " || $entry['l_mieszkancow'] == " " ) {

        $data[$key]['cena_m2'] = "3000";
        $data[$key]['l_mieszkancow'] = "26";

    }

    }

      $newJsonString = json_encode($data);
      file_put_contents($json_file, $newJsonString);


        include_once "table.html";
     }
     else
     {
        echo "Niestety nie udało się załadować pliku!";
     }
}

?>
          
<h1 id="nameFile"><?php echo $json_file; ?></h1>

<div style=" margin-left: 0px; height: 500px; width: 500px; padding-left: 10px; float: left">
<?php

echo "Maksymalna liczba mieszkańców to: ".$max_tab_lm.', gdzie cena za m2 to: '.$max_lm."zł.</br>";

//echo "<p style='color:red;'>TEST: ".$test1.",".$test2."</p>";

echo "Minimalna liczba mieszkańców to: ".$min_tab_lm.', gdzie cena za m2 to: '.$min_lm."zł.</br>";
echo "Maksymalna cena za m2 to: ".$max["cena_m2"].'zł, gdzie liczba mieszkańców to: '.$max_c2.".</br>";
echo "Minimalna cena za m2 to: ".$min["cena_m2"].'zł, gdzie liczba mieszkańców to: '.$min_c2.".</br>";
echo "Średnia ceny m2: ".round($Ex_m2)."</br>";
echo "Średnia liczby mieszkańców: ".round($Ex_lm)."</br>";
echo "Mediana cen m2 wynosi: ".$mediana_m2."</br>";
echo "Mediana liczby ludności wynosi: ".$mediana_lm."</br>";
echo "Odchylenie standardowe cen m2 wynosi: ".$s_m2."</br>";
echo "Odchylenie standardowe liczby ludności wynosi: ".$s_lm."</br>";
echo "Współczynnik korelacji Pearsona wynosi: ".$pearson."</br>";

//echo "string y-b*x= ".$q3_m2."-".$q1_m2."*";

echo "Równanie prostej regresji: y=<span id='a'>".$regression_a."</span>*x+<span id='b'>".$regression_b."</span></br>";
echo "Q1 ceny za m2: ".$q1_m2."</br>";

echo "Q1 liczby mieszkancow: ".$q1_lm."</br>";
echo "Q3 ceny za m2: ".$q3_m2."</br>";
echo "Q3 liczby mieszkancow:: ".$q3_lm."</br>";
echo "IQR liczby mieszkancow: ".$iqr_lm."</br>";
echo "IQR ceny za m2: ".$iqr_m2."</br>";

?>
</div>

<!-- <div class="table-responsive" id="demo"  style=" width: 500px; height: 500px; padding-left: 100px;">
<table id="table" class="table table-bordered" style="">
  <tr>
    <th>Liczba mieszkańców w tyś.</th>
    <th>Cena za m2 w zł.</th>
  </tr>

</table> -->
<div class="table-responsive" id="demo"  style=" width: 500px; height: 500px; padding-left: 100px;"><h4>Dane wygenerowane za pomocą równania regresji
liniowej</h1>
<table  class="table table-bordered" >
<tr>
    <th>Liczba mieszkańców w tyś.</th>
    <th>Cena za m2 w zł.</th>
</tr>

  <?php

  $js[] = array("cena_m2" , "l_mieszkancow");

  for ($i=0; $i < 10; $i++) { 
    $rand=rand(1700,1);
    $y=$regression_a*$rand+$regression_b;
    echo "<tr>";
    echo "<td>".$rand."</td>";
    echo "<td>".round($y)."</td>";
    echo "</tr>";
    $js[$i]["cena_m2"]=round($y);
    $js[$i]["l_mieszkancow"]=$rand;

  }
//print_r($js);
      $newJsonString = json_encode($js);
      file_put_contents("js_".$json_file, $newJsonString);
  ?>



</table>
</div>
<canvas  id="coordinates2" width="500" height="500" ></canvas>
    

  
<canvas id="coordinates1" width="500" height="500" style="margin-left: 100px;"></canvas>

 






    
    <!-- <script  src="js/index.js"></script> -->





</br>

<script type="text/javascript" src="js/draw.js"></script>
<script type="text/javascript" src="js/draw2.js"></script>
</body>
</html>