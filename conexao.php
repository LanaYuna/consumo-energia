<?php
    if(isset($_POST['acao'])){
        if($_POST['acao'] == 'inserir'){
            inserirUsuario();
        }

        if ($_POST["acao"] == "alterar") {
            alterarUsuario();
        }

        if ($_POST["acao"] == "excluir") {
            excluirUsuario();
        }
    }

    function abrirBanco(){
        $conexao= new mysqli("localhost","root","","consumo_energia", 3307);
        return $conexao;
    }

    function inserirUsuario(){
        $banco=abrirBanco();
        $sql="INSERT INTO usuario(nome, email, cpf, nascimento, cep, endereco, bairro, gender, consumidora, website, kwh, valor) 
            VALUES ('{$_POST["nome"]}','{$_POST["email"]}','{$_POST["cpf"]}', '{$_POST["nascimento"]}', '{$_POST["cep"]}', '{$_POST["endereco"]}','{$_POST["bairro"]}', 
            '{$_POST["gender"]}', '{$_POST["consumidora"]}', '{$_POST["website"]}', '{$_POST["kwh"]}', '{$_POST["valor"]}')";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirUsuario() {
        $banco = abrirBanco();
        $sql = "delete from usuario where id='{$_POST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function SelecionarUsuarioId($id) {
        $banco = abrirBanco();
        $sql = "select * from usuario where id=" . $id;
        $resultado = $banco->query($sql);
        $cliente = mysqli_fetch_assoc($resultado);
        return $cliente;
    }

    function alterarUsuario() {
        $banco = abrirBanco();
    
        $sql = "UPDATE usuario SET 
                nome='{$_POST["nome"]}', 
                email='{$_POST["email"]}', 
                cpf='{$_POST["cpf"]}', 
                nascimento='{$_POST["nascimento"]}',
                cep='{$_POST["cep"]}', 
                endereco='{$_POST["endereco"]}', 
                bairro='{$_POST["bairro"]}', 
                gender='{$_POST["gender"]}', 
                consumidora='{$_POST["consumidora"]}',
                website='{$_POST["website"]}', 
                kwh='{$_POST["kwh"]}', 
                valor='{$_POST["valor"]}' 
                WHERE id='{$_POST["id"]}'";
                
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function listaUsuarios() {
        $banco = abrirBanco();
        $sql = "select * from usuario order by nome";
        $resultado = $banco->query($sql);

        $grupo = []; // Inicializa o array vazio

        while ($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function voltarIndex(){
        header("location:index.php");
    }

?>




