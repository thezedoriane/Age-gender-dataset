<!DOCTYPE html>
<html>
	<head>
	<title>gender age dataset</title>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" href="Age_gender2.css">
	</head>
	
	<body>
	<?php 
			$file = fopen('dataset.csv','r'); 
			while ($data = fgetcsv($file)) { 
				//print_r($data); 
				$goods_list[] = $data;
			}
			fclose($file);
			//creation du tableau contenant les differentes donnees et formulaires
			echo "<table id='t' style='width:100%'>";
			echo "<tr>";
			echo "<th> n° </th>";
			echo "<th> photo </th>";
			echo "<th> age </th>";
			echo "<th> genre </th>";
			echo "<th> ethnie </th>";
			echo "<th> changer le genre </th>";
			echo "<th> changer l'ethnie </th>";
			echo "</tr>";
			$num=1;
			//pour chaque ligne du fichier csv
			foreach ($goods_list as $arr){
				if ($arr[0]!=""){
					//coupe la chaine suivant le separateur ;
					$ligne=explode(";",$arr[0]);
					#echo $ligne[0];
					
					echo "<tr>";
					echo "<td>". $num."</td>";
					echo "<td><img src='https:".$ligne[0]."' alt='photo'></td>";
					echo "<td>".$ligne[1]."</td>"; 
					echo "<td> ".$ligne[2]."</td>";
					echo "<td> ".$ligne[3]."</td>";
					echo "<td> <form method='post' action='GenderAge.php'>
							<label for='gender'>Choisissez un genre:</label><br>
							
							<input type='radio' id='gender' name='gender' value='H' checked>							
							<label for='homme'>Homme</label><br>
							
							<input type='radio' id='gender' name='gender' value='F' checked>
							<label for='woman'>Femme</label><br>
							
							<p><button type='submit' name='changerG' value='".$num."'> submit </button></p>
							</form>
							</td>";
  
  
					echo "<td> <form method='post' action='GenderAge.php'>
							<label for='ethnie'>Choisissez un groupe ethnique:</label><br>
							
							<input type='radio' id='ethnie' name='ethnie' value='Blanc' checked>							
							<label for='blanc'>Blanc</label><br>
							
							<input type='radio' id='ethnie' name='ethnie' value='Noir' checked>							
							<label for='noir'>Noir</label><br>
							
							<input type='radio' id='ethnie' name='ethnie' value='Indien' checked>							
							<label for='indien'>Indien</label><br> 
							
							<input type='radio' id='ethnie' name='ethnie' value='Asie de l Est' checked>							
							<label for='Asie de l Est'>Asie de l'Est</label><br>
							
							<input type='radio' id='ethnie' name='ethnie' value='Asie du Sud-Est' checked>							
							<label for='Asie du Sud-Est'>Asie du Sud-Est</label><br>  
							
							<input type='radio' id='ethnie' name='ethnie' value='Moyen-Orient' checked>							
							<label for='Moyen-Orient'>Moyen-Orient</label><br> 
							
							<input type='radio' id='ethnie' name='ethnie' value='Latino' checked>							
							<label for='latino'>Latino</label><br>
							
							<p><button type='submit' name='changerE' value='".$num."'> submit </button></p>
							</form>
							</td>" ;
					echo "</tr>";
					$num++;
				}
			} 
			echo "</table>";
			
			//associons les nouvelles valeurs à leur photo 
			$genre=$_POST['gender'];
			$ethnie=$_POST['ethnie'];
			//echo $genre;
			//echo $ethnie;
			if (!empty($_POST['gender']) or !empty($_POST['ethnie'])){
				$monfichier = fopen('dataset.csv','r');
				$row = 1; // Variable pour numéroter les lignes
				$newcontenu = '';
				// Lecture du fichier ligne par ligne :
				while (($ligne = fgets($monfichier)) !== FALSE){
					// Si le numéro de la ligne est égal au numéro de la ligne à modifier et qu'on a rentre un nouveau genre:
					if ($row == $_POST['changerG'] and !empty($genre)){
						$lignesep=explode(";",$ligne);
						// Variable contenant la nouvelle ligne :
						$nouvelle_ligne = $lignesep[0] . ';' . $lignesep[1] . ';' . $genre . ';' . $lignesep[3] ;
						$newcontenu = $newcontenu . $nouvelle_ligne;
					}
					// Si le numéro de la ligne est égal au numéro de la ligne à modifier et qu'on a rentre une nouvelle ethnie:
					else if ($row == $_POST['changerE'] and !empty($ethnie)){
						$lignesep=explode(";",$ligne);
						//Variable contenant la nouvelle ligne :
						$nouvelle_ligne = $lignesep[0] . ';' . $lignesep[1] . ';' . $lignesep[2] . ';' . $ethnie ;
						$newcontenu = $newcontenu . $nouvelle_ligne;
					}
					// Sinon, on réécrit la ligne
					else {
						$newcontenu = $newcontenu . $ligne;
					}
					$row++;    
				}
				fclose($monfichier);
				//reecriture du fichier csv modifie
				$fichierecriture = fopen('dataset.csv', 'w');
				fputs($fichierecriture, $newcontenu);
				fclose($fichierecriture);
			}
			?>
	</body>
</html>
