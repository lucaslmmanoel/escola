<?php

/**
 * Execuçao do CRUD de Aluno
 */
// Executando o processamento dos dados de aluno
include_once 'Aluno.php';
// Criando uma instancia de curso
$aluno = new Aluno();
// Realizando as possibilidades de inserir deletar e atualizar
switch ($_GET['action']){
    //inserindo novo aluno
    case 'inserir':
    $aluno->inserir($_POST);
    break;
    //deletando o aluno
    case 'excluir':
    $aluno->excluir($_GET['id_aluno']);
    break;
    // Atualizando o aluno
    case 'atualizar':
    $aluno->atualizar($_POST);
    break;
}

// Redirecionando para o index de Aluno
header('location: index.php');
