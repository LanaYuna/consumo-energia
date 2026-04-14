<?php
    if(isset($_POST['submit'])){
        if($_POST['submit'] == 'submit'){
            inserirUsuario();
        }
    }

    function abrirBanco(){
        $conexao= new mysqli("localhost","root","","consumo_energia");
        return $conexao;
    }

    funcion inserirUsuario(){
        $banco=abrirBanco();
        $sql="INSERT INTO usuario(nome, email, cpf, nascimento, cep, endereco, bairro, gender, consumidora, website, kwh, valor)". 
        "VALUES ('{$_POST["nome"]}','{$_POST["email"]}','{$_POST["cpf"]}', '{$_POST["nascimento"]}', '{$_POST["cep"]}', '{$_POST["endereco"]}','{$_POST["bairro"]}', 
        '{$_POST["gender"]}', '{$_POST["consumidora"]}', '{$_POST["website"]}', '{$_POST["kwh"]}', '{$_POST["valor"]}')";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function voltarIndex(){
        header("location:crud-consumo.php");
    }
?>