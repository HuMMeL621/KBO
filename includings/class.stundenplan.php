<?php

class stundenplan
{

        /**
         * Methode um die Block-Zeiten aus der Datenbank zu lesen
         * Diese werden als über ein Array zurück gegeben
         */

        public function get_Blocks() {

            //Instanz der Klasse db zur Verbindung zur Datenbank
            $klabu_db = new db;


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, von, bis
                    FROM zeiten";
            $result = mysql_query($sql);


            /*
             * Fehlerbehandlung falls die Anfrage fehlt schlägt
             */
            if(!result) {
                echo "Die Anfrage ".$sql." ".
                     "konnte nicht bearbeitet werden".mysql_error();
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
                
                $ausgabe[$data['block_nr']] = $data;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }


        /**
         * Auslesen der Lehrer, des Fachs und des Raums durch
         * angabe von klasse_id, Datum und der Blocknummer
         */

        public function get_LFR($klasse_id=0, $datum = "", $block_id=0) {


            //Instanz der Klasse db zur Verbindung zur Datenbank
            $klabu_db = new db;


            //sql-Befehl zur ausgabe der Zeiten und des Blocks
            $sql = "SELECT block_nr, datum, klasse_id, 
                    raum_id, lehrer_id, fach_id FROM wochenplan
                    WHERE klasse_id = ".$klasse_id." "."
                    AND datum = '".$datum."' AND block_nr = ".$block_id;
            
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

                $dummy[]=$data['block_nr'];
                $dummy[]=$data['datum'];
                $dummy[]=$klabu_db->resolve_Id(klasse, klasse_id, $data['klasse_id']);
                $dummy[]=$klabu_db->resolve_Id(raume, raum_id, $data['raum_id']);
                $dummy[]=$klabu_db->resolve_Lehrer($data['raum_id']);
                $dummy[]=$klabu_db->resolve_Id(fach, fach_id, $data['fach_id']);
                
                $ausgabe[] = $dummy;

             }

            return $ausgabe;            //Nachdem die While Schleife durchlaufen ist,
                                        //wird das array übergeben

            mysql_free_result($result); //Aufräumen
            $klabu_db->disconnect();    //Verbindung trennen

        }

}

?>