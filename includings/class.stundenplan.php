<?php
class stundenplan
{

    public function get_BlockT() {

        $blocks = array();
        $B_Time = array();

            $B_Time["von"] = "08:00";     //Erster
            $B_Time["bis"] = "09:30";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "09:45";     //Zweiter
            $B_Time["bis"] = "11:15";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "11:30";     //Dritter
            $B_Time["bis"] = "13:00";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "13:30";     //Vierter
            $B_Time["bis"] = "15:00";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "15:15";     //Fünfter
            $B_Time["bis"] = "16:45";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "17:00";     //Sechster
            $B_Time["bis"] = "18:30";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "18:45";     //Siebenter
            $B_Time["bis"] = "20:15";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

            $B_Time["von"] = "20:30";     //Achter
            $B_Time["bis"] = "22:00";     //Block
            $blocks[] = $B_Time;          //In blocks-array einfügen

        return $blocks;
    }

}

?>