<?php

require_once('../src/model/dados/idaoempresa.php');

class DaoEmpresa implements iDAOEmpresa
{	
	function __construct(){
		
	}
	public function cadastrar(Empresa $emp){
		try{
			$comando = "insert into empresa (nr_cnpj, ds_razao_social, ds_nome_fantasia, ds_endereco, cep, ds_area_atuacao, ds_nome_responsavel, ds_telefone, ds_email,  ds_site, ds_senha) 
							 values (:nr_cnpj, :ds_razao_social, :ds_nome_fantasia, :ds_endereco, :ds_cep, :ds_area_atuacao, :ds_nome_responsavel, :ds_telefone, :ds_email, :ds_site, :ds_senha)";
			$stmt = db::getInstance()->prepare($comando);

			$stmt->bindValue(':nr_cnpj', $emp->getNrCnpj());
			$stmt->bindValue(':ds_razao_social', $emp->getDsRazaoSocial());
			$stmt->bindValue(':ds_nome_fantasia', $emp->getDsNomeFantasia());
			$stmt->bindValue(':ds_endereco', $emp->getDsEndereco());
			$stmt->bindValue(':ds_cep', $emp->getDsCep());
			$stmt->bindValue(':ds_area_atuacao', $emp->getDsAreaAtuacao());
			$stmt->bindValue(':ds_nome_responsavel', $emp->getDsResponsavelCadastro());
			$stmt->bindValue(':ds_telefone', $emp->getDsTelefone());
			$stmt->bindValue(':ds_email', $emp->getDsEmail());
			$stmt->bindValue(':ds_site', $emp->getDsSite());				
			$stmt->bindValue(':ds_senha', $emp->getDsSenha());			
			$run = $stmt->execute();

		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}finally{
			$stmt->closeCursor();
		}
	}
	public function alterar(Empresa $emp){
		try{
			$comando = "update empresa set nr_cnpj = :nr_cnpj, ds_razao_social = :ds_razao_social, ds_nome_fantasia = :ds_nome_fantasia, nr_porte = :nr_porte, ds_nome_responsavel = :ds_nome_responsavel, ds_area_atuacao = :ds_area_atuacao, ds_site = :ds_site, ds_telefone = :ds_telefone, ds_email = :ds_email, ds_senha = :ds_senha where cd_empresa = :cd_empresa";
			$stmt = db::getInstance()->prepare($comando);

			$stmt->bindValue(':nr_cnpj', $emp->getNrCnpj());
			$stmt->bindValue(':ds_razao_social', $emp->getDsRazaoSocial());
			$stmt->bindValue(':ds_nome_fantasia', $emp->getDsNomeFantasia());
			$stmt->bindValue(':ds_endereco', $emp->getDsEndereco());
			$stmt->bindValue(':ds_cep', $emp->getDsCep());
			$stmt->bindValue(':ds_area_atuacao', $emp->getDsAreaAtuacao());
			$stmt->bindValue(':ds_nome_responsavel', $emp->getDsResponsavelCadastro());
			$stmt->bindValue(':ds_telefone', $emp->getDsTelefone());
			$stmt->bindValue(':ds_email', $emp->getDsEmail());
			$stmt->bindValue(':ds_site', $emp->getDsSite());				
			$stmt->bindValue(':ds_senha', $emp->getDsSenha());	
			$stmt->bindValue(':cd_empresa', $emp->getCdEmpresa());
			$run = $stmt->execute();
			
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}finally{
			$stmt->closeCursor();
		}
	}

	
	public function excluir(Empresa $emp){}


	public function pesquisar(Empresa $emp, $alt='false'){
		try{
			$comando = 'select cd_empresa, nr_cnpj, ds_razao_social, ds_nome_fantasia,
								ds_nome_responsavel, ds_area_atuacao, ds_endereco,
								ds_email, ds_site, ds_telefone from empresa ';
			$where = '';
			$orderBy = ' order by ds_nome_fantasia asc ';


			if ($alt){
				if (!empty($emp->getCdEmpresa())){
					if (empty($where)){
						$where = ' where cd_empresa <> :cd_empresa';
					}else{
						$where = $where . ' and cd_empresa <> :cd_empresa';
					}
				}
			}else{
				if (!empty($emp->getCdEmpresa())){
					if (empty($where)){
						$where = ' where cd_empresa = :cd_empresa';
					}else{
						$where = $where . ' and cd_empresa = :cd_empresa';
					}
				}
			}

			if (!empty($emp->getDsSenha())){
				if (empty($where)){
					$where = ' where ds_senha = :senha';
				}else{
					$where = $where . ' and ds_senha = :senha';
				}
			}

			if (!empty($emp->getNrCnpj())){
				if (empty($where)){
					$where = ' where nr_cnpj = :cnpj';
				}else{
					$where = $where . ' and nr_cnpj = :cnpj';
				}
			}

			if (!empty($emp->getDsEmail())){
				if (empty($where)){
					$where = ' where (ds_email = :login or nr_cnpj = :login)';
				}else{
					$where = $where . ' and (ds_email = :login or nr_cnpj = :login)';
				}
			}

			$stmt = db::getInstance()->prepare($comando . $where);
			if (!empty($emp->getCdEmpresa()))
				$stmt->bindValue(':cd_empresa', $emp->getCdEmpresa());
			if (!empty($emp->getDsSenha()))
				$stmt->bindValue(':senha', $emp->getDsSenha());
			if (!empty($emp->getNrCnpj()))
				$stmt->bindValue(':cnpj', $emp->getNrCnpj());
			if (!empty($emp->getDsEmail()))
				$stmt->bindValue(':login', $emp->getDsEmail());

			$run = $stmt->execute();

			return ($stmt->fetchAll(PDO::FETCH_ASSOC));
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}finally{
			$stmt->closeCursor();
		}
	}

	public function pesquisarVagas(Empresa $emp, $filtro){
		try{
			$comando = 'select *
                          from vaga v';
			$where = '';

			if (!empty($emp->getCdEmpresa())){
				if (empty($where)){
					$where = ' where v.cd_empresa = :cd_empresa';
				}else{
					$where = $where . ' and v.cd_empresa = :cd_empresa';
				}
			}			

			$run = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $conversor = new conversorDeObjetos();
            $stmt->closeCursor();
            return $conversor->parseRowsToObjectVaga($result); //$stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}finally{
			$stmt->closeCursor();
		}
	}
}
?>