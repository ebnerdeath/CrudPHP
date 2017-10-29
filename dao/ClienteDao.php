<?php

require_once '../dao/Icrud.php';
require '../util/Connection.php';

class FuncionarioDao implements Icrud{
    private $conn;
    private $tabela;

    public function __construct() {
        $this->tabela = "clientes";
        $this->conn = conecta();
    }

    public function create($cliente) {
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $rg = $cliente->getRg();
        $datanasc = $cliente->getDataNasc();
        $tipo = $cliente->getTipo();
        $sexo = $cliente->getSexo();
        $cnpj = $cliente->getCnpj();
        $telfix = $cliente->getTelFix();
        $telcel = $cliente->getTelCel();
        $contato = $cliente->getContato();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $endereco = $cliente->getEndereco();
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $cidade = $cliente->getCidade();
        $complemento = $cliente->getComplemento();
        try {
            $stmt = $conn->prepare("INSERT INTO funcionarios (nome, cpf, rg, datanasc, tipo, sexo, cnpj, telfix, telcel,
            contato, email, cep, endereco, numero, uf, cidade, complemento) 
            VALUES (:nome, :cpf, :rg, :datanasc, :tipo, :sexo, :cnpj, :telfix, :telcel, :contato, :email, :cep, :endereco,
            :numero, :uf, :cidade, :complemento)");
            
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':rg', $rg);
            $stmt->bindParam(':datanasc', $datanasc);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':telfix', $telfix);
            $stmt->bindParam(':telcel', $telcel);
            $stmt->bindParam(':contato', $contato);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':complemento', $complemento);

            $stmt->execute();
        } catch( PDOException $excecao ) {
              echo $excecao->getMessage();
        }
     }

     public function read() {
        try {
            $stmt = $conn->prepare("SELECT * FROM {$this->tabela};");
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    while($getRow = $operacao->fetch(PDO::FETCH_OBJ)){
                        $id = $getRow->id;
                        $nome = $getRow->nome;
                        $cpf = $getRow->cpf;
                        $rg = $getRow->rg;
                        $datanasc = $getRow->datanasc;
                        $tipo = $getRow->tipo;
                        $sexo = $getRow->sexo;
                        $cnpj = $getRow->cnpj;
                        $telfix = $getRow->telfix;
                        $telcel = $getRow->telcel;
                        $contato = $getRow->contato;
                        $email = $getRow->email;
                        $cep = $getRow->cep;
                        $endereco = $getRow->endereco;
                        $numero = $getRow->numero;
                        $uf = $getRow->uf;
                        $cidade = $getRow->cidade;
                        $complemento = $getRow->complemento;
                            
                        $cliente = new Funcionario( $id, $nome, $cpf, $rg, $datanasc, $tipo, $sexo, $cnpj, $telfix, $telcel,
                        $contato, $email, $cep, $endereco, $numero, $uf, $cidade, $complemento);

                        $lista[] = $cliente;
                    }
                    return $lista;
                }    
            }
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }

     public function readFromId( $id ) {
        try {
            $operacao = $conn->prepare("SELECT * from {$this->tabela} WHERE ID= :id");
            $operacao->bindParam(':id',$id);
            $operacao->execute();
            $getRow = $operacao->fetch(PDO::FETCH_OBJ);
            $idBanco = $getRow->id;
            $nome = $getRow->nome;
            $cpf = $getRow->cpf;
            $rg = $getRow->rg;
            $datanasc = $getRow->datanasc;
            $tipo = $getRow->tipo;
            $sexo = $getRow->sexo;
            $cnpj = $getRow->cnpj;
            $telfix = $getRow->telfix;
            $telcel = $getRow->telcel;
            $contato = $getRow->contato;
            $email = $getRow->email;
            $cep = $getRow->cep;
            $endereco = $getRow->endereco;
            $numero = $getRow->numero;
            $uf = $getRow->uf;
            $cidade = $getRow->cidade;
            $complemento = $getRow->complemento;

            $objeto = new Funcionario($idBanco, $nome, $usuario, $senha );
            //$objeto->setId($id);

            return $objeto;
        } catch( PDOException $excecao ){
           echo $excecao->getMessage();
        }
     }

     public function update( $objeto ) {
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $rg = $cliente->getRg();
        $datanasc = $cliente->getDataNasc();
        $tipo = $cliente->getTipo();
        $sexo = $cliente->getSexo();
        $cnpj = $cliente->getCnpj();
        $telfix = $cliente->getTelFix();
        $telcel = $cliente->getTelCel();
        $contato = $cliente->getContato();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $endereco = $cliente->getEndereco();
        $numero = $cliente->getNumero();
        $uf = $cliente->getUf();
        $cidade = $cliente->getCidade();
        $complemento = $cliente->getComplemento();

        try {
            $stmt = $conn->prepare("UPDATE {$this->tabela} SET nome= :nome, cpf = :cpf, rg = :rg, datanasc = :datanasc,
            tipo = :tipo, sexo = :sexo, cnpj = :cnpj, telfix = :telfix, telcel = :telcel, contato = :contato, email = :email,
            cep = :cep, endereco = :endereco, numero = :numero, uf = :uf, cidade = :cidade, complemento = :complemento 
            WHERE id= :id");

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':rg', $rg);
            $stmt->bindParam(':datanasc', $datanasc);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':telfix', $telfix);
            $stmt->bindParam(':telcel', $telcel);
            $stmt->bindParam(':contato', $contato);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':endereco', $endereco);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':complemento', $complemento);

            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return true;
                }else {
                    return false;
                }
            }else {
                return false;
           }
        } catch ( PDOException $excecao ) {
           echo $excecao->getMessage();
        }
     }

     public function delete( $id ) {
       try {
          $stmt = $conn->prepare("DELETE FROM {$this->tabela} WHERE id= :id");
          $stmt->bindParam(":id",$id);
          if($stmt->execute()){
             if($stmt->rowCount() > 0) {
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
           $stmt = $conn->prepare("SELECT MAX(id) AS id FROM {$this->tabela}");
           if($stmt->execute()) {
              if($stmt->rowCount() > 0){
                 $getRow = $stmt->fetch(PDO::FETCH_OBJ);
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
}
?>