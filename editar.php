<?php
// Edição com erro de lógica (não busca o ID corretamente)
include "conexao.php";

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}

$sql = "SELECT * FROM usuario WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();

// somente pequenas correções e colocar nos padrões essa pagina e basicamente um CREATE porém com algumas restrições

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>

<body>

    <form method="POST" action="editar.php?id=<?php echo $row['id'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="index.php">Ver cadastrados.</a>

</body>

</html>