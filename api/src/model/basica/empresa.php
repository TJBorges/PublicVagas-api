<?php

class Empresa implements JsonSerializable {
	private $cd_empresa;
	private $nr_cnpj;
	private $ds_razao_social;
	private $ds_nome_fantasia;
	private $ds_endereco; 
	private $ds_cep; 
	private $ds_area_atuacao;
	private $ds_responsavel_cadastro;
	private $ds_telefone;
	private $ds_email;
	private $ds_site;	
	private $ds_senha;

	function __construct(){
		
	}

	function setCdEmpresa($cd_empresa)
	{
		$this->cd_empresa = trim($cd_empresa);
	}
	function getCdEmpresa()
	{
		return $this->cd_empresa;
	}

	function setNrCnpj($nr_cnpj)
	{
		$this->nr_cnpj = trim($nr_cnpj);
	}
	function getNrCnpj()
	{
		return $this->nr_cnpj;
	}

	function setDsRazaoSocial($ds_razao_social)
	{
		$this->ds_razao_social = trim($ds_razao_social);
	}
	function getDsRazaoSocial()
	{
		return $this->ds_razao_social;
	}

	function setDsNomeFantasia($ds_nome_fantasia)
	{
		$this->ds_nome_fantasia = trim($ds_nome_fantasia);
	}
	function getDsNomeFantasia()
	{
		return $this->ds_nome_fantasia;
	}

	function setDsEndereco($ds_endereco)
	{
		$this->ds_endereco = trim($ds_endereco);
	}
	function getDsEndereco()
	{
		return $this->ds_endereco;
	}

	function setDsCep($ds_cep)
	{
		$this->ds_cep = trim($ds_cep);
	}
	function getDsCep()
	{
		return $this->ds_cep;
	}

	function setDsAreaAtuacao($ds_area_atuacao)
	{
		$this->ds_area_atuacao = trim($ds_area_atuacao);
	}
	function getDsAreaAtuacao()
	{
		return $this->ds_area_atuacao;
	}

	function setDsResponsavelCadastro($ds_responsavel_cadastro)
	{
		$this->ds_responsavel_cadastro = trim($ds_responsavel_cadastro);
	}
	function getDsResponsavelCadastro()
	{
		return $this->ds_responsavel_cadastro;
	}

	function setDsTelefone($ds_telefone)
	{
		$this->ds_telefone = trim($ds_telefone);
	}
	function getDsTelefone()
	{
		return $this->ds_telefone;
	}

	function setDsEmail($ds_email)
	{
		$this->ds_email = trim($ds_email);
	}
	function getDsEmail()
	{
		return $this->ds_email;
	}	

	function setDsSite($ds_site)
	{
		$this->ds_site = trim($ds_site);
	}
	function getDsSite()
	{
		return $this->ds_site;
	}

	function setDsSenha($ds_senha)
	{
		$this->ds_senha = trim($ds_senha);
	}
	function getDsSenha()
	{
		return $this->ds_senha;
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
                'cd_empresa'=>$this->cd_empresa,
                'nr_cnpj'=>$this->nr_cnpj,
                'ds_razao_social'=>$this->ds_razao_social,
                'ds_nome_fantasia'=>$this->ds_nome_fantasia,
				'ds_endereco'=>$this->ds_endereco,
				'ds_cep'=>$this->ds_cep,
				'ds_area_atuacao'=>$this->ds_area_atuacao,
				'ds_responsavel_cadastro'=>$this->ds_responsavel_cadastro,
				'ds_telefone'=>$this->ds_telefone,
				'ds_email'=>$this->ds_email,
                'ds_site'=>$this->ds_site,                                
                'ds_senha'=>$this->ds_senha				
            ];
    }
}
?>