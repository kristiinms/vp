<?php
	require_once "../config_vp2022.php";
	
	//loome andmebaasiühenduse
	$conn = new mysqli($server_host, $server_user_name, $server_password, $database);
	//määramae suhtlemisel kasutatava kooditabeli
	$conn->set_charset("utf8");
	//valmistame ette SQL keeles päringu
	$stmt = $conn->prepare("SELECT comment, grade, added FROM vp_daycomment_1");
	echo $conn->error;
	//seome loetavad andmed muutujatega
	$stmt->bind_result($comment_from_db, $grade_from_db, $added_from_db);
	//täidame käsu
	$stmt->execute();
	echo $stmt->error;
	//võtan andmeid
	//kui on oodata vaid 1 võimalik kirje
	if($stmt-fetch(){
		//kõik mida teha
	//}
	$comments_html = null;
	//kui on oodata mitut, aga teadmata arvu
	while($stmt->fetch()){
		//<p>Kommentaar, hinne päevale: x, lisatud yyyyyy.</p>
		$comments_html .="<p>" .$comment_from_db . ", hinne päevale: " .$grade_from_db .", lisatud " .$added_from_db .".<p/> \n";
	}
	//sulgeme käsu
	$stmt->close();
	//sulgeme andmebaasiühenduse
	$conn->close();
	
	

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Kristiin, veebiprogrammeerimine</title>
</head>
<body>
    <hl>Kristiin, Veebiprogrammerimine</hl>
  <p>Õppetöö raames loodud leht, mis ei sisalda tõsist infot!</p>
  <p>Õppetöö toimus <a href="https://www.tlu.ee">Tallinna Ülikoolis</a>.</p>
  <img src="pics/tlu_33.jpg" alt="Tallinna Ülikooli Astra õppehoone">
  <p>Lehe avamise hetk: <?php echo $weekday_names_et[$weekday_now - 1] .", " .$full_time_now; ?>.</p>
  <p>Praegu on <?php echo $part_of_day; ?>.</p>
</body>
</html>
