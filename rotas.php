<?php 

use ApiCep\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
    break;

    case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
    break;

}