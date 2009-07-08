<?php

//Datensätze für die Datenbankverbindung

define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWD', "");
define('DB_NAME', "klabu");



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

define ('ADMIN_RIGHTS',"FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN,BENUTZER,KLASSEN,FAECHER,WOCHENPLANER");
define ('FBL_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN");
define ('LEHRER_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG,ANWESENHEIT,NACHTRAGUNGEN,KLASSENLISTE_ZUM_DRUCKEN");
define ('SCHUELER_RIGHTS', "FEHLZEITEN,STUNDENPLAN,BERICHTSHEFT,KLASSENLISTE,MEINE_SEITE,EINSTELLUNGEN,PROFILSUCHE,NEWS,NOTENLISTE,BERICHTSEINTRAGUNG");
define ('SEKRETAERIN_RIGHTS', "ANWESENHEIT");

?>
