<?php
include ("conexao.php");
$usuario= SelecionarUsuarioId($_POST["id"]);


?>
<meta charset="UTF-8">
<form name="dadosUsuario" action="conexao.php" method="POST">
    <table border="1">
      
        <tbody>
            <tr>
                <td>Nome </td>
                <td><input type="text" name="nome" value="<?=$usuario["nome"]?>" size="35" /> </td>
            </tr>
            <tr>
                <td>Email </td>
                <td><input type="text" name="email" value="<?=$usuario["email"]?>" size="35" /> </td>
            </tr>  
            <tr>
                <td>CPF</td>
                <td><input type="text" name="cpf" value="<?=$usuario["cpf"]?>" size="35" /> </td>
            </tr>          
            <tr>
                <td>Nascimento</td>
                <td><input type="date" name="nascimento" value="<?=$usuario["nascimento"]?>" /></td>
            </tr>
            <tr>
                <td>CEP</td>
                <td><input type="text" name="cep" value="<?=$usuario["cep"]?>" size="35" /> </td>
            </tr>
            <tr>
                <td>Endereco</td>
                <td><input type="text" name="endereco" value="<?=$usuario["endereco"]?>"size="40" /></td>
                   
            </tr>
            <tr>
                <td>Bairro</td>
                <td><input type="text" name="bairro" value="<?=$usuario["bairro"]?>"size="20"  /></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td><input type="text" name="gender" value="<?=$usuario["gender"]?>"size="12"  /></td>
            </tr>  
            <tr>
                <td>Unidade consumidora</td>
                <td><input type="text" name="consumidora" value="<?=$usuario["consumidora"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Webstite</td>
                <td><input type="text" name="website" value="<?=$usuario["website"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Kwh</td>
                <td><input type="text" name="kwh" value="<?=$usuario["kwh"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="valor" value="<?=$usuario["valor"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="alterar" /></td>
                <td><input type="hidden" name="id" value="<?=$usuario["id"]?>" /></td>
               
            </tr>
             <td><input type="submit" value="Enviar" name="enviar" /></td>
        </tbody>
    </table>

</form>