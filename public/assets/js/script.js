AOS.init({
    duration: 1200,
});

// add to cart
async function addToCart(menuId) {
    try {
        const response = await axios.post("/addToCart", {
            // Declare 'response'
            menu_id: menuId,
        });

        alert(response.data.message || "Item added to cart!");
        alert("Cart updated:", response.data);
    } catch (error) {
        console.error("Full error:", error.response); // Log full error details
        alert("Error: " + (error.response?.data?.message || error.message));
    }
}

//update cart

//delete cart
 



function cartComponent() {
    return {
        sidebarIsOpen: false,
        updatingItems: {}, // Track items being updated

        cart: null,
        loading: true,
        total: 0,
        itemCount: 0,
        autoIncrement:0,
        // Methods
        openCart() {
            this.sidebarIsOpen = true;
            this.fetchCart();
        },

        async  fetchCart() {
          const response = await axios.get("/viewCart");
          this.cart = response.data.cart;
          this.loading = false;

          // Update item count
        this.itemCount = this.cart.menus.reduce((count, item) => {
            return count + item.pivot.quantity;
        }, 0);
        //   alert(JSON.stringify(this.cart))
           console.log(JSON.stringify(this.cart));
          },
        calculateTotals() {
            this.total = this.cartItems.reduce((sum, item) => {
                return sum + item.price * item.pivot.quantity;
            }, 0);

            this.itemCount = this.cartItems.reduce((count, item) => {
                return count + item.pivot.quantity;
            }, 0);
        },

   async updateQuantity(item, change) {
           
           const newQuantity = item.pivot.quantity + change;
           if (newQuantity < 1) return;
           this.updatingItems[item.id] = true;

            try {
             const response = await axios.patch(`/updateCart/${item.id}`, {
             quantity: newQuantity,
             menu_id: item.id  // Add this line to send menu_id
            });
        
        // Update local state with the response data
       
             this.cart = response.data.cart;
             this.total = this.cart.total;
        
        // Update item count
            this.itemCount = this.cart.menus.reduce((count, item) => {
            return count + item.pivot.quantity;
        }, 0);
    } catch (error) {
        console.error("Error updating quantity:", error);
    }
},
      async removeItem(itemId) {
    try {
        const response = await axios.delete(`/deleteCart/${itemId}`, {
            data: { menu_id: itemId } // Ensure menu_id is sent
        });
        
        // Update from server response instead of local filtering
        this.cart = response.data.cart;
        this.total = response.data.cart.total;
        this.itemCount = this.cart.menus.reduce(
            (count, item) => count + item.pivot.quantity, 
            0
        );
        
    } catch (error) {
        console.error("Error removing item:", error);
        // Optional: Show error to user
    }
},
    };
}
