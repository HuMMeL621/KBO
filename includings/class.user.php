<?php

class User extends Db implements Dmlable{
	
	//Primärschlüssel
	private $user_id;
	private $login;
	private $passwd;
	private $typ;
	
	public function __construct(){
		try{
			parent::__construct();
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}
	
	public function getId(){
		return	$this -> user_id;
	}
	
	public function setId($user_id){
		$this -> user_id = $user_id;
	}
	
	public function getLogin(){
		return $this -> login;
	}
	
	public function setLogin ($login){
		$this -> login = $login;
	}
	
	public function getPasswd(){
		return $this -> passwd;
	}
	
	public function setPasswd($passwd){
		$this -> passwd = $passwd;
	}
	
	public function getTyp(){
		return $this -> typ;
	}
	
	public function setType($type){
		$this -> type = $type;
	}
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save(){
		if(isset($this->$user_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO user
					   (user_id,login,passwd,typ)
				VALUES ('','".$this->login."','".$this->passwd."','');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$user_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE user
				   SET login'".$this->login."',
					   passwd'".$this->passwd."',
					   typ'".$this->type."',				   
				 WHERE user_id".$this->user_id.";";
		
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
		$sql = "DELETE FROM user
				WHERE user_id=".$id.";";
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
		$sql="SELECT user_id
				     ,login
					 ,passwd
					 ,typ
				FROM user
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!result) {
				throw new MysqlException();
			}
			
			$anwesenheiten = array();
			while ($row = mysql_fetch_assoc($result)){
				$anwesenheiten[$row['user_id']]['user_id'] = $row['user_id'];
				$anwesenheiten[$row['user_id']]['login'] = $row['login'];
				$anwesenheiten[$row['user_id']]['passwd'] = $row['passwd'];
				$anwesenheiten[$row['user_id']]['typ'] = $row['typ'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $noten;
	}
	public function load($id){
	
		$sql="SELECT *
				FROM user
			  	WHERE user_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['user_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->anwesenheit_id=$row['user_id'];
			$this->status=$row['login'];
			$this->verspaetung=$row['passwd'];
			$this->datum=$row['typ'];
			
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