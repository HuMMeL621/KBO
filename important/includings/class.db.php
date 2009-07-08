<?php

abstract class db{
	
	public function __construct() {
		
		// Verbindung zum Datenbankserver aufbauen
		$link = mysql_connect ( DB_SERVER, DB_USER, DB_PASSWD );
		if (! $link) {
			
			throw new MysqlException ( );
		
		}
		
		// Datenbank auswählen
		$db = mysql_select_db ( DB_NAME );
		if (! $db) {
			
			throw new MysqlException ( );
		
		}
		
		
	
	}
		

}