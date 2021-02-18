<?php

class registroSemestralExc{

    private $docente;
    private $grupo;
    private $periodo;
    private $inicio;
    private $fin;
    private $departamento;
    private $asignatura;
    private $clave;
    private $tema;
    private $acredita;
    private $reprobado;
    private $pacre;
    private $prepro;
    private $promedio;

    public function getNombre(){

        return $this->docente;
    }

    public function getGrupo(){

        return $this->grupo;
    }

    public function getPeriodo(){

        return $this->periodo;
    }

    public function getInicio(){

        return $this->inicio;
    }

    public function getFin(){

        return $this->fin;
    }

    public function getDepartamento(){

        return $this->departamento;
    }

    public function getAsignatura(){

        return $this->asignatura;
    }

    public function getClave(){

        return $this->clave;
    }

    public function getTema(){

        return $this->tema;
    }

    public function getAcredita(){

        return $this->acredita;
    }

    public function getReprobado(){

        return $this->reprobado;
    }

    public function getPacre(){

        return $this->pacre;
    }

    public function getPrepro(){

        return $this->prepro;
    }

    public function getProm(){

        return $this->promedio;
    }


    public function setNombre($docente){

        $this->docente = $docente;
    }

    public function setGrupo($grupo){

        $this->grupo = $grupo;
    }

    public function setPeriodo($periodo){

        $this->periodo = $periodo;
    }

    public function setInicio($inicio){

        $this->inicio = $inicio;
    }

    public function setFin($fin){

        $this->fin = $fin;
    }

    public function setDepartamento($departamento){

        $this->departamento = $departamento;
    }

    public function setAsignatura($asignatura){

        $this->asignatura = $asignatura;
    }

    public function setClave($clave){

        $this->clave = $clave;
    }

    public function setTema($tema){

        $this->tema = $tema;
    }

    public function setAcredita($acredita){

        $this->acredita = $acredita;
    }

    public function setReprobado($reprobado){

        $this->reprobado = $reprobado;
    }

    public function setPacre($pacre){

        $this->pacre = $pacre;
    }

    public function setPrepro($prepro){

        $this->prepro = $prepro;
    }

    public function setProm($promedio){

        $this->promedio = $promedio;
    }




}
