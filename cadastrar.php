<?php
// Cadastro com erros de sintaxe e falta de validação
include 'conexao.php'; // pequena correção de sintax tirando o desnecessario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];//falta de ponto e virgula

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

/*nessa parte como uma questão para certeza que funcionar completamente e deixar o codigo mais
limpo iremos utilizar o verificador da query no proprio if e na tela caso tenha erro mostre
oque tenha acontecido.*/
    
    if ($conn->query($sql) === true) {
        echo "Usuário cadastrado com sucesso!";
    }else{ // teve a falta do fechamento de chaves
        echo "Erro " . $sql . '<br>' . $conn->error;
    }

    $conn->close();

}// fechando o IF la do começo 
?>

<!-- aqui irei mais normalizar o html e corrigir a parte dos labels que esta errado e muito feio -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>

    <form method="POST" action="cadastrar.php"> <!--Adicionar a ação action para funcionar a parte post ali-->

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="cadastrar">

    </form>

    <a href="index.php">Ver registros.</a> <!-- não sei se era necessario mas adicionei um rediracionador para conseguir mover pelo proprio sistema-->

</body>

</html>