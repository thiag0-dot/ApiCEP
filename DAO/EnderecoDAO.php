<?php 

namespace APICEP\DAO;


class EnderecoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectCidadesByUF($uf)
    {
        $sql = "SELECT * FROM Cidade WHERE uf = ? ORDER BY descricao";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $uf);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
    
    public function selectByCep(int $cep)
    {
        $sql = "SELECT * FROM logradouro WHERE cep = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cep);
        $stmt->execute();

        $endereco_obj = $stmt->fetchObject("APICEP\Model\EnderecoModel");

        $endereco_obj->arr_cidades = $this->selectCidadesByUF($endereco_obj->UF);

        return $endereco_obj;
    }

    public function selectLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_bairro = ? AND id_cidade = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $bairro);
        $stmt->bindValue(2, $id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectBairrosByIdCidade(int $id_cidade)
    {
        $sql = "SELECT descricao_bairro
                FROM logradouro
                WHERE id_cidade = ?
                GROUP BY descricao_bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectCepByLogradouro($logradouro)
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_sem_numero";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute(['q:' => "%" . $logradouro . "%"]);

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
}