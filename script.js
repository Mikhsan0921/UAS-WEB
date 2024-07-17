document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-button');

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
                if (data.success) {
                    alert('Product liked successfully!');
                    // Contoh: Memperbarui UI jika diperlukan
                } else {
                    alert('Failed to like product: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while liking the product.');
            });
        });
    });
});
