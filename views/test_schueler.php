<?php

//Klasse BIT07/1C erstellen
$klasse1 = new Klasse();
$klasse1 -> setName("BIT07/1C");

//Neuer Schueler
$s1 = new Schueler();
$s1 -> setId(4711);
$s1 -> setVorname("Peter");
$s1 -> setNachname("File");
$s1 -> setSchulklasse_id(4);
$s1 -> create_login();

//Neuer Schueler
$s2 = new Schueler();
$s2 -> setId(4712);
$s2 -> setVorname("Pete");
$s2 -> setNachname("Fil");
$s2 -> setSchulklasse_id(4);
$s2 -> create_login();

//Neuer Schueler
$s3 = new Schueler();
$s3 -> setId(4713);
$s3 -> setVorname("Pet");
$s3 -> setNachname("Fe");
$s3 -> setSchulklasse_id(4);
$s3 -> create_login();

//Schueler in die Klasse hinzufügen
$klasse1 -> addSchueler($s1);
$klasse1 -> addSchueler($s2);
$klasse1 -> addSchueler($s3);

html::showAll($klasse1 -> schuelerliste);

//Absatz
echo '<br>';
echo '<br>';

?>



