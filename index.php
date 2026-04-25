<?php include 'conexao.php';
$grupo=listaUsuarios();
//var_dump($grupo);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Dados Formulário </h1>
        <a href="inserir.php">Adicionar Usuário</a><br><br>
        
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Nascimento</th>
                    <th>CEP</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Sexo</th>
                    <th>Unidade Consumidora</th>
                    <th>Webiste</th>
                    <th>Kwh</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($grupo as $usuario) {?>
                    <tr>
                    <td><?=$usuario["nome"]?></td>
                    <td><?=$usuario["email"]?></td>
                    <td><?=$usuario["cpf"]?></td>
                    <td><?=$usuario["nascimento"]?></td>
                    <td><?=$usuario["cep"]?></td>
                    <td><?=$usuario["endereco"]?></td>
                    <td><?=$usuario["bairro"]?></td>
                    <td><?=$usuario["gender"]?></td>
                    <td><?=$usuario["consumidora"]?></td>
                    <td><?=$usuario["website"]?></td>
                    <td><?=$usuario["kwh"]?></td>
                    <td><?=$usuario["valor"]?></td>
                   <th>
                        <form name="alterar" action="alterar.php" method="POST">
                            <input type="hidden" name="id" value=<?=$usuario["id"]?> />
                            <input type="submit" value="Editar" name="editar" />
                            
                            </form>
                        
                    </th>
                    <th>
                        <form name="excluir" action="conexao.php" method="POST">
                            <input type="hidden" name="id" value=<?=$usuario["id"]?> />
                            <input type="hidden" name="acao" value="excluir" />
                            <input type="submit" value="Excluir" name="excluir" />
                            </form>
                    </th>
                </tr>
                <?php }
                ?>
                
            </tbody>
        </table>

        
        
       
    </body>
</html>
