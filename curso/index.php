<?php

//incluindo o arquivo da classe curso
include_once 'Curso.php';
// Criando uma classe de curso
$curso = new Curso();

// ar abreviação de Array
$arCursos = $curso->recuperarDados();

include_once '../cabecalho.php';

?>
    <h1 class="text-center"> Cursos <a href="formCurso.php"><i class="glyphicon glyphicon-plus"></i></a> </h1>

    <table class="table table-bordered table-hover table-striped table-condensed">

        <tr>
            <td width="20%">Ações</td>
            <td>Nome</td>
        </tr>
        <?php foreach ($arCursos as $curso){
            echo "
            <tr>
            <td>
            <a class='glyphicon glyphicon-trash' href='exec.php?action=excluir&id_curso={$curso['id_curso']}'>Excluir</a>
            <a class='glyphicon glyphicon-pencil' href='formCurso.php?id_curso={$curso['id_curso']}'>Atualizar</a>
            </td>
                <td>{$curso['nome']}</td>
            </tr>
            ";
        } ?>

    </table>

<?php
// incluindo o rodapé da aplicação
include_once '../rodape.php';