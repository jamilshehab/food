AOS.init({
    duration: 1200,
});

function addToCart(menuId) {
    // Show loading state (optional)
    const button = event.target;
    button.disabled = true;
    button.textContent = 'Adding...';
    
    // Make the Axios request
    axios.post('/addToCart', {
        menu_id: menuId,
        quantity: 1 // You can modify this if you have quantity selection
    })
    .then(response => {
        // Success handling
        button.textContent = 'Added!';
        
        // Optional: Update cart counter in your UI
        if (response.data.cart_count) {
            document.getElementById('cart-count').textContent = response.data.cart_count;
        }
        
        // Reset button after a delay
        setTimeout(() => {
            button.textContent = 'Add To Cart';
            button.disabled = false;
        }, 1500);
    })
    .catch(error => {
        // Error handling
        console.error('Error adding to cart:', error);
        button.textContent = 'Failed, Try Again';
        button.disabled = false;
    });
} 