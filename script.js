function likeProduct(productId) {
    let likedProducts = JSON.parse(localStorage.getItem('likedProducts')) || [];
    
    if (!likedProducts.includes(productId)) {
        likedProducts.push(productId);
        localStorage.setItem('likedProducts', JSON.stringify(likedProducts));
        alert('Product liked!');
    } else {
        alert('You already liked this product.');
    }
}

function getLikedProducts() {
    return JSON.parse(localStorage.getItem('likedProducts')) || [];
}
