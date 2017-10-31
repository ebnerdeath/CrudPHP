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
            $conn = conecta(); 
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

     public function read() {
        try {
            $conn = conecta(); 
            $operacao = $conn->prepare("SELECT * FROM {$this->tabela};");
            if($operacao->execute()){
                if($operacao->rowCount() > 0){
                    while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
                            $id = $getRow->id;
                            $nome = $getRow->nome;
                            $usuario = $getRow->usuario;
                            $senha = $getRow->senha;
                            $objeto = new Funcionario( $id, $nome, $usuario, $senha );
                            $lista[] = $objeto;
                    }
                    //return $lista;
                    $myArr = [];
                    foreach($lista as $row){
                        $arr = array(
                            'id' => $row->getId(),
                            'nome' => $row->getNome(),
                            'usuario' => $row->getUsuario(),
                            'senha' => $row->getSenha(),
                        );
                        $myArr[] = $arr;
                    }

                    header('Access-Control-Allow-Origin: *');
                    header('Content-Type: application/json');
                    echo json_encode($myArr);
                }    
            }
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }

     public function readFromId( $id ) {
        try {
           $conn = conecta(); 
           $operacao = $conn->prepare("SELECT * from {$this->tabela} WHERE ID= :id");
           $operacao->bindParam(':id',$id);
           $operacao->execute();
           $getRow = $operacao->fetch(PDO::FETCH_OBJ);
           $idBanco = $getRow->id;
           $nome = $getRow->nome;
           $usuario = $getRow->usuario;
           $senha = $getRow->senha;
           $objeto = new Funcionario($idBanco, $nome, $usuario, $senha );
           $objeto->setId($id);
           echo $objeto->getNome();
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
           $conn = conecta(); 
           $operacao = $conn->prepare("UPDATE {$this->tabela} SET nome= :nome, usuario= :usuario, senha= :senha WHERE id= :id");
           $operacao->bindParam(":id", $id);
           $operacao->bindParam(":nome", $nome);
           $operacao->bindParam(":usuario", $usuario);
           $operacao->bindParam(":senha", $senha);
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
          $conn = conecta(); 
          $operacao = $conn->prepare("DELETE FROM {$this->tabela} WHERE id= :id");
          $operacao->bindParam(":id",$id);
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