<!DOCTYPE HTML>
<html>
<head>
<style>
.error {
    color: #FF0000;
}
</style>
</head>
<body>

<?php

$nomeErr = $funcaoErr = $loginErr = $senhaErr = "";

$nome = $funcao = $login = $senha = "";

    if (empty($_POST["nome"])) {
        $nomeErr = "Nome obrigatório";
    }
    
    if (empty($_POST["funcao"])) {
        $funcaoErr = "Função obrigatória";
    }

    if (empty($_POST["login"])) {
        $loginErr = "Login obrigatório";
    }

    if (empty($_POST["senha"])) {
        $senhaErr = "Senha obrigatória";
    }
?>

<h2>Cadastro de Usuário</h2>


<form name="dadosUsuario" method="POST" action="../config/conexao.php">

    Nome:
    <input type="text" name="nome" value="<?php echo $nome; ?>" required>
    <span class="error">* <?php echo $nomeErr; ?></span>
    <br><br>

    Função:
    <input type="text" name="funcao" value="<?php echo $funcao; ?>" required>
    <span class="error">* <?php echo $funcaoErr; ?></span>
    <br><br>

    Login:
    <input type="text" name="login" value="<?php echo $login; ?>" required>
    <span class="error">* <?php echo $loginErr; ?></span>
    <br><br>

    Senha:
    <input type="password" name="senha" required>
    <span class="error">* <?php echo $senhaErr; ?></span>
    <br><br>

    <td><input type="hidden" name="acao" value="inserirUsuario" /></td>
    <td><input type="submit" name="enviar" value="enviar"></td>

</form>

</body>
</html>