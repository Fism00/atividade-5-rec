<?php
// Listagem com erro de lógica (ordem incorreta e falta de conexão)
include 'conexao.php';

$sql = "SELECT * FROM usuario"; // Erro de SQL: FORM ao invés de FROM

$result = $conn->query($sql); // somente padronização do codigo e garantir que funcione perfeitamente utilizando os termos corretos

/* agora irei arrumar algumas coisas além de mostrar de um jeito mais limpo e bonito
irei arrumar para que caso não tenha cadastrados mostrar uma mensagem que não tem*/

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> Nome </th>
            <th> Email </th>
        </tr>
         ";

echo "<h1>Lista de Usuários</h1>";

    while ($row = $result->fetch_assoc()) { // mudança para acertar as padronizações e funcionar perfeitamente e fazer o bagulho certo para conseguir o ID no redirecionador

        echo "<tr>
                <td> {$row['name']} </td>
                <td> {$row['email']} </td>
                <td> 
                    <a href='editar.php?id={$row['id']}'>Editar<a> 
                    <a href='excluir.php?id={$row['id']}'>Excluir<a>
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum cadastro encontrado.";
}

$conn -> close();

echo "<a href='create.php'>Inserir novo cadastro</a>";