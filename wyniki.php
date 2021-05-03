<?php

error_reporting(0);

$mysqli = new mysqli("localhost", "id9763659_oleksandr", "sandmbikes525", "id9763659_quiz");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
$query = "SELECT * FROM `odpowiedzi`";

$wynik = $mysqli->query($query);
$wyniki = [];
for($i = 1; $i <= 7; ++$i){
	$wyniki[$i] = [
		a => 0,
		b => 0,
		c => 0,
		d => 0
	];
}
while($record = $wynik->fetch_assoc()){
	$wyniki[1][$record["odp1"]]++;
	$wyniki[2][$record["odp2"]]++;
	$wyniki[3][$record["odp3"]]++;
	$wyniki[4][$record["odp4"]]++;
	$wyniki[5][$record["odp5"]]++;
	$wyniki[6][$record["odp6"]]++;
	$wyniki[7][$record["odp7"]]++;
}

// echo "<pre>";
// var_dump($wyniki);
// echo "</pre>";
// exit();

$mysqli->close();


?><!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<title>bmxpl</title>
	
	<meta name="description" content="Poznasz tutaj dużo wiedzy o takim sporcie jak BMX, rodzajach jazdy, częściach i najbardziej wyątkowych projektów, powiązanych z nim!" />
	<meta name="keywords" content="bmx, rower, bike, riding, części, sklep, trick, zawody, mtb, shop, skatepark, extreme"/>
	
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="sticky.js"></script>
	<script type="text/javascript" src="slider.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script type="text/javascript" src="timer.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="style.css" rel="stylesheet" type="text/css" />
	
</head>

<body onload="zmienslajd(); odliczanie();">
	<div id="container">
		<header>
			<div class="logo"><b>bmx</b>pl</div>
			<div class="nav">
				<ol>
					<li><a href="index.html">Strona Główna</a></li>
					<li><a href="historia.html">Historia</a></li>
					<li><a href="czesci.html">Części</a>
						<ul>
							<li><a href="rama.html">Rama</a></li>
							<li><a href="widelec.html">Widelec</a></li>
							<li><a href="kierownica.html">Kierownica</a></li>
							<li><a href="naped.html">Napęd</a></li>
							<li><a href="kola.html">Koła</a></li>
						</ul>	
					</li>
					<li><a href="dyscyplina.html">Dyscypliny</a>
						<ul>
							<li><a href="street.html">Street</a></li>
							<li><a href="park.html">Park/Dirt</a></li>
							<li><a href="flatland.html">Flatland</a></li>
						</ul>
					</li>
					<li><a href="skateparki.html">Skateparki</a></li>
					<li><a href="ankieta.php">Ankieta</a>
						<ul>
							<li><a href="wyniki.php">Wyniki</a></li>
							<li><a href="usuwaj.php">Usuwaj</a></li>
						</ul>
					</li>						
					<li><a href="kontakt.html">Kontakt</a></li>
				</ol>
			</div>
			<div style="clear:both;"></div>
		</header>
		<div class="wrapper">
		<div class="boczna_kolumna">
			<i class="fas fa-shopping-cart"></i>
			<br />
			<a href="https://www.danscomp.com/" target="_blank" title="DanscompBMX"><img src="danscomp.png" height="175"></a>
			<a href="https://www.manyfestbmx.pl/" target="_blank" title="ManyfestBMX"><img src="logom.png"></a>
			<a href="https://www.sourcebmx.com" target="_blank" title="SourceBMX"><img src="source.png"></a>
			<a href="http://allday.pl/" target="_blank" title="AlldayBMX"><img src="allday.png"></a>
			<br /><br />
			<a href="https://avebmx.pl/" target="_blank" title="AveBMX"><img src="avebmx.png"></a>
			<br /><br />
			<a href="https://www.kunstform.org/en/" target="_blank" title="KunstFormBMX"><img src="kunst.jpg"></a>
		</div>
		<div class="content">
			<div id="slider"></div>
			<br />
			<div class="span">
			<span class="odnosnik_slidera" onclick="ustawslajd(1)" > &bull; </span>
			<span class="odnosnik_slidera" onclick="ustawslajd(2)" > &bull; </span>
			<span class="odnosnik_slidera" onclick="ustawslajd(3)" > &bull; </span>
			<span class="odnosnik_slidera" onclick="ustawslajd(4)" > &bull; </span>
			<span class="odnosnik_slidera" onclick="ustawslajd(5)" > &bull; </span>
			</div>
			<table>
				<tr>
					<td>Pytanie</td> <td>A</td> <td>B</td> <td>C</td> <td>D</td>                                          
				</tr>                                                                                                     
				<?php
				echo "<tr>";
				echo "	<td>Ile masz lat?</td> <td>".$wyniki[1]['a']."</td> <td>".$wyniki[1]['b']."</td> <td>".$wyniki[1]['c']."</td> <td>".$wyniki[1]['d']."</td>";
				echo "</tr><tr>";
				echo "	<td>Jak dowiedziałeś się o nas?</td> <td>".$wyniki[2]['a']."</td> <td>".$wyniki[2]['b']."</td> <td>".$wyniki[2]['c']."</td> <td>".$wyniki[2]['d']."</td>";
				echo "</tr><tr>";
				echo "	<td>Kim jesteś?</td> <td>".$wyniki[3]['a']."</td> <td>".$wyniki[3]['b']."</td> <td>".$wyniki[3]['c']."</td> <td>".$wyniki[3]['d']."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "	<td>Ile razy jeżdzisz w tygodniu?</td> <td>".$wyniki[4]['a']."</td> <td>".$wyniki[4]['b']."</td> <td>".$wyniki[4]['c']."</td> <td>".$wyniki[4]['d']."</td>";
				echo "</tr><tr>";
				echo "	<td>Twój ulubiony triczek?</td> <td>".$wyniki[5]['a']."</td> <td>".$wyniki[5]['b']."</td> <td>".$wyniki[5]['c']."</td> <td>".$wyniki[5]['d']."</td>";
				echo "</tr><tr>";
				echo "	<td>Twój ulubiony brand?</td> <td>".$wyniki[6]['a']."</td> <td>".$wyniki[6]['b']."</td> <td>".$wyniki[6]['c']."</td> <td>".$wyniki[6]['d']."</td>";
				echo "</tr><tr>";
				echo "	<td>Czy znalazłeś tutaj odpowiedzi na swoje pytania?</td> <td>".$wyniki[7]['a']."</td> <td>".$wyniki[7]['b']."</td> <td>".$wyniki[7]['c']."</td> <td></td>";
				echo "</tr>";
				?>
			
			
			</table>
		</div>
		<div class="boczna_kolumna">
			<i class="fas fa-tools"></i>
			<br /><br />
			<a href="https://wethepeoplebmx.de/" target="_blank" title="WeThePeopleBMX"><img src="wtp.png"></a>
			<br /><br />
			<a href="https://bsdforever.com/" target="_blank" title="BSD"><img src="bsd.png"></a>
			<br /><br />
			<a href="http://eclatbmx.com/" target="_blank" title="EclatBMX"><img src="eclat.png"></a>
			<br /><br />
			<a href="https://www.odysseybmx.com/dailyword/" target="_blank" title="OdysseyBMX"><img src="odyssey.png"></a>
			<br /><br />
			<a href="https://federalbikes.com/" target="_blank" title="FederalBMX"><img src="federal.png"></a>
		</div>
		</div>
		<div style="clear:both;"></div>
		<footer>
		<div id="zegar"></div>
		</footer>


	</div>

</body>


</html>	