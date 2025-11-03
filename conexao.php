<?php
// Conexão com o banco (contém erro de variável e de conexão)

/* Uma parte de boas praticas que foram perdidas foi a de explicar exatamente oque 
tem nas variaveis de um jeito claro, tipo host ser servername. e mais algo para facilitar
a visão pos criação e para manutenção
*/
$host = "localhost";
$user = "root";
$password = "";
$db = "crud_exemplo";

//erro no comando utilizado pelo menos aonde aprendemos o codigo de melhor uso disponibilizado pelo php é o "new mysqli" 

$conn = new mysqli($host, $user, $password, $db); // Erro: $hot ao invés de $host e "mysqli_connect" inves de "new mysqli"

/* aqui eu não tenho certeza mas não esta totalmente errado porém não esta correto também o 
certo seria utilizar caso tenha realmente um "$conn->connect_error".
*/
if ($conn->connect_error) { //aqui e mais um ajudador do usuario para entender oque teve de erro 
    die("Conexao falhou: " . $conn->connect_error);
}

