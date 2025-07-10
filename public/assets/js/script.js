AOS.init({
    duration: 1200,
});

 
// add to cart
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

//update cart



//delete cart 

  async function removeItem(id) {
    let confirmDelete = prompt("Do You Want to Delete Your Cart Item? Type 'yes' to confirm");
    
    try {
        if (confirmDelete?.toLowerCase() === "yes") {
            const response = await axios.delete(`/deleteCart/${id}`);
            
            if (response.data.success) {
                alert(`Menu item deleted successfully! New total: $${response.data.newTotal}`);
                // Optional: Refresh the cart or update the UI
                window.location.reload(); // or update the cart dynamically
            } else {
                alert('Failed to delete item: ' + (response.data.message || 'Unknown error'));
            }
        }
    } catch (error) {
        console.error('Error deleting item:', error);
        alert('Error deleting item: ' + 
              (error.response?.data?.message || 
               error.message || 
               'Something went wrong'));
    }
}

async function getItems(){
  const response = await axios.get('/viewCart');
  alert(JSON.stringify(response.data.cart));
}