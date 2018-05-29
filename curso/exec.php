<?php

/**
 * 
 * Execuçao do CRUD de Curso
 */
// Executando o processamento dos dados de Curso
include_once 'Curso.php';

// Criando uma instancia de curso
$curso = new Curso();

// Realizando as possibilidades de inserir deletar e atualizar
switch ($_GET['action']){
    //inserindo novo curso
    case 'inserir':
    $curso->inserir($_POST);
    break;
    // Atualizando o curso
    case 'atualizar':
    $curso->atualizar($_POST);
    break;
    //deletando o curso
    case 'excluir':
    $curso->excluir($_GET['id_curso']);
    break;
}

//Redirecionando para o index de Curso
header('location: index.php');
