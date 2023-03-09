<?php

namespace APICEP\Model;

use APICEP\DAO\EnderecoDAO;
use EnderecoDAO as GlobalEnderecoDAO;
use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descircao, $id_cidade,
           $uf, $complemento, $descricao_sem_numero,
           $descricao_cidade, $codigo_cidade_ibge,
           $descricao_bairro;

    public $arr_cidades;

    public function getLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        try
        {
            $dao = new GlobalEnderecoDAO();

            $this->rows = $dao->selectLogradouroByBairroAndCidade($bairro, $id_cidade);

        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
}