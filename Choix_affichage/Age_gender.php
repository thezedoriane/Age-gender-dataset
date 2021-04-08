<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Age gender dataset</title>
<link rel="stylesheet" href="Age_gender2.css">
</head>

<body>
<div class="selection">
		<div1 class="bouton">
		<p>Genre:</p>
		<form action=? method="post">
		<p>
			<input type="radio" id="gender" name="gender" value="H" checked="yes"/>
			<label for="gender">Homme</label><br>
			<input type="radio" id="gender" name="gender" value="F">
			<label for="gender">Femme</label><br>
		</p>
		</br>
		<p>Age:</p>
			Plus de: <input type="number" name="agemin" value="0"><br>
		    Moins de:<input type="number" name="agemax" value="1"><br>
		</br>
		<p>Ethnie:</p>
		<p>
			<input type="radio" id="ethnie" name="ethnie" value="Blanc" checked="yes"/>
			<label for="White">Blanc</label><br>
			<input type="radio" id="ethnie" name="ethnie" value="Noir">
			<label for="Black">Noir</label><br>
			<input type="radio" id="Indian" name="ethnie" value="Indien">
			<label for="Indian">Indien</label><br>
			<input type="radio" id="ethnie" name="ethnie" value="Asie de l'Est">
			<label for="East-Asian">Asie de l'Est</label><br>
			<input type="radio" id="ethnie" name="ethnie" value="Asie du Sud-Est">
			<label for="Southeast-Asian">Asie du Sud-Ouest</label><br>
			<input type="radio" id="ethnie" name="ethnie" value="Moyen-Orient">
			<label for="Middle East">Moyen-Orient</label><br>
			<input type="radio" id="ethnie" name="ethnie" value="Latino">
			<label for="Latino">Latino</label><br>
			</br>
			<input type="submit" value="Choisir">
		</p>
		</form>
		</div1>
<div class="image">
<?php
$gender = strval($_POST["gender"]);
$agemin = intval($_POST["agemin"]);
$agemax = intval($_POST["agemax"]);
$ethnie = strval($_POST["ethnie"]);

$file= fopen('dataset.csv', 'r');
// Lit le fichier ligne par ligne
while ($data = fgetcsv($file)) {
$goods_list[] = $data;
}
echo "Vous avez choisi : genre: ".$gender.", age entre: ".$agemin." et ".$agemax." ans, ethnie: ".$ethnie."</br>";
foreach($goods_list as $arr) {
	if ($arr[0]!=""){
		$line=explode(";",$arr[0]);
		$ad=strval($line[0]);
		$age=intval($line[1]);
		$genre=strval($line[2]);
		$eth=strval($line[3]);
		if ($age!="age"){
			if ($genre==$gender and $age>$agemin and $age<=$agemax and $eth==$ethnie){
				echo "<img src='https:".$ad."' alt='erreur'><br>";
			} 
		}
	}
}
?>
</div>
</div>
</body>
