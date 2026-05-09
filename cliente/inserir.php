<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nomeErr = $emailErr = $sexoErr = $websiteErr = $enderecErr = $cepErr = $nascimento = $consumidora = $kwh = $valor = $cpf = $bairro = "";
$nome = $email =  $sexoErr = $sexo = $website = $cep = $endereco = $nascimErr = $consumErr = $kwhErr = $valorErr = $cpfErr = $bairroErr = "";
    
    if (empty($_POST["nome"])) {
        $nomeErr = "Nome é obrigatório";
    } else {
        $nome = test_input($_POST["nome"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        $nomeErr = "Apenas letras e espaço são permitidos";
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email é obrigatório";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email inválido";
        }
    }

    if(empty($_POST["nascimento"])){
        $nascimErr = "Data de nascimento é obrigatória";
    } else {
        $nascimento = test_input($_POST["nascimento"]);
    } 

    if(empty($_POST["cep"])){
        $cepErr = "CEP deve ser obrigatório";
    } else {
        $cep = test_input($_POST["cep"]);
    }

    if(empty($_POST["endereco"])){
        $enderecErr = "Endereço deve ser obrigatório";
    } else {
        $endereco = test_input($_POST["endereco"]);
    }
    
    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "URL inválida";
        }
    }

    if (empty($_POST["sexo"])) {
        $sexoErr = "Gênero é obrigatório";
    } else {
        $sexo = test_input($_POST["sexo"]);
    }    

    if(empty($_POST["consumidora"])){
        $consumErr = "Unidade consumidora deve ser obrigatória";
    } else {
        $consumidora = test_input($_POST["consumidora"]);
    }

   if(empty($_POST["kwh"])){
        $kwhErr = "Unidade obrigatória";
    } else {
        $kwh = test_input($_POST["kwh"]);
    } 

    if(empty($_POST["valor"])){
        $valorErr = "Unidade obrigatória";
    } else {
        $valor = test_input($_POST["kwh"]);
    } 

    if(empty($_POST["cpf"])){
        $cpfErr = "Unidade obrigatória";
    } else {
        $cpf = test_input($_POST["cpf"]);
    } 

    if(empty($_POST["bairro"])){
        $bairroErr = "Unidade obrigatória";
    } else {
        $bairro = test_input($_POST["bairro"]);
    } 


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<h2>Formulário - Consumo de energia</h2>
<p><span class="error">* required field</span></p>
<form name="dadosCliente" action="../config/conexao.php" method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $nome;?>">
    <span class="error">* <?php echo $nomeErr;?></span>

    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    CPF: <input type="text" name="cpf" value="<?php echo $cpf?>">
    <span class="error">* <?php echo $cpfErr;?></span>
    <br><br>

    Nascimento: <input type="date" name="nascimento" value="<?php echo $nascimento;?>">
    <span class="error">* <?php echo $nascimErr;?></span>

    CEP: <input type="text" name="cep" value="<?php echo $cep;?>">
    <span class="error">* <?php echo $cepErr;?></span>
    <br><br>

    Endereço: <input type="text" name="endereco" value="<?php echo $endereco?>">
    <span class="error">* <?php echo $enderecErr;?></span>
    <br><br>
    
    Bairro: <input type="text" name="bairro" value="<?php echo $bairro?>">
    <span class="error">* <?php echo $bairroErr;?></span>
    <br><br>


    Sexo:
    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="female") echo "checked";?> value="feminino">Feminino
    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="male") echo "checked";?> value="masculino">Masculino
    <input type="radio" name="sexo" <?php if (isset($sexo) && $sexo=="other") echo "checked";?> value="outro">Outro  
    <span class="error">* <?php echo $sexoErr;?></span>
    <br><br>  

    Unidade consumidora: <input type="text" name="consumidora" value="<?php echo $consumidora;?>">
    <span class="error">* <?php echo $consumErr;?></span>

    Website: <input type="text" name="website" value="<?php echo $website;?>">
    <span class="error"><?php echo $websiteErr;?></span>
    <br><br>

    Kwh: <input type="number" name="kwh" value="<?php echo $kwh;?>">
    <span class="error"><?php echo $kwhErr;?></span>
    
    Valor total: <input type="number" name="valor" value="<?php echo $valor;?>">
    <span class="error"><?php echo $valorErr;?></span>
    <br><br>
    <td><input type="hidden" name="acao" value="inserirCliente" /></td>
    <td><input type="submit" name="enviar" value="enviar"></td>
</form>

</body>
</html>


