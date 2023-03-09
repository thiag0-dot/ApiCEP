<?php

namespace APICEP\Model;

use APICEP\DAO\EnderecoDAO;
use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descircao, $id_cidade,
           $uf, $complemento, $descricao_sem_numero,
           $descricao_cidade, $codigo_cidade_ibge,
           $descricao_bairro;
}