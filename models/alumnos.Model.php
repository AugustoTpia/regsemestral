<?php

class AlumnoModel{

    public static function getAlumno(){

        $data = file_get_contents("database/alumnos.json");

        return $data;
    }

}