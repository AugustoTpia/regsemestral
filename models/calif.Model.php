<?php

class CalifAlum{

    public static function genCalif($dt){

        $datAlumno = array();

        foreach($dt as $key2=>$value2){

            array_push($datAlumno, $value2);
        }

        $califA1 = sizeof($datAlumno[0]);

        $un = sizeof($datAlumno[0]);

        $promC = 0;

        for($j = 1; $j <= $califA1; $j++){

            $promC = $promC + $datAlumno[0][$j]["calificacion"];

            if($datAlumno[0][$j]["calificacion"] > 5){
                $acreditados = $acreditados + 1;
            }else{
                $reprobados = $reprobados + 1;
            }
        }

        $pApro = ($acreditados * 100)/$un;
        $pRepro = ($reprobados * 100)/$un; 
        $pCalif = $promC/$un;
        
        return $acreditados."-".$reprobados."-".$pApro."-".$pRepro."-".$pCalif;


    }


}