<?php

class Anwesenheit extends db implements Dmlable{
	
	//Primärschlüssel
	private $klasse_id;
	private $schueler_id;
	private $datum;
	private $status;
	private $verspaetung;
	private $anwesenheit_id;
	
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
	 *resturn int
	*/
	public function getStatus(){
		return $this -> status;
	}
	
	/*
	 *parameter int $datum
	*/
	public function setStatus($status){
		$this->status = $status;
	}
	
	/*
	 *resturn int
	*/
	public function getVerspaetung(){
		return $this -> verspaetung;
	}
	
	/*
	 *parameter int $datum
	*/
	public function setVerspaetung($verspaetung){
		$this->verspaetung = $verspaetung;
	}
	
	/*
	 *resturn int
	*/
	public function getAnwesenheitid(){
		return $this -> anwesenheit_id;
	}
	
	/*
	 *parameter int $datum
	*/
	public function setAnwesenheitid($anwesenheit_id){
		$this->anwesenheit_id = $anwesenheit_id;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save(){
		if(isset($this->$anwesenheit_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO anwesenheit
					   (anwesenheit_id,klasse_id,schueler_id,datum,verspaetung,status)
				VALUES ('','','','".$this->datum."','".$this->verspaetung."','".$this->status."');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$anwesenheit_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE anwesenheit
				   SET schueler_id'".$this->schueler_id."',
				   	   klasse_id'".$this->klasse_id."',
					   verspeatung'".$this->verspaetung."',
					   datum'".$this->datum."',
					   status'".$this->status."',				   
				 WHERE anwesenheit_id".$this->anwesenheit_id.";";
		
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
		$sql = "DELETE FROM anwesenheit
				WHERE anwesenheit_id=".$id.";";
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
		$sql="SELECT anwesenheit_id
				     ,schueler_id
					 ,klasse_id
					 ,datum
					 ,status
					 ,verspaetung
				FROM anwesenheit
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!result) {
				throw new MysqlException();
			}
			
			$anwesenheiten = array();
			while ($row = mysql_fetch_assoc($result)){
				$anwesenheiten[$row['anwesenheit_id']]['anwesenheit_id'] = $row['anwesenheit_id'];
				$anwesenheiten[$row['anwesenheit_id']]['schueler_id'] = $row['schueler_id'];
				$anwesenheiten[$row['anwesenheit_id']]['datum'] = $row['datum'];
				$anwesenheiten[$row['anwesenheit_id']]['klasse_id'] = $row['klasse_id'];
				$anwesenheiten[$row['anwesenheit_id']]['verspaetung'] = $row['verspaetung'];
				$anwesenheiten[$row['anwesenheit_id']]['status'] = $row['status'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $anwesenheiten;
	}

        public function getAllAsObject($von='', $bis='', $s=0) {

		$sql="SELECT anwesenheit_id
				     ,schueler_id
					 ,klasse_id
					 ,datum
					 ,status
					 ,verspaetung
                                         ,unterrichtsstunde_id
				FROM anwesenheit
				WHERE datum >= '".$von."' AND datum <='".$bis."'";
               if($s instanceof schueler) {
                    $schueler_id=$s->getId();
                    $sql .= " AND schueler_id = ".$schueler_id;
               }elseif($s instanceof klasse) {
                    $klasse_id=$s->getId();
                    $sql .= " AND klasse_id = ".$klasse_id;
               }
               
		try {
			$result = mysql_query($sql);

			if(!result) {
				throw new MysqlException();
			}

			$anwesenheiten = array();
			while ($row = mysql_fetch_assoc($result)){
				$anwesenheiten[$row['anwesenheit_id']]['anwesenheit_id'] = $row['anwesenheit_id'];
				$anwesenheiten[$row['anwesenheit_id']]['schueler_id'] = $row['schueler_id'];
				$anwesenheiten[$row['anwesenheit_id']]['datum'] = $row['datum'];
				$anwesenheiten[$row['anwesenheit_id']]['klasse_id'] = $row['klasse_id'];
				$anwesenheiten[$row['anwesenheit_id']]['verspaetung'] = $row['verspaetung'];
				$anwesenheiten[$row['anwesenheit_id']]['status'] = $row['status'];
                                $anwesenheiten[$row['anwesenheit_id']]['unterrichtsstunde_id'] = $row['unterrichtsstunde_id'];
                        }
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}

            return $anwesenheiten;
        }


	public function load($id){
	
		$sql="SELECT *
				FROM anwesenheit
			  	WHERE anwesenheit_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['anwesenheit_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->anwesenheit_id=$row['anwesenheit_id'];
			$this->status=$row['status'];
			$this->verspaetung=$row['verspaetung'];
			$this->datum=$row['datum'];
			$this->schueler_id=$row['schueler_id'];
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