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

async function removeItem(id) {
    let confirmDelete = prompt(
        "Do You Want to Delete Your Cart Item? Type 'yes' to confirm"
    );

    try {
        if (confirmDelete?.toLowerCase() === "yes") {
            const response = await axios.delete(`/deleteCart/${id}`);

            if (response.data.success) {
                alert(
                    `Menu item deleted successfully! New total: $${response.data.newTotal}`
                );
                // Optional: Refresh the cart or update the UI
                window.location.reload(); // or update the cart dynamically
            } else {
                alert(
                    "Failed to delete item: " +
                        (response.data.message || "Unknown error")
                );
            }
        }
    } catch (error) {
        console.error("Error deleting item:", error);
        alert(
            "Error deleting item: " +
                (error.response?.data?.message ||
                    error.message ||
                    "Something went wrong")
        );
    }
}

async function getItems() {
    const response = await axios.get("/viewCart");
    alert(JSON.stringify(response.data.cart));
}

function cartComponent() {
    return {
        sidebarIsOpen: false,
        cartItems: [],
        loading: true,
        total: 0,
        itemCount: 0,

        // Methods
        openCart() {
            this.sidebarIsOpen = true;
            this.fetchCart();
        },

        async fetchCart() {
            this.loading = true;
            try {
                const response = await axios.get("/viewCart");
                this.cartItems = response.data.cart.items || [];
                this.calculateTotals();
            } catch (error) {
                console.error("Error fetching cart:", error);
                // Optionally show error to user
            }
            this.loading = false;
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

            try {
                await axios.patch(`/cart/${item.id}`, {
                    quantity: newQuantity,
                });
                item.pivot.quantity = newQuantity;
                this.calculateTotals();
            } catch (error) {
                console.error("Error updating quantity:", error);
            }
        },

        async removeItem(itemId) {
            try {
                await axios.delete(`/cart/${itemId}`);
                this.cartItems = this.cartItems.filter(
                    (item) => item.id !== itemId
                );
                this.calculateTotals();
            } catch (error) {
                console.error("Error removing item:", error);
            }
        },
    };
}
