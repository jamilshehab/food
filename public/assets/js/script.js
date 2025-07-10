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

 async function removeItem(menuId) {
    let confirm=prompt("Do You Want to Delete Your Cart");
    try {
    if(confirm =="yes"){
      await axios.delete(`/deleteCart/${menuId}`);
      alert(`menu item deleted ${menuId}`);
    }
    else {
      return;
    }
    } catch (error) {
        alert("error found " , error);
    }
}