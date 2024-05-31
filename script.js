let cart = [];
let total = 0;

function addToCart(productId) {
  // Simulated product details
  const product = {
    id: productId,
    name: `Product ${productId}`,
    price: productId === 1 ? 25.00 : 15.00
  };
  
  cart.push(product);
  total += product.price;
  
  updateCart();
}

function updateCart() {
  const cartElement = document.getElementById('cart-items');
  const totalElement = document.getElementById('cart-total');
  
  cartElement.innerHTML = '';
  
  cart.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name} - ₱${item.price.toFixed(2)}`;
    cartElement.appendChild(li);
  });
  
  totalElement.textContent = total.toFixed(2);
}

function checkout() {
  alert('Thank you for shopping with us!');
  cart = [];
  total = 0;
  updateCart();
}
