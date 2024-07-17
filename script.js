// recommended.js
document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-btn');

    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            // Kirim data like ke server menggunakan AJAX atau fetch
            fetch('like.php', {
                method: 'POST',
                body: JSON.stringify({ productId: productId }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle response from server if needed
                console.log('Liked product ID:', productId);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
