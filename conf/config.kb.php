<?php

//Datensätze für die Datenbankverbindung

define('MYSQL_HOST', "localhost");
define('MYSQL_USER', "root");
define('MYSQL_PASS', "");
define('MYSQL_DATABASE', "klabu");

$db_link = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
mysql_select_db(MYSQL_DATABASE) OR
die ("Konnte die Datenbank nicht verwenden! Error: ".mysql_error());



/*****************RECHTE*****************/
/**/                                  /**/
/**/                                  /**/
/**/ //     Rechtevergabe-Datei       /**/
/**/                                  /**/
/**/ //     Hier wird definiert       /**/
/**/ //     welcher TYP von user      /**/
/**/ //     was genau sehen darf      /**/
/**/                                  /**/
/**/                                  /**/
/**/ //     Wichtig!!!                /**/
/**/ //     Bitte kein Leerzeichen    /**/
/**/ //     hinter dem Komma setzen!  /**/
/**/                                  /**/
/**/                                  /**/
/****************************************/

define ('ADMIN_RIGHTS', "ADMIN,FBL,LEHRER,SCHUELER");
define ('FBL_RIGHTS', "FBL,LEHRER,SCHUELER");
define ('LEHRER_RIGHTS', "LEHRER,SCHUELER");
define ('SCHUELER_RIGHTS', "SCHUELER");

?>
