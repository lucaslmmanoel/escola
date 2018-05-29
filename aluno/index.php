<?php

// Incluindo nossa classe de alunos
include_once 'Aluno.php';

// instanciando um novo aluno 
$aluno = new Aluno();

//executando o select de alunos 
$alunos = $aluno->recuperarDados($sql);

//incluindo o cabeçalho da aplicação
include_once '../cabecalho.php';

?>

    <h1 class="text-center" style='margin-top:1px;'>Alunos <a href="formAluno.php"><i class="glyphicon glyphicon-plus"></i></a></h1>

    <table class="table table-bordered table-hover table-striped table-condensed">

        <tr>

            <td width="20%">Ações</td>
            <td>Matricula</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Nota</td>

        </tr>

        <?php foreach ($alunos as $aluno) {
            echo "
            <tr>
            <td>    
                    <a class='glyphicon glyphicon-trash' href='exec.php?action=excluir&id_aluno={$aluno['id_aluno']}'>Excluir</a>
                    <a class='glyphicon glyphicon-pencil' href='formAluno.php?id_aluno={$aluno['id_aluno']}'>Atualizar</a>
            </td>

                <td>{$aluno['matricula']}</td>
                <td>{$aluno['nome']}</td>
                <td>{$aluno['telefone']}</td>
                <td>{$aluno['nota']}</td>
            </tr>
        ";
        } ?>

    </table>

<?php

// Incluindo o termino da aplicação
include_once '../rodape.php';