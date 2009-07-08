<?php

class Noten extends db implements Dmlable{
	
	//Primärschlüssel
	private $note_id;
	private $klasse_id;
	private $schueler_id;
	private $fach_id;
	private $lehrer_id;
	private $note;
	private $datum;
	
	/*Name der Klasse
	 *string
	 *45 Zeichen erlaubt
	*/
	private $type;
	
	public function __construct(){
		try{
			parent::__construct();
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}
	
	/*
	 *resturn int
	*/
	public function getId(){
		return $this -> klasse_id;
	}
	
	/*
	 *parameter int $klasse_id
	*/
	public function setId($klasse_id){
		$this->klasse_id = $klasse_id;
	}
	
		/*
	 *resturn int
	*/
	public function getLid(){
		return $this -> lehrer_id;
	}
	
	/*
	 *parameter int $lehrer_id
	*/
	public function setLid($lehrer_id){
		$this->lehrer_id = $lehrer_id;
	}
	
		/*
	 *resturn int
	*/
	public function getFid(){
		return $this -> fach_id;
	}
	
	/*
	 *parameter int $fach_id
	*/
	public function setFid($fach_id){
		$this->fach_id = $fach_id;
	}
	
		/*
	 *resturn int
	*/
	public function getSid(){
		return $this -> schueler_id;
	}
	
	/*
	 *parameter int $schueler_id
	*/
	public function setSid($schueler_id){
		$this->schuler_id = $schueler_id;
	}
	
		/*
	 *resturn int
	*/
	public function getDid(){
		return $this -> datum;
	}
	
	/*
	 *parameter int $datum
	*/
	public function setDid($datum){
		$this->datum = $datum;
	}
	
	/*
	 *return string
	*/
	public function getType(){
		return $this -> type;
	}
	
	/*
	 *parameter string $name
	*/
	public function setType($type){
		$this->type = $type;
	}
	
	/*
	 *return string
	*/
	public function getNid(){
		return $this -> note_id;
	}
	
	/*
	 *parameter string $name
	*/
	public function setNid($note_id){
		$this->note_id = $note_id;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save(){
		if(isset($this->$note_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO noten
					   (note_id,klasse_id,fach_id,schueler_id,lehrer_id,typ,note)
				VALUES ('','','','','','".$this->type."','".$this->note."');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$note_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE noten
				   SET typ'".$this->type."',
				   	   fach_id'".$this->fach_id."',
					   lehrer_id'".$this->lehrer_id."',
					   klasse_id'".$this->klasse_id."',
					   note'".$this->note."',
					   datum'".$this->datum."'				   
				 WHERE note_id".$this->note_id.";";
		
		try{
			$success_delete = mysql_query($sql);
			if (!success_delete) {
				throw new MysqlException();
			}
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function delete($id){
		$sql = "DELETE FROM noten
				WHERE note_id=".$id.";";
		try{
			$success_delete = mysql_query($sql);
			if (!success_delete) {
				throw new MysqlException();
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}		
	
	public function getAllAsArray($restriction = ''){
		$sql="SELECT note_id
				     ,note
					 ,typ
					 ,lehrer_id
					 ,schueler_id
					 ,klasse_id
					 ,datum
					 ,fach_id
				FROM klasse
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!result) {
				throw new MysqlException();
			}
			
			$noten = array();
			while ($row = mysql_fetch_assoc($result)){
				$noten[$row['note_id']]['note_id'] = $row['note_id'];
				$noten[$row['note_id']]['note'] = $row['note'];
				$noten[$row['note_id']]['type'] = $row['typ'];
				$noten[$row['note_id']]['fach_id'] = $row['fach_id'];
				$noten[$row['note_id']]['lehrer_id'] = $row['lehrer_id'];
				$noten[$row['note_id']]['schueler_id'] = $row['schueler_id'];
				$noten[$row['note_id']]['datum'] = $row['datum'];
				$noten[$row['note_id']]['klasse_id'] = $row['klasse_id'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $noten;
	}

        /*
         * 		$this->setId($schueler_id);
		$this->setTyp($typ);
		$this->setFach_id($fach_id);
		$this->setDatum($datum);
		$this->setPunkte($punkte);
         */

	public function getAllAsObject($restriction = ''){
		$sql="SELECT schueler_id
                            ,typ
                            ,fach_id
                            ,datum
                            ,note
				FROM noten
				WHERE 1=1";
		$sql .=$restriction. ";";

		try {
			$result = mysql_query($sql);

			if(!result) {
				throw new MysqlException();
			}

			$noten = array();
			while ($row = mysql_fetch_assoc($result)){
                            $noten[]=$row['schueler_id'];
                            $noten[]=$row['typ'];
                            $noten[]=$row['fach_id'];
                            $noten[]=$row['datum'];
                            $noten[]=$row['note'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}

		return $noten;
	}

	public function load($id){
	
		$sql="SELECT *
				FROM noten
			  	WHERE note_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['note_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->note_id=$row['note_id'];
			$this->note=$row['note'];
			$this->type=$row['typ'];
			$this->datum=$row['datum'];
			$this->lehrer_id=$row['lehrer_id'];
			$this->schueler_id=$row['schueler_id'];
			$this->fach_id=$row['fach_id'];
			$this->klasse_id=$row['klasse_id'];
			
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		} 
		catch (Exception $e) {
			Html::showAll($e);
		}
		
	}
	
	
}		
?>