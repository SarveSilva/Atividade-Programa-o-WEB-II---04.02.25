document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);


    fetch('save_data.php', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => console.error('Erro:', error));
});
