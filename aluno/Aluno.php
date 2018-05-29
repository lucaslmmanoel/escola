<?php
/**
 * 
 *  Essa é a classe responsável por abstrair Alunos
 * 
 */


// Importando a conexão com o banco 
include_once '../Conexao.php';

class Aluno{

        //Captando os atributos das variaveis
        protected $id_aluno;
        protected $matricula;
        protected $nome;
        protected $tel;
        protected $endereco;
        protected $data_nascimento;
        protected $sexo;
        protected $id_responsavel;
        protected $id_curso;
        protected $nota;
// Metodos
        /**
         * Get the value of id_aluno
         */ 
        public function getId_aluno()
        {
                return $this->id_aluno;
        }

        /**
         * Set the value of id_aluno
         *
         * @return  self
         */ 
        public function setId_aluno($id_aluno)
        {
                $this->id_aluno = $id_aluno;

                return $this;
        }

        /**
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

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
                return $this->data_nascimento;
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

        /**
         * Get the value of nota
         */ 
        public function getNota()
        {
                return $this->nota;
        }

        /**
         * Set the value of nota
         *
         * @return  self
         */ 
        public function setNota($nota)
        {
                $this->nota = $nota;

                return $this;
        }
        
        // Metedo de seleção dos dados
        public function recuperarDados()
           {
               $conexao = new Conexao();
       
               $sql = "select * from aluno";
               return $conexao->recuperarDados($sql);
           }
        
        //Metodo de inserção dos dados
        public function inserir($dados)
        {

        //Recebendo os atributos 
            $matricula = $dados['matricula'];
            $nome = $dados['nome'];
            $tel = $dados['tel'];
            $endereco = $dados['endereco'];
            $data_nascimento = $dados['data_nascimento'];
            $sexo = $dados['sexo'];
            $id_responsavel = $dados['id_responsavel'];
            $id_curso = $dados['id_curso'];
            $nota = $dados['nota'];
        
            $conexao = new Conexao();
        
            //Passando o SQL para realizar a inserção

            $sql = "INSERT INTO aluno 
            (matricula,nome,telefone,endereco, data_nascimento, sexo, id_responsavel, id_curso, nota) 
            values ('$matricula',
                        '$nome',
                        '$tel',
                        '$endereco',
                        '$data_nascimento',
                         '$sexo',
                         '$id_responsavel',
                         '$id_curso','
                         $nota');";
           
           return $conexao->executar($sql);
         
        }
        
        //metodo de exclusão de aluno
           public function excluir($id_aluno)
           {
               $conexao = new Conexao();
       
               $sql = "DELETE FROM aluno WHERE id_aluno = $id_aluno";
               return $conexao->executar($sql);
           }
           
        // Metodo de atualizar aluno
        public function atualizar($dados)
        {
        // Recebendo o id
        $id_aluno = $dados['id_aluno'];
        //Recebendo os atributos 
            $matricula = $dados['matricula'];
            $nome = $dados['nome'];
            $tel = $dados['tel'];
            $endereco = $dados['endereco'];
            $data_nascimento = $dados['data_nascimento'];
            $sexo = $dados['sexo'];
            $id_responsavel = $dados['id_responsavel'];
            $id_curso = $dados['id_curso'];
            $nota = $dados['nota'];
        
            $conexao = new Conexao();
        
            //Passando o SQL para realizar a inserção

            $sql = "UPDATE aluno set matricula = '$matricula',
                nome = '$nome',
                telefone = '$tel', 
                endereco='$endereco',
                data_nascimento= '$data_nascimento', 
                sexo= '$sexo',
                id_responsavel= '$id_responsavel',
                id_curso= '$id_curso' ,
                nota='$nota'  
                WHERE id_aluno = '$id_aluno'
                ;";
          
           return $conexao->executar($sql);
         
        }

        // Metodo de carregar os dados pelo id   
        public function loadID($id_aluno){
               
                $conexao = new Conexao();
                $sql = "SELECT * FROM aluno WHERE id_aluno = '$id_aluno'";
                $dados = $conexao->recuperarDados($sql);
                //Recebendo os atributos 
             
                $this->id_aluno = $dados[0]['id_aluno'];
                $this->matricula = $dados[0]['matricula'];
                $this->nome = $dados[0]['nome'];
                $this->tel = $dados[0]['telefone'];
                $this->endereco = $dados[0]['endereco'];
                $this->data_nascimento = $dados[0]['data_nascimento'];
                $this->sexo = $dados[0]['sexo'];
                $this->id_responsavel = $dados[0]['id_responsavel'];
                $this->id_curso = $dados[0]['id_curso'];
                $this->nota = $dados[0]['nota'];
        
        }
}                  
        