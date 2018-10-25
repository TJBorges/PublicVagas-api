<?php
interface iDAOVaga{

    //Função cadastrar vaga
    public function salvar(Vaga $vaga);

    public function pesquisar(Vaga $vagas, $alt='false' );
}

?>