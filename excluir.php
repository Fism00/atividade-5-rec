<?php
// Exclusão com risco de SQL Injection e sem confirmação
include 'conexao.php';

$id = $_GET["id"]; // essa parte estava certa o que não funcionava era que ele n tinha oque receber

$sql = "DELETE FROM usuarios WHERE id = $id";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.
        <a href='read.php'>Ver registros.</a>
        ";
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();
}

//agora irei realizar a parte da confirmação para poder excluir 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excluir</title>
</head>

<body>

    <form method="POST" action="excluir.php"> <!--Adicionar a ação action para funcionar a parte post ali e funcionar a confirmação-->

        <h2>Você tem certeza que quer excluir esse cadastro?</h2>
        <input type="submit" value="excluir">

    </form>

    <a href="index.php">não</a> <!-- caso ele não queira-->

</body>

</html>