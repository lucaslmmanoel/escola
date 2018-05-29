<?php 

/**
 * Essa é a classe responsável por abstrair os Cursos 
 * 
*/
// Importando a conexão com o banco
include_once '../Conexao.php';



// Criando a classe
class Curso{

    // Importando os atributos
    protected $id_curso;
    protected $nome;

    // Metodos

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)

    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id_curso
     */ 

     public function getId_curso()

    {
        return $this->id_curso;
    }

    /**
     * Set the value of id_curso
     *
     * @return  self
     */ 
     public function setId_curso($id_curso)
    {
        $this->id_curso = $id_curso;
        return $this;
    }

    // Metodo carregar por id
    public function loadID($id_curso){
        $conexao = new Conexao();
        $sql = "SELECT * FROM curso WHERE id_curso=$id_curso";
        $dados = $conexao->recuperarDados($sql);
        // Recebendo o id curso na posição do ID 
         $this->id_curso = $dados[0]['id_curso'];
        // REcebendo o nome do id selecionado
         $this->nome = $dados[0]['nome'];
        }

        
    // Metodo de inserção
    
    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $conexao = new Conexao();
        $sql = "INSERT INTO curso (nome) values ('$nome');";
        return $conexao->executar($sql);
    }
   

    // metodo de selecionar
    
    public function recuperarDados(){
        $conexao = new Conexao();
        $sql = "select * from curso";
        return $conexao->recuperarDados($sql);
    }
   
    // metodo de deletar
    public function excluir($id_curso)
    {
        $conexao = new Conexao();
        $sql = "DELETE FROM curso WHERE id_curso = $id_curso";
        return $conexao->executar($sql);
    }


    // metodo de atualizar
    public function atualizar($dados){
        //Recebendo os atributos
        $id_curso = $dados['id_curso'];
        $nome = $dados['nome'];
        // Realizando a conexão
        $conexao = new Conexao();
        //Passando o sql 
        $sql = "UPDATE curso SET nome = '$nome' WHERE id_curso = '$id_curso' ";
        return $conexao->executar($sql);
   
    }

}