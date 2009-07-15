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
         *
         * @param <integer $klasse_id
         * @param date $datum
         * @param integer $block_id
         * @return array
         *
         * Durch eingabe der klasse_id, des Datums und der block_id,
         * erhält man den Lehrer, das Fach, den Raum und die Vertretung
         */

        public function get_LFR($klasse_id=0, $datum = "", $block_id=0) {

            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_id, datum, klasse_id,
                    raum_id, lehrer_id, vertretung_id, fach_id FROM unterrichtsstunde
                    WHERE klasse_id = ".$klasse_id." "."
                    AND datum = '".$datum."' AND block_id = ".$block_id;

            try {
                    $result = mysql_query($sql);

                    if(!result) {
                            throw new MysqlException();
                    }

                while($data = mysql_fetch_assoc($result)) {
                $dummy['block_id']=$data['block_id'];
                $dummy['datum']=$data['datum'];
                $dummy['klasse']=db::resolve_Id(klasse, klasse_id, $data['klasse_id']);
                $dummy['raum']=db::resolve_Id(raum, raum_id, $data['raum_id']);
                $dummy['lehrer']=db::resolve_Lehrer($data['lehrer_id']);
                $dummy['fach']=db::resolve_Id(fach, fach_id, $data['fach_id']);

                //Vertretung nur Anzeigen falls eine Vertretung gewählt wurde
                if($data['vertretung_id']!=0) {
                $dummy['vertretung']=$klabu_db->resolve_Lehrer($data['vertretung_id']); }

                $ausgabe[] = $dummy;
            
                }

            }

            catch(MysqlException $e){
                Html::showAll($e);
            }

            return $ausgabe;
        }
        

        public function UseForPeriod($von='', $bis='', $plan='') {
            
        }

	public function save(){

        //Not Needed

	}

	public function insert(){

        //Not Needed

	}

	public function update(){

        //Not Needed

	}

	public function delete($id){

        //Not Needed

	}

	public function getAllAsArray($restriction = ''){

        //Not Needed

	}
        
	public function load($id){

        //Not Needed

	}

}

?>