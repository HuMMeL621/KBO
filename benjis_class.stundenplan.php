<?php

class stundenplan extends db implements Dmlable {

    private $abgezeichnet_id;
    private $block_id;
    private $datum;
    private $raum_id;
    private $lehrer_id;
    private $vertretung_id;
    private $unterrichtsstunde_id;
    private $klasse_id;
    private $fach_id;
    private $fbl_id;

	public function __construct(){
		try{
			parent::__construct();
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}

    public function getAbgezeichnetId(){
        return $this->abgezeichnet_id;
    }

    public function setAbgezeichnetId($abgezeichnet_id){
        $this->abgezeichnet_id = $abgezeichnet_id;
    }

    public function getBlockId(){
        return $this->block_id;
    }

    public function setBlockId($block_id){
        $this->block_id = $block_id;
    }

    public function getDatum(){
        return $this->datum;
    }

    public function setDatum($datum){
        $this->datum = $datum;
    }

    public function getRaumId(){
        return $this->raum_id;
    }

    public function setRaumId($raum_id){
        $this->raum_id = $raum_id;
    }

    public function getLehrerId(){
        return $this->abgezeichnet_id;
    }

    public function setLehrerId($lehrer_id){
        $this->lehrer_id = $lehrer_id;
    }

    public function getVertretungId(){
        return $this->vertretung_id;
    }

    public function setVertretungId($vertretung_id){
        $this->vertretung_id = $vertretung_id;
    }

    public function getUnterrichtsstundeId(){
        return $this->unterrichtsstunde_id;
    }

    public function setUnterrichtsstundeId($unterrichtsstunde_id){
        $this->unterrichtsstunde_id = $unterrichtsstunde_id;
    }

    public function getKlasseId(){
        return $this->klasse_id;
    }

    public function setKlasseId($klasse_id){
        $this->klasse_id = $klasse_id;
    }

    public function getFachId(){
        return $this->fach_id;
    }

    public function setFachId($fach_id){
        $this->fach_id = $fach_id;
    }

    public function getFblId(){
        return $this->fbl_id;
    }

    public function setFblId($fbl_id){
        $this->fbl_id = $fbl_id;
    }

        /**
         *
         * @return array
         *
         * Ausgabe alles Blockzeiten
         */

        public function get_Blocks() {

            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_id, von, bis
                    FROM zeiten";


                try {
			$result = mysql_query($sql);

			if(!result) {
				throw new MysqlException();
			}

			$klassen = array();
			while ($row = mysql_fetch_assoc($result)){
                             $ausgabe[$data['block_id']] = $data;
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
        }

        public function getAllAsObject($wochenbeginn='') {
        
        //$anwesenheits = Anwesenheit::getAllAsObject();

        

        }


//        /**
//         * Durch die Angabe der Klasse und des Datums,
//         * werden alle Fächer der Klasse dargestellt
//         */
//
//        public function get_Tagesplan($klasse_id=0, $datum = "") {
//
//
//            //sql-Befehl zur ausgabe der Zeiten und des Blocks
//            $sql = "SELECT block_id, datum, klasse_id,
//                    raum_id, lehrer_id, vertretung_id, fach_id, block_nr
//                    FROM unterrichtsstunde
//                    WHERE klasse_id = ".$klasse_id." "."
//                    AND datum = '".$datum."'";
//
//            $result = mysql_query($sql);
//
//            echo $sql;
//
//
//            /*
//             * Fehlerbehandlung falls die Anfrage fehlt schlägt
//             */
//            if(!result) {
//                echo "Die Anfrage ".$sql.
//                       " konnte nicht bearbeitet werden".mysql_error();
//            }
//
//            /*
//             * Datenbank ist leer ;)
//             */
//
//            if(mysql_num_rows($result)==0) {
//                echo "Error: Anfrage wurde nicht durchgeführt,
//                      da keine Zeilen zum ausgeben gefunden wurden";
//            }
//
//            /**
//             * - Wenn alles glatt läuft gehts hier weiter:
//             * - Alle Daten werden in ein Array ($ausgabe) geschrieben
//             * - und mit return zurück gegeben
//             */
//
//
//            while($data = mysql_fetch_assoc($result)) {
//
//                $dummy['datum']=$data['datum'];
//                $dummy['klasse']=db::resolve_Id(klasse, klasse_id, $data['klasse_id']);
//                $dummy['raum']=db::resolve_Id(raume, raum_id, $data['raum_id']);
//                $dummy['lehrer']=db::resolve_Lehrer($data['lehrer_id']);
//                $dummy['fach']=db::resolve_Id(fach, fach_id, $data['fach_id']);
//                $dummy['block_nr']=$data['block_nr'];
//
//                //Vertretung nur Anzeigen falls eine Vertretung gewählt wurde
//                if($data['vertretung_id']!=0) {
//                $dummy['vertretung']=db::resolve_Lehrer($data['vertretung_id']); }
//
//                $ausgabe[] = $dummy;
//
//             }
//
//            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
//                                        //wird das array übergeben
//
//            mysql_free_result($result); //Aufräumen
//            $klabu_db->disconnect();    //Verbindung trennen
//
//        }

        /**
         * Auslesen der Lehrer, des Fachs und des Raums durch
         * angabe von klasse_id, Datum und der Blocknummer
         */

        public function get_LFR($klasse_id=0, $datum = "", $block_nr=0) {


            //Instanz der Klasse db zur Verbindung zur Datenbank
            $klabu_db = new db;


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, datum, klasse_id,
                    raum_id, lehrer_id, vertretung_id, fach_id FROM wochenplan
                    WHERE klasse_id = ".$klasse_id." "."
                    AND datum = '".$datum."' AND block_nr = ".$block_nr;

            $result = mysql_query($sql);

            echo $sql;


            /*
             * Fehlerbehandlung falls die Anfrage fehlt schlägt
             */
            if(!result) {
                echo "Die Anfrage ".$sql.
                       " konnte nicht bearbeitet werden".mysql_error();
            }

            /*
             * Datenbank ist leer ;)
             */

            if(mysql_num_rows($result)==0) {
                echo "Error: Anfrage wurde nicht durchgeführt,
                      da keine Zeilen zum ausgeben gefunden wurden";
            }

            /**
             * - Wenn alles glatt läuft gehts hier weiter:
             * - Alle Daten werden in ein Array ($ausgabe) geschrieben
             * - und mit return zurück gegeben
             */


            while($data = mysql_fetch_assoc($result)) {

                $dummy['block_nr']=$data['block_nr'];
                $dummy['datum']=$data['datum'];
                $dummy['klasse']=$klabu_db->resolve_Id(klasse, klasse_id, $data['klasse_id']);
                $dummy['raum']=$klabu_db->resolve_Id(raume, raum_id, $data['raum_id']);
                $dummy['lehrer']=$klabu_db->resolve_Lehrer($data['lehrer_id']);
                $dummy['fach']=$klabu_db->resolve_Id(fach, fach_id, $data['fach_id']);

                //Vertretung nur Anzeigen falls eine Vertretung gewählt wurde
                if($data['vertretung_id']!=0) {
                $dummy['vertretung']=$klabu_db->resolve_Lehrer($data['vertretung_id']); }

                $ausgabe[] = $dummy;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }

	public function save(){
		if(isset($this->$unterrichtsstunde_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}

	public function insert(){
        $sql = "INSERT INTO unterrichtsstunde
					   (unterrichtsstunde_id,klasse_id,abgezeichnet_id,block_id,datum,raum_id,lehrer_id,vertretung_id,fach_id,fbl_id)
				VALUES ('','','','','".$this->datum."','','','','','');";

		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}

			$insert_id = mysql_insert_id();
			$this->$unterrichtsstunde_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}

	public function update(){
		$sql = "UPDATE unterrichtsstunde
				   SET klasse_id'".$this->klasse_id."',
                       abgezeichnet_id'".$this->abgezeichnet_id."',
                       block_id'".$this->block_id."',
                       datum'".$this->datum."',
                       raum_id'".$this->raum_id."',
                       lehrer_id'".$this->lehrer_id."',
                       vertretung_id'".$this->vertretung_id."',
                       fach_id'".$this->fach_id."',
                       fbl_id'".$this->fbl_id."'
				 WHERE unterrichtsstunde_id".$this->unterrichtsstunde_id.";";

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
		$sql = "DELETE FROM unterrichtsstunde
				WHERE unterrichtsstunde_id=".$id.";";
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
		$sql="SELECT unterrichtsstunde_id
				     ,klasse_id
					 ,abgezeichnet_id
                     ,block_id
                     ,datum
                     ,raum_id
                     ,lehrer_id
                     ,vertretung_id
                     ,fach_id
                     ,fbl_id
				FROM unterrichtsstunde
				WHERE 1=1";
		$sql .=$restriction. ";";

		try {
			$result = mysql_query($sql);

			if(!result) {
				throw new MysqlException();
			}

			$unterrichtsstunden = array();
			while ($row = mysql_fetch_assoc($result)){
				$klassen[$row['unterrichtsstunde_id']]['unterrichtsstunde_id'] = $row['unterrichtsstunde_id'];
				$klassen[$row['unterrichtsstunde_id']]['klasse_id'] = $row['klasse_id'];
				$klassen[$row['unterrichtsstunde_id']]['abgezeichnet_id'] = $row['abgezeichnet_id'];
                $klassen[$row['unterrichtsstunde_id']]['block_id'] = $row['block_id'];
                $klassen[$row['unterrichtsstunde_id']]['datum'] = $row['datum'];
                $klassen[$row['unterrichtsstunde_id']]['raum_id'] = $row['raum_id'];
                $klassen[$row['unterrichtsstunde_id']]['lehrer_id'] = $row['lehrer_id'];
                $klassen[$row['unterrichtsstunde_id']]['vertretung_id'] = $row['vertretung_id'];
                $klassen[$row['unterrichtsstunde_id']]['fach_id'] = $row['fach_id'];
                $klassen[$row['unterrichtsstunde_id']]['fbl_id'] = $row['fbl_id'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}

		return $unterrichtsstunden;
	}
        
	public function load($id){

		$sql="SELECT *
				FROM unterrichtsstunde
			  	WHERE unterrichtsstunde_id=".$id.";";

		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);

			if (empty($row['unterrichtsstunde_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}

			$this->unterrichtsstunde_id=$row['unterrichtsstunde_id'];
			$this->klasse_id=$row['klasse_id'];
            $this->abgezeichnet_id=$row['abgezeichnet_id'];
            $this->block_id=$row['block_id'];
            $this->datum=$row['datum'];
            $this->raum_id=$row['raum_id'];
            $this->lehrer_id=$row['lehrer_id'];
            $this->vertretung_id=$row['vertretung_id'];
            $this->fach_id=$row['fach_id'];
            $this->fbl_id=$row['fbl_id'];


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