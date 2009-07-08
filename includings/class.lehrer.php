<?php

class raeume extends Db implements Dmlable { 
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $lehrer_id;
	private $klasse_id;
	
	public function __construct() {
		try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
	    }
	}
	/**
	 * @return int
	 */
	public function getId() {
		return $this->lehrer_id;
	}
	public function setId($lehrer_id) {
		$this->lehrer_id = $lehrer_id;
	}
	
	/**
	 * @return string
	 */
	public function getklasse_id() {
		return $this->klasse_id;
	}
    /**
	 * @param tring $klasse_id
	 */
	public function setKlasse_id($klasse_id) {
		$this->klasse_id = $lasse_id;
	}
	
	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->lehrer_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO lehrer 
					   (lehrer_id, klasse_id) 
				VALUES ('' 
					   , '" .$this->klasse_id."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->lehrer_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE raum 
				   SET =klasse_id'" .$this->klasse_id. "' 
				 WHERE lehrer_id=" .$this->lehrer_id. ";";
		
		try {
			$success_update = mysql_query($sql);
			if (!$success_update) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
	}
	
	public function delete($id) {
		$sql = "DELETE FROM lehrer 
			     WHERE lehrer_id=" .$id. ";";
		
		try {
			$success_delete = mysql_query($sql);
			if (!$success_delete) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT lehrer_id
					   ,klasse  
			      FROM lehrer 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$lehrer_id = array();
			while ($row = mysql_fetch_assoc($result)) {
				$lehrer_id[$row['lehrer_id']]['lehrer_id'] = $row['lehrer_id'];
				$lehrer_id[$row['lehrer_id']]["klasse_id"] = $row['klasse_id'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $klasse_id;
	}
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM lehrer 
				 WHERE lehrer_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['lehrer_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->lehrer_id = $row['lehrer_id'];
			$this->klasse_id = $row['klasse_id'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	

}

?>