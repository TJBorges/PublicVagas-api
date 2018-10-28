<?php

class conversorDeObjetos{

    public function parseRowsToObjectVaga($result){
        $cd_vaga = 0;
        $listavagas = [];

        foreach ($result as $row) {

            //Verifica o código da vaga, para não inserir duplicado
            if ($cd_vaga <> $row['cd_vaga']) {

                $vaga = new Vaga();
                $cargo = new Cargo;
                $empresa = new Empresa();
                $vaga->setCdVaga($row['cd_vaga']);
                $vaga->setDsTitulo($row['ds_titulo']);
                $vaga->setTpContratacao($row['tp_contratacao']);
                $vaga->setVlSalario($row['vl_salario']);
                $vaga->setNrQtdVaga($row['nr_qtd_vaga']);
                $vaga->setNrExperiencia($row['nr_experiencia']);
                $vaga->setDsBeneficios($row['ds_beneficios']);
                $vaga->setDsObservacao($row['ds_observacao']);
                
                //Cargo
                $cargo->setCdCargo($row['cd_cargo']);
                $cargo->setDsCargo($row['ds_cargo']);
                $vaga->setCargo($cargo);

                //Empresa
                $empresa->setDsNomeFantasia($row['ds_nome_fantasia']);
                $vaga->setEmpresa($empresa);
                                
                //Adiciona uma vaga na lista de vagas
                array_push($listavagas, $vaga);
                //modifica o atributo com o código da vaga atual
                $cd_vaga=$row['cd_vaga'];
            }
        }
        //Retorna a lista de vagas
        return $listavagas;
    }

}