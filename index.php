<?php include 'config/conexao.php';
$grupoCliente=listaclientes();
$grupoUsuario=listausuarios();
//var_dump($grupo);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Dados Formulário </h1>
        <a href="cliente/inserir.php">Adicionar Cliente</a><br><br>
        <a href="usuario/inserir.php">Adicionar Usuário</a><br><br>

        <h2>Dados dos clientes</h2>
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
                foreach ($grupoCliente as $cliente) {?>
                    <tr>
                    <td><?=$cliente["nome"]?></td>
                    <td><?=$cliente["email"]?></td>
                    <td><?=$cliente["cpf"]?></td>
                    <td><?=$cliente["nascimento"]?></td>
                    <td><?=$cliente["cep"]?></td>
                    <td><?=$cliente["endereco"]?></td>
                    <td><?=$cliente["bairro"]?></td>
                    <td><?=$cliente["sexo"]?></td>
                    <td><?=$cliente["consumidora"]?></td>
                    <td><?=$cliente["website"]?></td>
                    <td><?=$cliente["kwh"]?></td>
                    <td><?=$cliente["valor"]?></td>
                   <th>
                        <form name="alterar" action="cliente/alterar.php" method="POST">
                            <input type="hidden" name="id" value=<?=$cliente["id"]?> />
                            <input type="submit" value="Editar" name="editar" />
                        </form>
                        
                    </th>
                    <th>
                        <form name="excluir" action="config/conexao.php" method="POST">
                            <input type="hidden" name="id" value=<?=$cliente["id"]?> />
                            <input type="hidden" name="acao" value="excluirCliente" />
                            <input type="submit" value="Excluir" name="excluir" />
                        </form>
                    </th>
                </tr>
                <?php }
                ?>
                
            </tbody>
        </table>

        <h2>Dados dos usuários</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($grupoUsuario as $usuario) {?>
                    <tr>
                    <td><?=$usuario["nome"]?></td>
                    <td><?=$usuario["funcao"]?></td>
                    <td><?=$usuario["login"]?></td>
                    <td><?=$usuario["senha"]?></td>
                   <th>
                        <form name="alterar" action="usuario/alterar.php" method="POST">
                            <input type="hidden" name="id" value=<?=$usuario["id"]?> />
                            <input type="submit" value="Editar" name="editar" />
                        </form>
                        
                    </th>
                    <th>
                        <form name="excluir" action="config/conexao.php" method="POST">
                            <input type="hidden" name="id" value=<?=$usuario["id"]?> />
                            <input type="hidden" name="acao" value="excluirUsuario" />
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
