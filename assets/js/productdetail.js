function increaseQuantity() {
    var quantityInput = document.getElementById("quantity_data");
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
}

// Function to decrease the quantity
function decreaseQuantity() {
    var quantityInput = document.getElementById("quantity_data");
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}
