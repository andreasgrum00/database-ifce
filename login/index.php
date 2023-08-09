<?php
$servername = "localhost";
$username = "root";
$password = "senha_incorreta";  // Senha incorreta intencionalmente para demonstrar a vulnerabilidade
$dbname = "meu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Simulação de uma injeção SQL vulnerável
$nome = "'; DROP TABLE usuarios; --";  // Isso poderia causar a exclusão da tabela

$sql = "SELECT id, nome, email FROM usuarios WHERE nome = '$nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Nubank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="get" action="login.php" autocomplete="off" autocapitalize="off">
        <h1>Login</h1>
        <input type="text" placeholder="Nome Completo" required>
        <input type="email" placeholder="E-Mail" required>
        <input type="password" placeholder="Senha" required>
        <input type="number" placeholder="CPF" maxlength="11" required>
        <input type="submit" value="Entrar" style="background-color: #612F74;color: white;">
        <p style="font-size: 14px;">Não tem conta? <a href="../registro/">Faça seu registro</a></p>
    </form>
</body>
</html>