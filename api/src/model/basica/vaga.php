<?php
class Vaga implements JsonSerializable {

    private $cd_vaga;
    private $ds_titulo;     
    private $tp_contratacao;
    private $vl_salario;
    private $nr_qtd_vaga;
    private $nr_experiencia;
    private $ds_beneficios;
    private $ds_observacao;
    private $ds_segunda_etapa;

    private $cargo;
    private $empresa;    

    function __construct(){}

    function setCdVaga($cd_vaga)
    {
        $this->cd_vaga = trim($cd_vaga);
    }
    function getCdVaga()
    {
        return $this->cd_vaga;
    }

    function setDsTitulo($ds_titulo)
    {
        $this->ds_titulo = $ds_titulo;
    }
    function getDsTitulo()
    {
        return $this->ds_titulo;
    }

    function setTpContratacao($tp_contratacao)
    {
        $this->tp_contratacao = $tp_contratacao;
    }
    function getTpContratacao()
    {
        return $this->tp_contratacao;
    }

    function setVlSalario($vl_salario)
    {
        $this->vl_salario = trim($vl_salario);
    }
    function getVlSalario()
    {
        return $this->vl_salario;
    }

    function setNrQtdVaga($nr_qtd_vaga)
    {
        $this->nr_qtd_vaga = trim($nr_qtd_vaga);
    }
    function getNrQtdVaga()
    {
        return $this->nr_qtd_vaga;
    }

    function setNrExperiencia($nr_experiencia)
    {
        $this->nr_experiencia = $nr_experiencia;
    }
    function getNrExperiencia()
    {
        return $this->nr_experiencia;
    }

    function setDsBeneficios($ds_beneficios)
    {
        $this->ds_beneficios = $ds_beneficios;
    }
    function getDsBeneficios()
    {
        return $this->ds_beneficios;
    }   

    function setDsObservacao($ds_observacao)
    {
        $this->ds_observacao = $ds_observacao;
    }
    function getDsObservacao()
    {
        return $this->ds_observacao;
    }

    function setDsSegundaEtapa($ds_segunda_etapa)
    {
        $this->ds_segunda_etapa = trim($ds_segunda_etapa);
    }
    function getDsSegundaEtapa()
    {
        return $this->ds_segunda_etapa;
    }

    function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    function getCargo()
    {
        return $this->cargo;
    }

    function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return
            [
                'cd_vaga'=>$this->cd_vaga,
                'ds_titulo'=>$this->ds_titulo,
                'tp_contratacao'=>$this->tp_contratacao,
                'vl_salario'=>$this->vl_salario,
                'nr_qtd_vaga'=>$this->nr_qtd_vaga,
                'nr_experiencia'=>$this->nr_experiencia,
                'ds_beneficios'=>$this->ds_beneficios,
                'ds_observacao'=>$this->ds_observacao,
                'ds_segunda_etapa'=>$this->ds_segunda_etapa,
                'cargo'=>$this->cargo,
                'empresa'=>$this->empresa
                
            ];
    }
}

 ?>
