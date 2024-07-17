document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.add-to-mystyle');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const link = this.getAttribute('data-link');
            const image = this.getAttribute('data-image');
            const price = this.getAttribute('data-price');
            const description = this.getAttribute('data-description');

            // Send data to server
            fetch('add_to_mystyle.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    link: link,
                    image: image,
                    price: price,
                    description: description
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Added to MyStyle successfully!');
                } else {
                    alert('Failed to add to MyStyle.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});