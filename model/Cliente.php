<?php
class Funcionario{
    private $id;
    private $nome;
    private $cpf;
    private $rg;
    private $datanasc;
    private $tipo;
    private $sexo;
    private $cnpj;
    private $telfix;
    private $telcel;
    private $contato;
    private $email;
    private $cep;
    private $endereco;
    private $numero;
    private $uf;
    private $cidade;
    private $complemento;


    public function __construct($id="", $nome="",$cpf="",$rg="",$datanasc="",$tipo="",$sexo="",$cnpj="",$telfix="",$telcel="",
    $contato="",$email="",$cep="",$endereco="",$numero="",$uf="",$cidade="",$complemento=""){
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->datanasc = $datanasc;
        $this->tipo = $tipo;
        $this->sexo = $sexo;
        $this->cnpj = $cnpj;
        $this->telfix = $telfix;
        $this->telcel = $telcel;
        $this->contato = $contato;
        $this->email = $email;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->uf = $uf;
        $this->cidade = $cidade;
        $this->complemento = $complemento;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getRg(){
        return $this->rg;
    }
    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getDataNasc(){
        return $this->datanasc;
    }

    public function setDataNasc($datanasc){
        $this->datanasc = $datanasc;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getTelFix(){
        return $this->telfix;
    }

    public function setTelFix($telfix){
        $this->telfix = $telfix;
    }

    public function getTelCel(){
        return $this->telcel;
    }

    public function setTelCel($telcel){
        $this->telcel = $telcel;
    }

    public function getContato(){
        return $this->contato;
    }

    public function setContato($contato){
        $this->contato = $contato;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getUf(){
        return $this->uf;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

}    
?>