<?php

class Usuario{
    public $codigo, $nome, $login, $senha;
    
    
    //função para armazenar os dados na classe
    function __construct ($codigo, $nome, $login, $senha){
        
        
        #o this é usado para se referenciar a classe, e não as variáveis locais
        $this -> codigo = $codigo;
        $this -> nome = $nome;
        $this -> senha = $senha;
        $this -> login = $login;
        
    }
    
    //função de verificação que será chamada posteriormente
    function validaUsuarioSenha($login, $senha){
        
        if ($login == $this->login && $senha == $this->senha){
            
            return true;
        }
        return false;
       
    }
    
}

?>