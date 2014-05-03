<?php
//Datenbank Einstellungen
define('DB_HOST', 'hostname');
define('DB_USER', 'username');
define('DB_PASSWORD', 'password')
define('DB_TABLE', 'tablename');

header('Content-type: application/json');

$connetion = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_TABLE);

//Query für alle Angebote
$query = "SELECT * FROM angebote ORDER BY id ASC";
$mysqlQuery = mysql_query($query);

$result = array();
//Fetch 
while($row = mysql_fetch_assoc($mysqlQuery)) {
	$rowResult = array();
	//Wenn der Angobtespreis gleich dem Normalpreis ist, keine Anzeige
	if($row['whitePrice'] == $row['redPrice']) {
		$rowResult['redPrice'] = $row['redPrice'] ."&euro;";
		$rowResult['whitePrice'] = '';
		$rowResult['percent'] = '';
	} else {
		$rowResult['redPrice'] = $row['redPrice'] ."&euro;";
		$rowResult['whitePrice'] = $row['whitePrice'] ."&euro;";
		$rowResult['percent'] = '-' .round(100-(($row['redPrice']/$row['whitePrice'])*100)) .'%';
	}
	//Rest anfügen
	$rowResult['productName'] = $row['productName'];
	$rowResult['productImage'] = $row['productImage'];
	
	$result[] = $rowResult;
}

//Erzeugen der JSON Struktur
print_r(json_encode($result));

mysql_close($connetion);
?>