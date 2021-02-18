<?php

require_once('models/docentes.Model.php');
require_once('models/alumnos.Model.php');
require_once('models/calif.Model.php');
require_once('models/registroSemestral.model.php');
require_once('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

class registroSemestralController{

    private $id;

    public static function getRegistro($id){

        this.$id = $id;

        if(isset($_POST["gSem"])){

            $respuesta = DocenteModel::getDocente($id);

            $data = json_decode($respuesta, true);

            $nombre = $data[$id]["nombre"];

            $grupos = array();

            

            foreach($data[$id]["grupos"] as $key=>$value){

                array_push($grupos, $value);
            }

            $longitudGrupos = sizeof($grupos);



            for($i = 0; $i <= $longitudGrupos; $i++){

                $acreditados = 0;
                $reprobados = 0;

                $reg = new registroSemestralExc();
                $reg->setNombre($nombre);
                $reg->setGrupo($grupos[0][$i]["grupo"]);
                $reg->setPeriodo($grupos[0][$i]["periodo"]);
                $reg->setInicio($grupos[0][$i]["inicio"]);
                $reg->setFin($grupos[0][$i]["fin"]);
                $reg->setDepartamento($grupos[0][$i]["departamento"]);
                $reg->setAsignatura($grupos[0][$i]["asignatura"]);
                $reg->setClave($grupos[0][$i]["clave"]);
                $reg->setTema($grupos[0][$i]["tema"]);

                /** ÁREA DE ALUMNOS */

                $alumnos = AlumnoModel::getAlumno();

                $dataA = json_decode($alumnos, true);

                $dir = $dataA[$reg->getClave()][$reg->getGrupo()]["alumnos"];

                $cAlum = new CalifAlum();
                $cAlum = CalifAlum::genCalif($dir);

                $cAlumS = explode("-", $cAlum);

                $reg->setAcredita($cAlumS[0]);
                $reg->setReprobado($cAlumS[1]);
                $reg->setPacre($cAlumS[2]);
                $reg->setPrepro($cAlumS[3]);
                $reg->setProm($cAlumS[4]);


                /** TERMINA ALUMNOS */

                    $objPHPExcel = new PHPExcel();

                    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                
                    $objPHPExcel = $objReader->load('docs/FJC02.xlsx');
                
                    $objPHPExcel->setActiveSheetIndex(0);
                
                    $objPHPExcel->getActiveSheet()->SetCellValue('C4', $reg->getNombre());
                    $objPHPExcel->getActiveSheet()->SetCellValue('K4', $reg->getGrupo());
                    $objPHPExcel->getActiveSheet()->SetCellValue('C5', $reg->getPeriodo());
                    $objPHPExcel->getActiveSheet()->SetCellValue('K5', $reg->getInicio());
                    $objPHPExcel->getActiveSheet()->SetCellValue('C6', $reg->getDepartamento());
                    $objPHPExcel->getActiveSheet()->SetCellValue('K6', $reg->getFin());
                    $objPHPExcel->getActiveSheet()->SetCellValue('C7', $reg->getAsignatura());
                    $objPHPExcel->getActiveSheet()->SetCellValue('K7', $reg->getClave());
                    $objPHPExcel->getActiveSheet()->SetCellValue('A12', $reg->getTema());
                    $objPHPExcel->getActiveSheet()->SetCellValue('B12', $reg->getAcredita());
                    $objPHPExcel->getActiveSheet()->SetCellValue('E12', $reg->getReprobado());
                    $objPHPExcel->getActiveSheet()->SetCellValue('H12', $reg->getPacre());
                    $objPHPExcel->getActiveSheet()->SetCellValue('J12', $reg->getPrepro());
                    $objPHPExcel->getActiveSheet()->SetCellValue('L12', $reg->getProm());
                    $objPHPExcel->getActiveSheet()->SetCellValue('D40', $reg->getAcredita());
                    $objPHPExcel->getActiveSheet()->SetCellValue('D41', $reg->getReprobado());
                    $objPHPExcel->getActiveSheet()->SetCellValue('E40', $reg->getPacre());
                    $objPHPExcel->getActiveSheet()->SetCellValue('E41', $reg->getPrepro());
                
                    $objWrittet = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

                    mkdir("docs/".$reg->getNombre());
                
                    $objWrittet->save("docs/".$reg->getNombre()."/".$reg->getGrupo().".xlsx"); 
                    
                
            }
            
            echo "<script>
                    Swal.fire(
                        'Archivo(s) generado(s) correctamente!',
                        'Gracias!',
                        'success'
                    ) </script>";

        }

        return $un;

    }


}
