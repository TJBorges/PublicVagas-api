<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


//Empresa
$app->get('/api/empresas', function(Request $request, Response $response){
    try{
        $rnempresa = new RNEmpresa();
        $empresa = new Empresa();
        $rnempresa = $rnempresa->pesquisar($empresa);
        $response->write(json_encode($rnempresa));
    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

$app->post('/api/empresa/login', function(Request $request, Response $response){
    
    try{ 
        $login = $request->getParam('login');
        $senha = $request->getParam('senha');    

        $rnempresa = new RNEmpresa();        
        $response->write(json_encode($rnempresa->logar($login, $senha)));   

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

$app->post('/api/empresa/salvar', function(Request $request, Response $response){

    try{
        $cnpj = $request->getParam('cnpj');
        $razao_social = $request->getParam('razaosocial');
        $nome_fantasia = $request->getParam('nomefantasia');
        $endereco = $request->getParam('endereco');
        $cep = $request->getParam('cep');
        $area_atuacao = $request->getParam('areaatuacao');
        $responsavel = $request->getParam('responsavel');
        $telefone = $request->getParam('telefone');
        $email = $request->getParam('email');
        $site = $request->getParam('site');
        $senha = $request->getParam('senha'); 
        $codigo = $request->getParam('cd_empresa');
    
        $empresa = new Empresa();
        if ($codigo != null){
            $empresa->setCdEmpresa($codigo);
        }
        $empresa->setNrCnpj($cnpj);
        $empresa->setDsRazaoSocial($razao_social);
        $empresa->setDsNomeFantasia($nome_fantasia);
        $empresa->setDsEndereco($endereco);
        $empresa->setDsCep($cep);
        $empresa->setDsAreaAtuacao($area_atuacao);
        $empresa->setDsResponsavelCadastro($responsavel);   
        $empresa->setDsTelefone($telefone);
        $empresa->setDsEmail($email);
        $empresa->setDsSite($site);
        $empresa->setDsSenha($senha); 

        $rnempresa = new RNEmpresa(); 
        $rnempresa = $rnempresa->salvar($empresa);
        $response->write(json_encode($rnempresa));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

$app->get('/api/empresa/{id}', function(Request $request, Response $response){

    try{
        $id = $request->getAttribute('id');

        $rnempresa = new RNEmpresa();        
        $empresa = new Empresa();
        $empresa->setCdEmpresa($id);
        $rnempresa = $rnempresa->pesquisar($empresa);
        $response->write(json_encode($rnempresa));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

$app->get('/api/empresa/{id}/vagas/{filtro}', function(Request $request, Response $response){

    try{
        $id = $request->getAttribute('id');
        $filtro = $request->getAttribute('filtro');
 
        $rnempresa = new RNEmpresa();
        $empresa = new Empresa();
        $empresa->setCdEmpresa($id);
        $rnempresa = $rnempresa->pesquisarVagas($empresa, $filtro);
        $response->write(json_encode($rnempresa));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});



//Vaga

/**
* Visualizar vagas
*/
$app->get('/api/vagas', function(Request $request, Response $response){
    
    try{
        $vaga = new Vaga();
        $rnvaga = new RNVaga();        
        $rnvaga = $rnvaga->pesquisar($vaga);
        $response->write(json_encode($rnvaga));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

/**
* Visualiza vaga
*/
$app->get('/api/vaga/buscar/{id}', function(Request $request, Response $response){
    
    try{
        $id = $request->getAttribute('id');
        $vaga = new Vaga();
        $vaga->setCdVaga($id);
        $empresa = new Empresa();
        $vaga->setEmpresa($empresa);
        $rnvaga = new RNVaga();        
        $rnvaga = $rnvaga->pesquisar($vaga);
        $response->write(json_encode($rnvaga));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

/**
 * Cadastro da vaga
 */
$app->post('/api/vaga/salvar', function(Request $request, Response $response){

    try{
        $vaga = new Vaga();
    	$cargo = new Cargo();
    	$empresa = new Empresa();

        $vaga->setDsTitulo($request->getParam('ds_titulo'));
        $vaga->setTpContratacao($request->getParam('tp_contratacao'));
        $vaga->setVlSalario($request->getParam('vl_salario'));
        $vaga->setNrQtdVaga($request->getParam('nr_qtd_vaga'));
        $vaga->setNrExperiencia($request->getParam('nr_experiencia'));
        $vaga->setDsBeneficios($request->getParam('ds_beneficios'));
        $vaga->setDsObservacao($request->getParam('ds_observacao'));
        $vaga->setDsSegundaEtapa($request->getParam('ds_segunda_etapa'));

        $cargo->setCdCargo($request->getParam('cd_cargo'));
    	$vaga->setCargo($cargo);
    	$empresa->setCdEmpresa($request->getParam('cd_empresa'));
    	$vaga->setEmpresa($empresa);

        $rnvaga = new RNVaga();  
        $response->write(json_encode($rnvaga->salvar($vaga)));
         
    } catch(PDOException $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

//Cargo

$app->get('/api/cargos', function(Request $request, Response $response){

    try{
        $cargo = new Cargo();
        $rncargo = new RNCargo();        
        $rncargo = $rncargo->pesquisar($cargo);
        $response->write(json_encode($rncargo));

    } catch(Exception $e){
        $response->write(json_encode(array('erro' => $e->getMessage())));
    }
});

?>
