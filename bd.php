<?php
// Captura os dados enviados pelo formulário
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Verifica se ambos os campos estão preenchidos
if (!empty($email) && !empty($password)) {
    // Caminho do arquivo JSON
    $arquivo = "usuarios.json";

    // Inicializa um array vazio para armazenar os usuários
    $usuarios = [];

    // Se o arquivo já existe, lê os dados atuais
    if (file_exists($arquivo)) {
        $dadosJson = file_get_contents($arquivo);
        $usuarios = json_decode($dadosJson, true) ?? [];
    }

    // Verifica se o email já está cadastrado
    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            echo "Erro: Este email já está cadastrado!";
            exit; // Para a execução do script
        }
    }

    // Gera um hash seguro da senha
    $senhaHash = password_hash($password, PASSWORD_DEFAULT);

    // Cria um array com os dados do novo usuário
    $novoUsuario = [
        "email" => $email,
        "senha" => $senhaHash
    ];

    // Adiciona o novo usuário à lista
    $usuarios[] = $novoUsuario;

    // Salva os dados atualizados no JSON
    if (file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT))) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    echo "Por favor, preencha todos os campos!";
}
?>
