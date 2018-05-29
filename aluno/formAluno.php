<?php

/**
 * Esse é o formulario responsável por inserir e atualizar alunos
 *
 */

// incluindo o cabeçalho
include_once '../cabecalho.php';

// Importando a classe de aluno
include_once 'Aluno.php';
$aluno = new Aluno();

//Decidindo se o aluno sera inserido ou atualizado
$action = isset($_GET['id_aluno']) ? 'atualizar' : 'inserir';

//Carregando os dados de aluno caso o id ja exista
if (!empty($_GET['id_aluno'])) {
    $aluno->loadID($_GET['id_aluno']);
/** String para apresentar na tela */

    $arg = "Atualizar Aluno";
    
}
 else {
$arg = "Inserir Aluno";

}

// incluindo a classe de curso para as opções
include_once '../curso/Curso.php';
$curso = new Curso();

//Recuperando os dados de curso
$cursos = $curso->recuperarDados();

//incluindo a classe de curso para as opções
include_once '../responsavel/Responsavel.php';

// incluindo um novo responsável
$responsavel = new Responsavel();

//Recuperando os dados de responsavel
$responsaveis = $responsavel->recuperarDados();



?>

<div class="row">
<form action="exec.php?action=<?=$action?>" method="post" class="form-horizontal">
<h1 class='text-center'><?=$arg?></h1>
    <div class="container">
    <div class="col-md-6">
        <!-- Captando o id do aluno -->
        <input type="hidden" value="<?= $aluno->getId_aluno();?>" id="id_aluno" name="id_aluno" >

        <!-- Matricula -->
        <div class="form-group ">
                <label for="matricula" class="col-sm-2 control-label">Matricula</label>
                <input type="text" value="<?=$aluno->getMatricula();?>"  class="form-control" id="matricula" name="matricula" placeholder="Digite Aqui a matricula">
        </div>

        <!-- Nome -->
        <div class="form-group ">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <input type="text" value="<?=$aluno->getNome();?>"  class="form-control" id="nome" name="nome" placeholder="Digite Aqui o nome">
        </div>

        <!--  Captando o  telefone-->
        <div class="form-group">
                <label for="tel" class="col-sm-2 control-label">Telefone</label>
                <input type="text" value="<?=$aluno->getTel();?>"  class="form-control" id="tel" name="tel" placeholder="Digite Aqui o Telefone">
        </div>

        <!--  Captando o endereço -->
        <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Endereco</label>
                <input type="text" value="<?=$aluno->getEndereco();?>"  class="form-control" id="endereco" name="endereco" placeholder="Digite Aqui o Endereco">
        </div>
        <!--  Captando a data de nascimento -->
        <div class="form-group">
                <label for="data_nascimento" class="col-sm-2 control-label">Nascimento</label>
                <input type="date" value="<?=$aluno->getDatanasc();?>"  class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Digite Aqui a data de nascimento">
        </div>

      </div>

        <!-- fechando a primeira coluna  -->

        <!-- Segunda coluna -->

        <div class="col-md-6 col-md-4" style="margin-left:8%; ">


        <!-- Sexo -->
        <div class="form-inline" style="padding-top:8px;">

                <label for="sexo" class="control-label">Sexo </label>
                <label style="margin-left:1%;"for="sexom">M</label>
                <input type="radio" value="M" <?= (($aluno->getSexo())=='M')?'Checked':''?> required  class="radio" id="sexom" name="sexo" >
                <label for="sexof">F</label>
                <input type="radio" value="F" <?= (($aluno->getSexo())=='F')?'Checked':'' ?> required  class="radio" id="sexof" name="sexo" >

        </div>


        <!-- Responsável -->
        
        <div class="form-group" style="padding-top:12px;">
                <label for="responsavel" class="col-sm-2 control-label">Responsavel</label>
                        <select class='form-control' value="<?=$responsavel->getNome();?>" name="id_responsavel" id="responsavel">
<option value=""></option>
<?php
// realizando a busca dos dados de Curso para insert e update
// Criando um curso e recuperando os dados
$responsavel = new Responsavel();
$responsaveis = $responsavel->recuperarDados();
foreach ($responsaveis as $responsavel) {
        echo  "
        <option value='{$responsavel[id_responsavel]}'".(($aluno->getId_responsavel() == $responsavel['id_responsavel']) ? 'selected' : '').">
        {$responsavel[id_responsavel]} - {$responsavel['nome']}</option>";
}


?>
                        </select>
        </div>

        <!-- Curso -->
        <div class="form-group" style="padding-top:12px;">
                <label for="curso" class="col-sm-2 control-label">Curso</label>
                <select class='form-control'  name="id_curso" id="curso">

                        <option value="">Selecione</option>
<?php
// realizando a busca dos dados de Curso para insert e update
// Criando um curso e recuperando os dados
$curso = new Curso();
$cursos = $curso->recuperarDados();
foreach ($cursos as $curso) {
        echo  "
        <option value='{$curso[id_curso]}'".(($aluno->getId_curso() == $curso['id_curso']) ? 'selected' : '').">
        {$curso[id_curso]} - {$curso['nome']}</option>";
}


?>
                </select>
        </div>

        <!-- Nota -->
        <div class="form-group">
                <label for="nota" class="col-sm-2 control-label">Nota</label>
                <input value="<?= $aluno->getNota();?>"type="number"  class="form-control" id="nota" name="nota">
        </div>

        <!-- Enviando os dados para o banco e possibilatando a saida -->

        <div class="col-sm-offset-4 col-sm-10"  style="padding-top:14px;">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-danger">Voltar</a>
        </div>

                        </div>
                </div>
        </div>
        <!-- /Segunda coluna -->

</form>

</div>

<?php
//Incluindo o termino da aplicação
include_once '../rodape.php';