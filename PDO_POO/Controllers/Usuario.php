<?php

class Usuario 
{
    private $id_usuario;
    private $nome_usuario;
    private $email_usuario;
    private $idade_usuario;
    private $senha_usuario;

    //Getters and Setters
    public function getIdusuario(){
        return $this->id_usuario;
    }

    public function setIdusuario($value){
        $this->id_usuario = $value;
    }

    public function getNomeusuario(){
        return $this->nome_usuario;
    }

    public function setNomeusuario($value){
        $this->nome_usuario = $value;
    }

    public function getEmailusuario(){
        return $this->email_usuario;
    }

    public function setEmailusuario($value){
        $this->email_usuario = $value;
    }

    public function getIdadeusuario(){
        return $this->idade_usuario;
    }

    public function setIdadeusuario($value){
        $this->idade_usuario = $value;
    }

    public function getSenhausuario(){
        return $this->senha_usuario;
    }
    public function setSenhausuario($value){
        $this->senha_usuario = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT*FROM usuarios WHERE id_usuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($results) > 0)
        {
            $row = $results[0];

            $this->setIdusuario($row['id_usuario']);
            $this->setNomeusuario($row['nome_usuario']);
            $this->setEmailusuario($row['email_usuario']);
            $this->setIdadeusuario($row['idade_usuario']);
            $this->setSenhausuario($row['senha_usuario']);
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "id_usuario"=>$this->getIdusuario(),
            "nome_usuario"=>$this->getNomeusuario(),
            "email_usuario"=>$this->getEmailusuario(),
            "idade_usuario"=>$this->getIdadeusuario(),
            "senha_usuario"=>$this->getSenhausuario(),
        ));
    }


}

?>