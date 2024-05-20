document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const message = document.getElementById('message').value;

        fetch('contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                name: name,
                email: email,
                phone: phone,
                message: message
            })
        })
        .then(response => response.text())
        .then(data => {
            if (data === "Mensaje enviado correctamente") {
                alert(data);
                document.getElementById('name').value = ' ';
                document.getElementById('email').value = ' ';
                document.getElementById('phone').value = ' ';
                document.getElementById('message').value = ' ';
            } else {
                alert('Error al enviar el mensaje.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
