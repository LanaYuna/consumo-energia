<?php
include '../config/conexao.php';
$cliente= SelecionarClienteId($_POST["id"]);


?>
<meta charset="UTF-8">
<form name="dadoscliente" action="../config/conexao.php" method="POST">
    <table border="1">
      
        <tbody>
            <tr>
                <td>Nome </td>
                <td><input type="text" name="nome" value="<?=$cliente["nome"]?>" size="35" /> </td>
            </tr>
            <tr>
                <td>Email </td>
                <td><input type="text" name="email" value="<?=$cliente["email"]?>" size="35" /> </td>
            </tr>  
            <tr>
                <td>CPF</td>
                <td><input type="text" name="cpf" value="<?=$cliente["cpf"]?>" size="35" /> </td>
            </tr>          
            <tr>
                <td>Nascimento</td>
                <td><input type="date" name="nascimento" value="<?=$cliente["nascimento"]?>" /></td>
            </tr>
            <tr>
                <td>CEP</td>
                <td><input type="text" name="cep" value="<?=$cliente["cep"]?>" size="35" /> </td>
            </tr>
            <tr>
                <td>Endereco</td>
                <td><input type="text" name="endereco" value="<?=$cliente["endereco"]?>"size="40" /></td>
                   
            </tr>
            <tr>
                <td>Bairro</td>
                <td><input type="text" name="bairro" value="<?=$cliente["bairro"]?>"size="20"  /></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td><input type="text" name="sexo" value="<?=$cliente["sexo"]?>"size="12"  /></td>
            </tr>  
            <tr>
                <td>Unidade consumidora</td>
                <td><input type="text" name="consumidora" value="<?=$cliente["consumidora"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Webstite</td>
                <td><input type="text" name="website" value="<?=$cliente["website"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Kwh</td>
                <td><input type="text" name="kwh" value="<?=$cliente["kwh"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="valor" value="<?=$cliente["valor"]?>"size="12"  /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="alterarCliente" /></td>
                <td><input type="hidden" name="id" value="<?=$cliente["id"]?>" /></td>
               
            </tr>
             <td><input type="submit" value="Enviar" name="enviar" /></td>
        </tbody>
    </table>

</form>