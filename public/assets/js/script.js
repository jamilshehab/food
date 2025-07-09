AOS.init({
    duration: 1200,
});

 

  async function addToCart(menuId) {
    try {
        const response = await axios.post('/addToCart', {  // Declare 'response'
            menu_id: menuId,
          
        });

        alert(response.data.message || 'Item added to cart!');
        alert("Cart updated:", response.data);
        
       
    } catch (error) {
        console.error('Full error:', error.response);  // Log full error details
        alert("Error: " + (error.response?.data?.message || error.message));
    }
}