// open cart modal
const cart = document.querySelector('#cart');
const cartModalOverlay = document.querySelector('.cart-modal-overlay');

cart.addEventListener('click', () => {
  if (cartModalOverlay.style.transform === 'translateX(-200%)') {
    cartModalOverlay.style.transform = 'translateX(0)';
  } else {
    cartModalOverlay.style.transform = 'translateX(-200%)';
  }
});
// end of open cart modal

// close cart modal
const closeBtn = document.querySelector('#close-btn');

closeBtn.addEventListener('click', () => {
  cartModalOverlay.style.transform = 'translateX(-200%)';
});

cartModalOverlay.addEventListener('click', (e) => {
  if (e.target.classList.contains('cart-modal-overlay')) {
    cartModalOverlay.style.transform = 'translateX(-200%)';
  }
});
// end of close cart modal

// add products to cart
const addToCartButtons = document.getElementsByClassName('add-to-cart');

for (let i = 0; i < addToCartButtons.length; i++) {
  const button = addToCartButtons[i];
  button.addEventListener('click', addToCartClicked);
}

function addToCartClicked(event) {
  const button = event.target;
  const cartItem = button.closest('.card'); 
  const name = cartItem.querySelector('.product-name').innerText; 
  const price = cartItem.querySelector('.product-price').innerText;
  const imageSrc = cartItem.querySelector('.product-image').src; 



  addItemToCart(name, price, imageSrc);
  updateCartPrice();
}

function addItemToCart(name, price, imageSrc) {
  const productRows = document.querySelector('.product-rows'); 
  const cartImage = document.querySelectorAll('.cart-image'); 

  // Check if the item already exists in the cart
  for (let i = 0; i < cartImage.length; i++) {
    if (cartImage[i].src === imageSrc) {
      alert('This item has already been added to the cart');
      return;
    }
  }

  const productRow = document.createElement('div');
  productRow.classList.add('product-row');
  
  const cartRowItems = `
      <img class="cart-image" src="${imageSrc}" alt="">
      <span class="cart-name">${name}</span> <!-- Add the product name here -->
      <span class="cart-price">${price}</span>
      <input class="product-quantity" type="number" value="1">
      <button class="remove-btn">Șterge</button>
  `;

  productRow.innerHTML = cartRowItems;
  productRows.append(productRow);
  

  productRow.querySelector('.remove-btn').addEventListener('click', removeItem); 
  productRow.querySelector('.product-quantity').addEventListener('change', changeQuantity); 
  updateCartPrice();
}

// end of add products to cart

// Remove products from cart
function removeItem(event) {
  const btnClicked = event.target;
  btnClicked.closest('.product-row').remove(); 
  updateCartPrice();
}

// update quantity input
function changeQuantity(event) {
  const input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartPrice();
}
// end of update quantity input

// update total price
function updateCartPrice() {
  let total = 0;
  const productRows = document.getElementsByClassName('product-row'); 
  
  // Loop through each product row to calculate the total price
  for (let i = 0; i < productRows.length; i++) {
    const cartRow = productRows[i];
    const priceElement = cartRow.querySelector('.cart-price'); 
    const quantityElement = cartRow.querySelector('.product-quantity'); 
    const price = parseFloat(priceElement.innerText.replace(' Ron', ''));
    const quantity = quantityElement.value;
    total += (price * quantity);
  }
  
  // Update the total price and item count in the cart
  document.querySelector('.total-price').innerText = total + ' Ron';
  document.querySelector('.cart-quantity').textContent = productRows.length;
}
// end of update total price

// purchase items
const purchaseBtn = document.querySelector('.purchase-btn');

purchaseBtn.addEventListener('click', purchaseBtnClicked);

function purchaseBtnClicked() {
  alert('Thank you for your purchase');
  cartModalOverlay.style.transform = 'translateX(-100%)';
  const cartItems = document.querySelector('.product-rows'); 
  while (cartItems.hasChildNodes()) {
    cartItems.removeChild(cartItems.firstChild);
  }
  updateCartPrice();
}

// Ensure the cart structure is correct and only contains one .product-rows element
document.addEventListener('DOMContentLoaded', () => {
  const productRowsContainer = document.querySelector('.product-rows');
  if (!productRowsContainer) {
    const newProductRowsContainer = document.createElement('div');
    newProductRowsContainer.classList.add('product-rows');
    document.querySelector('.cart-modal').appendChild(newProductRowsContainer);
  }
});
