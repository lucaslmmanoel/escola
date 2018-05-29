<?php

/**
 * Esse é o formulario responsável por inserir e atualizar Cursos
 * 
 */

//incluindo o cabeçaho da aplicação
include_once '../cabecalho.php';

// Importando a classe de curso e criando uma nova instancia do memo
include_once 'Curso.php';
$curso = new Curso();

// Realizando um if para decisão de atualização ou inserção
$action = isset($_GET['id_curso'])?'atualizar':'inserir';

//  Realizando a condição para poder fazer atualização
if(!empty($_GET['id_curso'])){
    $curso->loadID($_GET['id_curso']);
}


/** String para apresentar na tela */
$arg = "";

if (!empty($_GET['id_curso'])) {
$arg = "Atualizar curso";
} else {
$arg = "Inserir Curso";

}
?>

<!-- Criando um formulario para inserção e atualização de curso -->

<form action="exec.php?action=<?=$action?>" method="post" class="form-horizontal">
<h1 class='text-center'><?=$arg?></h1>
   

    <input type="hidden" value="<?= $curso->getId_curso();?>" name="id_curso" >
    
    <div class="form-group">
        <label for="nome" class="col-sm-4 control-label">Nome</label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" id="nome" name="nome" placeholder="Digite Aqui o nome do Curso" value="<?= $curso->getNome(); ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-10">
            <button type="submit"  href class="btn btn-success">Salvar</button>
            <a href="index.php" class="btn btn-danger">Voltar</a>
        </div>
    </div>
</form>
<?php
// Incluindo o rodapé da aplicação
include_once '../rodape.php';

