document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o reload da página

        let formData = new FormData(this); // Coleta os dados do formulário

        fetch('bd.php', { // Confirme se o nome do arquivo PHP está correto
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Exibe a resposta do PHP
        })
        .catch(error => console.error('Erro:', error));
    });
});
