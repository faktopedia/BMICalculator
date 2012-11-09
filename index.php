<HTML>
<head>
<title>BMICalculator</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
</head>

<body>
<h1>Izračunajte Vaš BMI!</h1>
<div id="main">
<form  type="submit" method="post">
Visina (u cm)<br/><br/><input type="text" name="visina"class="forma" id="visina"> <br/></br>
Težina (u kg)<br/><br/><input type="text" name="tezina"class="forma" id="tezina"> <br/></br>
Godine <br/><br/><input type="text" name="godine"class="forma" id="godine"> </br>
<br/>
Pol : </br>
<input type="radio" name="pol" value="1" checked="yes" /> Muški   
<input type="radio" name="pol" value="2" /> Ženski  </br></br>
<input type="image" src="image1.png" class="image" class="form2" alt="Izracunaj">
</form>
<form>
<input type="image" src="reset.png" class="form2" alt="Reset">
</form>
<?php
if ( $_POST ) {
$vis=$_POST['visina'] ;
$tez=$_POST['tezina'];
$god=$_POST['godine'];
$pol_rad=$_POST['pol'];
	if ($vis<=0 or $tez<=0 or $god<=0 or strlen($vis)==0 or strlen($tez)==0 or strlen($god)==0){
		echo 'Podaci nisu lepo uneti </br>';
		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	
		die();
}
	else{
			$vis2=($vis/100)*($vis/100);
			if($pol_rad=='1') {
				$jedan=$vis-100;
				$dva=($vis-150)/4;
				$tri=($god-20)/2.5;
				$ide=$jedan-$dva+$tri;
				$rezultat=$tez/$vis2;
				}
			if ($pol_rad=='2') {
				$jedan=$vis-100;
				$dva=($vis-150)/2.5;
				$tri=($god-20)/2.5;
				$ide=$jedan-$dva+$tri;
				$rezultat=$tez/$vis2;
}
		if ($rezultat<18.5) {
		echo 'Vaš BMI je :' ,number_format($rezultat, 2),'<br/> <b>Neuhranjenost!</b></br>'; 

}
		if($rezultat>18.5 and $rezultat<24.9) {
		echo 'Vaš BMI je :' ,number_format($rezultat, 2),'</br>','  <b>Normalna težina!</b></br>';
}
		if($rezultat<29.9 and $rezultat>25) {
		echo 'Vaš BMI je :' ,number_format($rezultat, 2),'</br>','  <b>Povecana težina!</b></br>';
}
		if ($rezultat>30){
		echo 'Vaš BMI je :' ,number_format($rezultat, 2),'</br>','  <b>Gojaznost!</b></br>';
}
echo 'Vaša idealna težina je :', $ide;
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo '</br>';

die();

}

}
?>
</div>
</body>

</HTML>
