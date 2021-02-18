<?php

    require_once("controllers/registroSemestral.Controller.php");

    $route = $_SERVER['REQUEST_URI'];
    $selId = explode("/", $route);
    $id = $selId[4];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
    <div class="container" style="margin-top: 7%">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../">Listado</a></li>
            <li class="breadcrumb-item active" aria-current="page">Documentos</li>
        </ol>
    </nav>
        <div class="card">
            <div class="card-header">
                Generación de Archivos de Excel
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Registro Semestral</h5>
                        <p class="card-text">Se generará 1 por cada matería impartida</p>
                        <form method="post">
                            <button type="submit" class="btn btn-success" name="gSem">Generar</button>
                            <?php
                                $newDoc = new registroSemestralController();
                                
                                $data = $newDoc->getRegistro($id);

                                echo $data;
                                
                            ?>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Instrumentación Didáctica</h5>
                        <p class="card-text">Se generará 1 por cada curso que se imparte</p>
                        <a href="#" class="btn btn-success">Generar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>