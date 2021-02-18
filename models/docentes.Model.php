<?php

class DocenteModel{

    public static function getDocente($id){

        $data = file_get_contents("database/docentes.json");

        return $data;
    }

}