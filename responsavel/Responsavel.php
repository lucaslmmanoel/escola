<?php

//Importando a conexão 

include_once '../Conexao.php';

class Responsavel{
    // Recebendo os atributos da classe de Responsavel
    protected $id_responsavel;
    protected $nome;
    protected $tel;
    protected $endereco;
    protected $datanasc;
    protected $sexo;
    

    /**
     * Get the value of id_responsavel
     */ 
    public function getId_responsavel()
    {
        return $this->id_responsavel;
    }

    /**
     * Set the value of id_responsavel
     *
     * @return  self
     */ 
    public function setId_responsavel($id_responsavel)
    {
        $this->id_responsavel = $id_responsavel;

        return $this;
    }
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
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }


    /**
     * Get the value of datanasc
     */ 
    public function getDatanasc()
    {
        return $this->datanasc;
    }

    /**
     * Set the value of datanasc
     *
     * @return  self
     */ 
    public function setDatanasc($datanasc)
    {
        $this->datanasc = $datanasc;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

     
      // Metodo para carregar o id
   // Metodo carregar por id
   public function loadID($id_responsavel){
    $conexao = new Conexao();
    $sql = "SELECT * FROM responsavel WHERE id_responsavel=$id_responsavel";
    $dados = $conexao->recuperarDados($sql);
    // Recebendo o id curso na posição do ID 
     $this->id_responsavel = $dados[0]['id_responsavel'];
    // REcebendo o nome do id selecionado
     $this->nome = $dados[0]['nome'];
    $this->tel = $dados[0]['telefone'];
    $this->endereco = $dados[0]['endereco'];
    $this->datanasc = $dados[0]['data_nascimento'];
    
    $this->sexo = $dados[0]['sexo'];
     
    }
 

        
    public function inserir($dados)
    {

        // Captando as variaveis para receber os dados
        $nome = $dados['nome'];
        $tel = $dados['tel'];
        $end = $dados['endereco'];
        $datanasc = $dados['datanasc'];
        $sexo = $dados['sexo'];

        //Realizando a conexão com o banco 
        $conexao = new Conexao();

        // Realizando o insert das variaveis no banco

        $sql = "INSERT INTO responsavel (nome,telefone,endereco,data_nascimento,sexo) values
         ('$nome','$tel','$end','$datanasc','$sexo');";


        return $conexao->executar($sql);
    }
    //Recebendo os dados de Responsável
    public function recuperarDados(){
        $conexao = new Conexao();
        $sql = "select * from responsavel";
        return $conexao->recuperarDados($sql);
    }
        //metodo de exclusão de aluno
           public function excluir($id_responsavel)
           {
               $conexao = new Conexao();
       
               $sql = "DELETE FROM responsavel WHERE id_responsavel = $id_responsavel";
               return $conexao->executar($sql);
           }
      
            public function atualizar($dados)
            {
                // Captando as variaveis para receber os dados
                $id_responsavel = $dados['id_responsavel'];
                $nome = $dados['nome'];
                $tel = $dados['tel'];
                $end = $dados['endereco'];
                $datanasc = $dados['datanasc'];
                $sexo = $dados['sexo'];
                //Realizando a conexão com o banco 
                $conexao = new Conexao();
                // Realizando o insert das variaveis no banco
                $sql = "UPDATE responsavel SET nome = '$nome'
                                               telefone = '$tel'
                                               endereco = '$end'
                                               data_nascimento = '$datanasc'
                                               sexo = '$sexo' 
                                               WHERE id_responsavel = '$id_responsavel';";
        
                return $conexao->executar($sql);
            }
        }