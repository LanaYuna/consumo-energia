<?php
include '../config/conexao.php';
$usuario= SelecionarusuarioId($_POST["id"]);


?>
<meta charset="UTF-8">
<form name="dadosUsuario" action="../config/conexao.php" method="POST">
    <table border="1">
      
        <tbody>
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" value="<?=$usuario["nome"]?>" size="35" /> </td>
            </tr>
            <tr>
                <td>Função</td>
                <td><input type="text" name="funcao" value="<?=$usuario["funcao"]?>" size="35" /> </td>
            </tr>  
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" value="<?=$usuario["login"]?>" size="35" /> </td>
            </tr>          
            <tr>
                <td>Senha</td>
                <td><input type="password" name="senha" value="" placeholder="Digite nova senha para alterar" size="35" /> </td>
            </tr>              

            <tr>
                <td><input type="hidden" name="acao" value="alterarUsuario" /></td>
                <td><input type="hidden" name="id" value="<?=$usuario["id"]?>" /></td>
               
            </tr>
             <td><input type="submit" value="Enviar" name="enviar" /></td>
        </tbody>
    </table>

</form>