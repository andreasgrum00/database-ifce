<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $conn->prepare("SELECT nome FROM nubank WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($nome);
            $stmt->fetch();
            echo "Login realizado com sucesso. Bem-vindo, $nome!";
        } else {
            echo "Login falhou. Verifique suas credenciais.";
        }

        $stmt->close();
        echo "Login realizado para: $nomeCompleto";
    } elseif (isset($_POST['registro'])) {

        $nomeCompleto = $_POST['nome_completo'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];

        echo "Registro realizado para: $nomeCompleto";
    } elseif (isset($_POST['continuar'])) {

        $cpf = $_POST['cpf'];

        echo "Formulário da página principal processado para CPF: $cpf";
    }
}
?>
