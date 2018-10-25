<?php

require_once('../src/model/dados/idaovaga.php');

class DaoVaga implements iDAOVaga
{
    function __construct(){}

    public function salvar(vaga $vaga){
        try{
            //Comando para inserir a vaga na base de dados
            $sql = "insert into vaga (ds_titulo, tp_contratacao, vl_salario, nr_qtd_vaga, nr_experiencia, ds_beneficios, ds_observacao, ds_segunda_etapa, cd_cargo, cd_empresa)
                         values (:ds_titulo, :tp_contratacao, :vl_salario, :nr_qtd_vaga, :nr_experiencia, :ds_beneficios, :ds_observacao, :ds_segunda_etapa, :cd_cargo, :cd_empresa)";
            $db = db::getInstance();
            $stmt = $db->prepare($sql);
            $run = $stmt->execute(array(
                ':ds_titulo' => $vaga->getDsTitulo(),
                ':tp_contratacao' => $vaga->getTpContratacao(),
                ':vl_salario' => $vaga->getVlSalario(),        
                ':nr_qtd_vaga' => $vaga->getNrQtdVaga(),
                ':nr_experiencia' => $vaga->getNrExperiencia(),
                ':ds_beneficios' => $vaga->getDsBeneficios(),
                ':ds_observacao' => $vaga->getDsObservacao(),
                ':ds_segunda_etapa' => $vaga->getDsSegundaEtapa(),
                ':cd_cargo' => $vaga->getCargo()->getCdCargo(),
                ':cd_empresa' => $vaga->getEmpresa()->getCdEmpresa()
            ));
            //Guardando o id da última insersão para utiliza-lo
            $cdvaga = $db->lastInsertId();    

            $stmt->closeCursor();            

            $stmt = db::getInstance()->prepare($comando);

            $stmt->bindValue(':cd_empresa', $vaga->getEmpresa()->getCdEmpresa());

            $run = $stmt->execute();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }finally{
            $stmt->closeCursor();
        }
    }

    public function pesquisar(Vaga $vaga, $alt='false'){
        try{
            $comando = 'select v.cd_vaga, v.ds_titulo, c.ds_cargo, v.tp_contratacao, v.vl_salario, v.nr_qtd_vaga, v.nr_experiencia, v.ds_beneficios, v.ds_observacao, v.ds_segunda_etapa,                               
                               c.cd_cargo, "" ds_nome_fantasia
                          from vaga v
                    inner join cargo c ON c.cd_cargo = v.cd_cargo ';

            $where = '';

            if (!empty($vaga->getCdVaga())){
                if (empty($where)){
                    $where = ' where v.cd_vaga = :cd_vaga';
                }else{
                    $where = $where . ' and v.cd_vaga = :cd_vaga';
                }
            }

            if (!empty($vaga->getEmpresa()->getCdEmpresa())){
                if (empty($where)){
                    $where = ' where v.cd_empresa = :cd_empresa';
                }else{
                    $where = $where . ' and v.cd_empresa = :cd_empresa';
                }
            }

            $db = new db();
            $stmt = db::getInstance()->prepare($comando . $where);

            if (!empty($vaga->getCdVaga()))
                $stmt->bindValue(':cd_vaga', $vaga->getCdVaga());
            if (!empty($vaga->getEmpresa()->getCdEmpresa()))
                $stmt->bindValue(':cd_empresa', $vaga->getEmpresa()->getCdEmpresa());

            $run = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $conversor = new conversorDeObjetos();
            $stmt->closeCursor();
            return $conversor->parseRowsToObjectVaga($result); //$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }finally{
           
        }
    }
}
?>