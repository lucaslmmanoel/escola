<?php

/**
 * Esse é o formulario responsável por inserir e atualizar Cursos
 * 
 */

//incluindo o cabeçaho da aplicação
include_once '../cabecalho.php';

// Importando a classe de curso e criando uma nova instancia do memo
include_once 'Responsavel.php';
$responsavel = new Responsavel();

// Realizando um if para decisão de atualização ou inserção
$action = isset($_GET['id_responsavel'])?'atualizar':'inserir';

//  Realizando a condição para poder fazer atualização
if(!empty($_GET['id_responsavel'])){
    $responsavel->loadID($_GET['id_responsavel']);
/** String para apresentar na tela */

    $arg = "Atualizar Responsavel";
    
}
else {
        $arg = "Inserir Responsavel";
        
        }

?>

<!-- dando inicio ao form de responsável -->
<div class="container col-md-6" style="margin-left:25%;">
<form action="exec.php?action=<?=$action?>" method="post" class="form-horizontal">
    <h1 class='text-center'><?=$arg?></h1>

        <!--  Captando o ID-->
        <input type="hidden" value="<?= $responsavel->getId_responsavel();?>" name="id_reponsavel" >
        
        
        <!-- Nome -->
        <div class="form-group ">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <input type="text"  class="form-control" id="nome" name="nome" value="<?= $responsavel->getNome(); ?>" placeholder="Digite Aqui o nome">
  
        </div>
     
        <!--  Captando o  telefone-->
        <div class="form-group">
                <label for="tel" class="col-sm-2 control-label">Telefone</label>
                <input type="text"  class="form-control" id="tel" name="tel" value="<?= $responsavel->getTel(); ?>" placeholder="Digite Aqui o Telefone">
        </div>

        <!-- Endereço -->
        <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Endereço</label>
                <input type="text"  class="form-control" id="endereco" name="endereco" value="<?= $responsavel->getEndereco();?>" placeholder="Digite Aqui o Endereço">
        </div>
        <!-- Data nascimento -->
        <div class="form-group">
                <label for="datanasc" class="col-sm-2 control-label">Nascimento</label>
                <input type="date"  class="form-control" id="datanasc" name="datanasc" value="<?=$responsavel->getDatanasc(); ?>" placeholder="Digite Aqui a Data de nascimento">
        </div>
        <div class="form-inline">
                <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                <label  for="sexom">M</label>
                <input <?= (($responsavel->getSexo())=='M')?'checked':''?> 
                 type="radio" value="M" class='radio' id="sexom" name="sexo" >
                <label  for="sexof">F</label>
                <input <?= (($responsavel->getSexo())=='F')?'checked':''?>
                 type="radio" value="F"  class='radio' id="sexof" name="sexo">
        </div>


    <div class="form-group">
    
        <div class="col-sm-offset-4 col-sm-10">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-danger">Voltar</a>
        </div>
        </div>
</form>


<?php


// Incluindo o termino da aplicação
include_once '../rodape.php';