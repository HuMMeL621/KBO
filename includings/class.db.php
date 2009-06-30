<?php

class db
{

     /**
      * Klasse zur Verwaltung der Datenbank
      */

    private $db_host = 'localhost';
    private $db_name = 'klabu';
    private $db_user = 'root';
    private $db_passwd = '';

    private $conn = '';


    //Verbindungsaufbau
    public function __construct() {
        
        $this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_passwd);

        //Überprüfung ob Verbindung erfolgreich war
        if(!$this->conn) {
        echo "Keine Verbindung zum Server ".mysql_error()." möglich!";
        exit;
        }

        //Verbindung zur Datenbank
        if(!mysql_select_db($this->db_name)) {
        echo "Keine Verbindung zur Datenbank ".mysql_error()." möglich!";
        exit;
        }
        
    }
    
}

?>