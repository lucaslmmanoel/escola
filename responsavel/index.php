<?php
include_once '../Conexao.php';
$conexao = new Conexao();

$sql = "select * from responsavel";
$responsaveis = $conexao->recuperarDados($sql);

include_once '../cabecalho.php';
?>

    <h1 class="text-center"> Responsaveis <a href="formResponsavel.php"><i class="glyphicon glyphicon-plus"></i></a> </h1>

    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="20%">Ações</td>
            <td>Nome</td>
            <td>Telefone</td>
            <td>Data Nascimento</td>
        </tr>

        <?php foreach ($responsaveis as $responsavel){
            echo "
            <tr>
            <td>    
            <a class='glyphicon glyphicon-trash' href='exec.php?action=excluir&id_responsavel={$responsavel['id_responsavel']}'>Excluir</a>
            <a class='glyphicon glyphicon-pencil' href='formResponsavel.php?id_responsavel={$responsavel['id_responsavel']}'>Atualizar</a>
    </td>

                <td>{$responsavel['nome']}</td>
                <td>{$responsavel['telefone']}</td>
                <td>{$responsavel['data_nascimento']}</td>
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';