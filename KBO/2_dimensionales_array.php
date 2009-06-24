<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
</head>

<body>
<?php
$namensliste=array();
$namen=array();
$namensliste[]=$namen;
$namensliste[]=$namen;
$namen['vorname']='Frankey';
$namen['nachnamen']='Kuhl';
$namensliste[]=$namen;
$namen['vorname']='Christian';
$namen['nachnamen']='Trambow';
$namensliste[]=$namen;
$namen['vorname']='Alexander';
$namen['nachnamen']='Rauch';
$namensliste[]=$namen;
$namensliste[]=$namen;
$namen['vorname']='Benjamin';
$namensliste[]=$namen;
$namen['vorname']='Patrick';
$namen['nachnamen']='Lehmann';
$namensliste[]=$namen;
$namen['vorname']='Denny';
$namen['nachnamen']='Weigmann';
$namensliste[]=$namen;
$namen['vorname']='Maik';
$namensliste[]=$namen;
$namen['vorname']='Lijin';
$namen['nachnamen']='Joseph';
$namensliste[]=$namen;
$namen['vorname']='Viktor';
$namen['nachnamen']='Gallinger';
$namensliste[]=$namen;
$namen['vorname']='Murat';
$namen['nachnamen']='Akburak';
$namensliste[]=$namen;
$namen['vorname']='Hendrick';
$namen['nachnamen']='Burkantat';
$namensliste[]=$namen;
$namen['vorname']='Florian';
$namen['nachnamen']='Sommerfeldt';
$namensliste[]=$namen;
$namen['vorname']='Darius-Adam-II';
$namen['nachnamen']='Merks';
$namensliste[]=$namen;
$namen['vorname']='Dennis';
$namen['nachnamen']='Hellel';
$namensliste[]=$namen;
$namen['vorname']='Dennis';
$namen['nachnamen']='Beckmann';
$namen['spitzname']='The Power';
$namensliste[]=$namen;
	echo'<pre>';
    print_r($namensliste);
    echo '<pre>';
?>
</body>
</html>
