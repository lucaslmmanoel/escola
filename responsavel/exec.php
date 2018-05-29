<?php
/**
 * 
 * Execuçao do CRUD de Responsável
 */

// Executando o processamento dos dados de responsavel
//Incluindo aa classe de responsável
include_once 'Responsavel.php';

// Criando uma instancia de Responsável
$responsavel = new Responsavel();

// Realizando as possibilidades de inserir deletar e atualizar
switch ($_GET['action']){
    //inserindo novo responsavel
    case 'inserir':
    $responsavel->inserir($_POST);
    break;

    case 'excluir':
    //deletando o responsavel
    $responsavel->excluir($_GET['id_responsavel']);
    break;

    // Atualizando o responsavel
    case 'atualizar':
    $responsavel->atualizar($_POST);
    break;
}


header('location: index.php');
