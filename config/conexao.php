<?php
    if(isset($_POST['acao'])){
        if($_POST['acao'] == 'inserirCliente'){
            inserirCliente();
        }

        if ($_POST["acao"] == "alterarCliente") {
            alterarCliente();
        }

        if ($_POST["acao"] == "excluirCliente") {
            excluirCliente();
        }

        if($_POST['acao'] == 'inserirUsuario'){
            if (empty($_POST["nome"]) || empty($_POST["funcao"]) || empty($_POST["login"]) || empty($_POST["senha"])) {
                // Se estiver vazio, volta para o formulário 
                header("Location: ../usuario/inserir.php");
                exit;
            } else {
                inserirUsuario();
            }
        }

        if ($_POST["acao"] == "alterarUsuario") {
            alterarUsuario();
        }

        if ($_POST["acao"] == "excluirUsuario") {
            excluirUsuario();
        }
    }

    function abrirBanco(){
        $conexao= new mysqli("localhost","root","","consumo_energia", 3307);
        return $conexao;
    }

    // CLIENTE

    function inserirCliente(){
        $banco=abrirBanco();
        $sql="INSERT INTO cliente(nome, email, cpf, nascimento, cep, endereco, bairro, sexo, consumidora, website, kwh, valor) 
            VALUES ('{$_POST["nome"]}','{$_POST["email"]}','{$_POST["cpf"]}', '{$_POST["nascimento"]}', '{$_POST["cep"]}', '{$_POST["endereco"]}','{$_POST["bairro"]}', 
            '{$_POST["sexo"]}', '{$_POST["consumidora"]}', '{$_POST["website"]}', '{$_POST["kwh"]}', '{$_POST["valor"]}')";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function excluirCliente() {
        $banco = abrirBanco();
        $sql = "delete from cliente where id='{$_POST["id"]}'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function SelecionarClienteId($id) {
        $banco = abrirBanco();
        $sql = "select * from cliente where id=" . $id;
        $resultado = $banco->query($sql);
        $cliente = mysqli_fetch_assoc($resultado);
        return $cliente;
    }

    function alterarCliente() {
        $banco = abrirBanco();
    
        $sql = "UPDATE cliente SET 
                nome='{$_POST["nome"]}', 
                email='{$_POST["email"]}', 
                cpf='{$_POST["cpf"]}', 
                nascimento='{$_POST["nascimento"]}',
                cep='{$_POST["cep"]}', 
                endereco='{$_POST["endereco"]}', 
                bairro='{$_POST["bairro"]}', 
                sexo='{$_POST["sexo"]}', 
                consumidora='{$_POST["consumidora"]}',
                website='{$_POST["website"]}', 
                kwh='{$_POST["kwh"]}', 
                valor='{$_POST["valor"]}' 
                WHERE id='{$_POST["id"]}'";
                
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

    function listaClientes() {
        $banco = abrirBanco();
        $sql = "select * from cliente order by nome";
        $resultado = $banco->query($sql);

        $grupo = []; // Inicializa o array vazio

        while ($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    // USUARIO

    function inserirUsuario(){
        $banco=abrirBanco();
        $senha = $_POST["senha"];
        $senha_final = md5($senha);

        $sql="INSERT INTO usuario(nome, funcao, login, senha) 
            VALUES ('{$_POST["nome"]}','{$_POST["funcao"]}','{$_POST["login"]}', '$senha_final')";
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
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;
    }

    function alterarUsuario() {
        $banco = abrirBanco();
        $senha = $_POST["senha"];

        if(!empty($senha)){
            $senha_final = md5($senha);
            $sql = "UPDATE usuario SET 
                    nome='{$_POST["nome"]}', 
                    funcao='{$_POST["funcao"]}', 
                    login='{$_POST["login"]}', 
                    senha='{$senha_final}' 
                    WHERE id='{$_POST["id"]}'";
        } else {
            $sql = "UPDATE usuario SET 
                    nome='{$_POST["nome"]}', 
                    funcao='{$_POST["funcao"]}', 
                    login='{$_POST["login"]}' 
                    WHERE id='{$_POST["id"]}'";
        }
        
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
        header("location:../index.php");
    }

?>




