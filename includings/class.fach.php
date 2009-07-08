<?php

class Fach extends Db implements Dmlable {
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $fach_id;
	
	/*
	 * Name des Schulfachs
	 * string
	 * 45 Zeichen erlaubt
	 */
	private $name;
	
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
		return $this->fach_id;
	}
	
	/**
	 * @param int $fach_id
	 */
	public function setId($fach_id) {
		$this->fach_id = $fach_id;
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param tring $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->fach_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO fach 
					   (fach_id, name) 
				VALUES ('' 
					   , '" .$this->name."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->fach_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE fach 
				   SET name='" .$this->name. "' 
				 WHERE fach_id=" .$this->fach_id. ";";
		
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
		$sql = "DELETE FROM fach 
			     WHERE fach_id=" .$id. ";";
		
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
		$sql = "SELECT fach_id
					   ,name  
			      FROM fach 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$fachs = array();
			while ($row = mysql_fetch_assoc($result)) {
				$fachs[$row['fach_id']]['fach_id'] = $row['fach_id'];
				$fachs[$row['fach_id']]["name"] = $row['name'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $fachs;
	}
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM fach 
				 WHERE fach_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['fach_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->fach_id = $row['fach_id'];
			$this->name = $row['name'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	

}

?>