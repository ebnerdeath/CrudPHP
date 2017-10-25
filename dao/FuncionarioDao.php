<?php

require_once '../dao/Icrud.php';
require '../util/Connection.php';

class FuncionarioDao implements Icrud{
    private $instanciaConexaoAtiva;
    private $tabela;

    public function __construct() {
        $this->tabela = "funcionarios";
    }

    public function create( $objeto ) {
        $nome = $objeto->getNome();
        $usuario = $objeto->getUsuario();
        $senha = $objeto->getSenha();
        try {
            $conn = new PDO("mysql:host=localhost;dbname=crud", "root","");
            //set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("INSERT INTO funcionarios (nome, usuario, senha) 
            VALUES (:nome, :usuario, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);

            $stmt->execute();
        } catch( PDOException $excecao ) {
              echo $excecao->getMessage();
        }
     }

     public function read( $id ) {
        try {
           $operacao = $this->instanciaConexaoAtiva->prepare("SELECT * from {$this->tabela} WHERE ID=?");
           $operacao->bind_Param(“id”,$id);
           $operacao->execute();
           $getRow = $operacao->fetch(PDO::FETCH_OBJ);
           $nome = $getRow->nome;
           $usuario = $getRow->usuario;
           $senha = $getRow->senha;
           $objeto = new Contato( $nome, $usuario, $senha );
           $objeto->setId($id);
           return $objeto;
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }

     public function update( $objeto ) {
        $id = $objeto->getId();
        $nome = $objeto->getNome();
        $usuario = $objeto->getUsuario();
        $senha = $objeto->getSenha();
        try {
           $operacao = $this->instanciaConexaoAtiva->prepare("UPDATE {$this->tabela} SET nome=?, usuario=?, senha=? WHERE id=?");
           $operacao->bind_Param(“id”, $id);
           $operacao->bind_Param(“nome”, $nome);
           $operacao->bind_Param(“usuario, $email);
           $operacao->bind_Param(“senha, $telefone);
           if($operacao->execute()){
              if($operacao->rowCount() > 0){
                 return true;
              } else {
                 return false;
              }
           } else {
              return false;
           }
        } catch ( PDOException $excecao ) {
           echo $excecao->getMessage();
        }
     }

     public function delete( $id ) {
       try {
          $operacao = $this->instanciaConexaoAtiva->prepare("DELETE FROM {$this->tabela} WHERE id=?");
          $operacao->bind_Param(“id”,$id);
          if($operacao->execute()){
             if($operacao->rowCount() > 0) {
                   return true;
             } else {
                   return false;
             }
          } else {
             return false;
          }
       } catch ( PDOException $excecao ) {
          echo $excecao->getMessage();
       }
    }

    private function getNewIdContato(){
        try {
           $operacao = $this->instanciaConexaoAtiva->prepare("SELECT MAX(id) AS id FROM {$this->tabela}");
           if($operacao->execute()) {
              if($operacao->rowCount() > 0){
                 $getRow = $operacao->fetch(PDO::FETCH_OBJ);
                 $idReturn = (int) $getRow->id + 1;
                 return $idReturn;
              } else {
                 throw new Exception("Ocorreu um problema com o banco de dados");
                 exit();
              }
           } else {
              throw new Exception("Ocorreu um problema com o banco de dados");
              exit();
            }
        } catch (PDOException $excecao) {
           echo $excecao->getMessage();
        }
    }


    public function validaLogin( $usuario, $senha ) {
        try {
            //$conn = new PDO("mysql:host=localhost;dbname=crud", "root","");
            //set the PDO error mode to exception
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn = conecta();
            $stmt = $conn->prepare("SELECT usuario,senha FROM funcionarios WHERE usuario = :usuario AND senha = :senha");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);
           
            if($stmt->execute()){
                if($stmt->rowCount() > 0) {
                    echo'true';
                    return true;
              } else {
                    return false;
              }
            }else{
                return false;
            }
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }







    
}
?>