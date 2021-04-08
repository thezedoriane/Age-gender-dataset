<!DOCTYPE html>
<html>
	<head>
	<title>gender age dataset</title>
	 <meta charset="UTF-8">
<style>
table, th, td {
  border: 1px solid black;
}
</style>
	</head>
	
	<body>
	<?php 
			$file = fopen('dataset.csv','r'); 
			while ($data = fgetcsv($file)) { 
				//print_r($data); 
				$goods_list[] = $data;
			}
			echo "<table id='t' style='width:100%'>  <tr> <th> n° </th> <th> photo </th> <th> age </th> <th> genre </th> <th> ethnie </th> </th> <th> changer le genre </th></th> <th> changer l'ethnie </th> </tr>";
			$num=1;
			foreach ($goods_list as $arr){
				if ($arr[0]!=""){
					
					$ligne=explode(";",$arr[0]);
					#echo $ligne[0];
					
					echo "<tr>";
					echo "<td>". $num."</td><td><img src='https:".$ligne[0]."' alt='photo'></td>
					<td>".$ligne[1]."</td> 
					<td> ".$ligne[2]."</td> <td> ".$ligne[3]."</td>
					<td> <div> <form method='post' action='traitement.php'>
	<label for='gender'>Choisissez un genre:</label><br>
	<input type='radio' id='homme' name='gender' value='homme'
         checked>
  <label for='homme'>Homme</label><br>
  <input type='radio' id'femme' name='gender' value='femme'
         checked>
  <label for='woman'>Femme</label><br>
  <p><button type='submit' name='changerG'> submit </button></p>
  </form>
</td>
  
  
					<td> <form method='post' action='traitement.php'>
					<label for='ethnie'>Choisissez un groupe ethnique:</label><br>
  <input type='radio' id='blanc' name='ethnie' value='blanc'
         checked>
  <label for='blanc'>blanc</label><br>
  
  <input type='radio' id='noir' name='ethnie' value='noir'
         checked>
  <label for='noir'>noir</label><br>
  
  <input type='radio' id='indien' name='ethnie' value='indien'
         checked>
  <label for='indien'>Indien</label><br>
  
  <input type='radio' id='Asie de l Est' name='ethnie' value='Asie de l Est'
         checked>
  <label for='Asie de l Est'>Asie de l'Est</label><br>
  
  <input type='radio' id='Asie du Sud-Est' name='ethnie' value='Asie du Sud-Est'
         checked>
  <label for='Asie du Sud-Est'>Asie du Sud-Est</label><br>
  
  <input type='radio' id='Moyen-Orient' name='ethnie' value='Moyen-Orient'
         checked>
  <label for='Moyen-Orient'>Moyen-Orient</label><br>
  
  <input type='radio' id='latino' name='ethnie' value='latino'
         checked>
  <label for='latino'>Latino</label><br>
  <p><button type='submit' name='changerE'> submit </button></p>
  </form></td><br>" ;
					echo "</tr>";
					$num++;
				}
			} 
			echo "</table>";
    ?>
    	</body>
</html>
