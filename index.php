<?php 

include 'config.php';
include 'autoload.php';
include 'rotas.php';

$cidades = ["jau", "Bariri"];

include 'Controller/Controller.php';

\ApiCep\Controller\Controller::getResponseAsJSON($cidades);