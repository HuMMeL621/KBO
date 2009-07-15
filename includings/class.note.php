<?php

class Noten extends db implements Dmlable{
	
	//PrimÃ¤rschlÃ¼ssel
	private $note_id;
	private $klasse_id;
	private $schueler_id;
	private $fach_id;
	private $lehrer_id;
	private $note;
	private $datum;

        public $notens;

	/*
         * Name der Klasse
	 * string
	 * 45 Zeichen erlaubt
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
	public function getLehrer_id(){
		return $this -> lehrer_id;
	}
	
	/*
	 *parameter int $lehrer_id
	*/
	public function setLehrer_id($lehrer_id){
		$this->lehrer_id = $lehrer_id;
	}
	
		/*
	 *resturn int
	*/
	public function getFach_id(){
		return $this -> fach_id;
	}
	
	/*
	 *parameter int $fach_id
	*/
        public function setFach_id(){
		$this->fach_id = $fach_id;
	}
	
		/*
	 *resturn int
	*/
	public function getSchueler_id(){
		return $this -> schueler_id;
	}
	
	/*
	 *parameter int $schueler_id
	*/
	public function setSchueler_id($schueler_id){
		$this->schuler_id = $schueler_id;
	}
	
		/*
	 *resturn int
	*/
	public function getDatum(){
		return $this -> datum;
	}
	
	/*
	 *parameter int $datum
	*/
	public function setDatum($datum){
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
	public function getNote_id(){
		return $this -> note_id;
	}
	
	/*
	 *parameter string $name
	*/
	public function setNote_id($note_id){
		$this->note_id = $note_id;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein PrimÃ¤rschlÃ¼ssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgefÃ¼hrt
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

        /**
         *
         * @param <type> $restriction
         *
         * Hier wird die Variable Noten aufgefüllt :)
         */

	public function getAllAsObject(){
		$sql="SELECT klasse_id
                            ,fach_id
                            ,schueler_id
                            ,typ
                            ,note
                            ,datum
				FROM noten";

		try {
			$result = mysql_query($sql);

			if(!result) {
				throw new MysqlException();
			}
			while ($row = mysql_fetch_assoc($result)){

                            $noten['klasse_id']=$row['klasse_id'];
                            $noten['fach_id']=$row['fach_id'];
                            $noten['schueler_id']=$row['schueler_id'];
                            $noten['typ']=$row['typ'];
                            $noten['note']=$row['note'];
                            $noten['datum']=$row['datum'];
                            $this->notens[]=$noten;
                            /*
                             * noten als objekt
                             *
                             * 
                             */

                             $n=new noten;
			}


		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
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

        /**
         *
         * @param integer $klasse_id
         * @return array
         *
         * Rückgabe aller Noten aus der Datenbank von der angegebenen Klasse
         */

        public function getAllNoten($klasse_id=0) {

            //Mysql-Datensatz aus der Datenbank ins Array notens schreiben
            $this->getAllAsObject();

            $klasse_noten=array();

            foreach($this->notens as $noten) {
                if ($noten['klasse_id']==$klasse_id) {
                        $buffer['klasse_id']=$noten['klasse_id'];
                        $buffer['schueler_id']=$noten['schueler_id'];
                        $buffer['fach_id']=$noten['fach_id'];
                        $buffer['typ']=$noten['typ'];
                        $buffer['note']=$noten['note'];
                        $buffer['datum']=$noten['datum'];
                        $klasse_noten[]=$buffer;
                    }
            }
            return $klasse_noten;

/*
            $ausgabe = array();
            $zwischen = array();    //Dient als Zwischenablage um das Array nach
                                    //Klassen sortieren zu können

            foreach($this->notens as $noten) {
                static $i=0;
                static $last_klasse;
                $buffer['klasse_id']=$noten['klasse_id'];
                $buffer['schueler_id']=$noten['schueler_id'];
                $buffer['fach_id']=$noten['fach_id'];
                $buffer['typ']=$noten['typ'];
                $buffer['note']=$noten['note'];
                $buffer['datum']=$noten['datum'];
                $zwischen[$i]=$buffer;
                $ausgabe[$noten['klasse_id']]=$zwischen;
                foreach($zwischen as $zwischen) {
                    $zwischen='';
                }
                $last_klasse = $noten['klasse_id'];
                $i++;
            }
            return $ausgabe; */
            
        }

        /**
         *
         * @param integer $schueler_id
         * @return array
         *
         * Rückgabe der Noten des angegebenen Schuelers als array.
         */

        public function getNoten($schueler_id=0) {

            //Mysql-Datensatz aus der Datenbank ins Array notens schreiben
            $this->getAllAsObject();

            $schueler_noten=array();
            
            foreach($this->notens as $noten) {
                if ($noten['schueler_id']==$schueler_id) {
                    if ($noten['schueler_id']==$schueler_id) {
                        $buffer['schueler_id']=$noten['schueler_id'];
                        $buffer['fach_id']=$noten['fach_id'];
                        $buffer['typ']=$noten['typ'];
                        $buffer['note']=$noten['note'];
                        $buffer['datum']=$noten['datum'];
                        $schueler_noten[]=$buffer;
                    }
                }
            }
            return $schueler_noten;
        }

        /**
         *
         * @param integer $fach_id
         * @param integer $schueler_id
         * @return integer
         *
         * Übergibt die Durchschnittsnote für das gewählte Fach für den
         * angegebenen Schueler.
         */
         
        public function getDurchschnitt($fach_id=0, $schueler_id=0) {
            

            //Mysql-Datensatz aus der Datenbank ins Array notens schreiben
            $this->getAllAsObject();

            $schueler_noten=array();

            foreach($this->notens as $noten) {
                if ($noten['schueler_id']==$schueler_id) {
                    if ($noten['schueler_id']==$schueler_id) {
                        $buffer['schueler_id']=$noten['schueler_id'];
                        $buffer['fach_id']=$noten['fach_id'];
                        $buffer['typ']=$noten['typ'];
                        $buffer['note']=$noten['note'];
                        $buffer['datum']=$noten['datum'];
                        $schueler_noten[]=$buffer;
                    }
                }
            }

            $d_anzahl=0;
            $d_note=0;

            foreach($schueler_noten as $noten) {
                if($noten['fach_id']==$fach_id) {

                    switch ($noten['typ']) {

                        case 'K': {
                                $d_note=$d_note+$noten['note']+$noten['note'];
                                $d_anzahl++;
                                $d_anzahl++;
                                break;
                        }
                        case 'T': {
                                $d_note=$d_note+$noten['note'];
                                $d_anzahl++;
                                break;
                        }
                        case 'H': {
                                $d_note=$d_note+$noten['note'];
                                $d_anzahl++;
                                break;
                        }
                        case 'M': {
                                $d_note=$d_note+$noten['note'];
                                $d_anzahl++;
                                break;
                        }
                        default:  {
                                break;
                        }

                    }
                    
                }
            }
            
            if($d_anzahl>0) {
                $durchschnittsnote = $d_note/$d_anzahl;
            } else {
                $durchschnittsnote = '';
            }

            return $durchschnittsnote;
        }
}		
?>