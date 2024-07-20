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

// add products to cart
const addToCartButtons = document.getElementsByClassName('add-to-cart');

for (let i = 0; i < addToCartButtons.length; i++) {
  addToCartButtons[i].addEventListener('click', addToCartClicked);
}

function addToCartClicked(event) {
  const button = event.target;
  const cartItem = button.closest('.card');
  const name = cartItem.querySelector('.product-name').innerText;
  const price = cartItem.querySelector('.product-price').innerText;
  const imageSrc = cartItem.querySelector('.product-image').src;

  addItemToCart(name, price, imageSrc);
}

function addItemToCart(name, price, imageSrc) {
  const productRows = document.querySelector('.product-rows');
  const cartImages = document.querySelectorAll('.cart-image');

  for (let i = 0; i < cartImages.length; i++) {
    if (cartImages[i].src === imageSrc) {
      alert('This item has already been added to the cart');
      return;
    }
  }

  const productRow = document.createElement('div');
  productRow.classList.add('product-row');

  const cartRowItems = `
      <img class="cart-image" src="${imageSrc}" alt="">
      <span class="cart-name">${name}</span>
      <span class="cart-price">${price}</span>
      <input class="product-quantity" type="number" value="1">
      <button class="remove-btn">Șterge</button>
  `;

  productRow.innerHTML = cartRowItems;
  productRows.appendChild(productRow);

  productRow.querySelector('.remove-btn').addEventListener('click', removeItem);
  productRow.querySelector('.product-quantity').addEventListener('change', changeQuantity);
  updateCartPrice();
}

// Remove products from cart
function removeItem(event) {
  const btnClicked = event.target;
  btnClicked.closest('.product-row').remove();
  updateCartPrice();
}

// Update quantity input
function changeQuantity(event) {
  const input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartPrice();
}

// Promo code functionality
const promoCodeInput = document.getElementById('promo-code');
const applyPromoBtn = document.getElementById('apply-promo');
let discount = 0;

applyPromoBtn.addEventListener('click', applyPromoCode);

function applyPromoCode() {
  const promoCode = promoCodeInput.value.trim();
  const validPromoCode = 'Family'; // Example promo code

  if (promoCode === validPromoCode) {
    discount = 0.5;
    document.getElementById('discount-message').innerText = `Cod Promoțional Activat: ${(discount * 100).toFixed(2)}%`;
  } else {
    discount = 0;
    document.getElementById('discount-message').innerText = 'Cod promoțional invalid';
  }
  updateCartPrice();
}

// Update total price
function updateCartPrice() {
  let total = 0;
  const productRows = document.querySelectorAll('.product-row');

  productRows.forEach(row => {
    const priceElement = row.querySelector('.cart-price');
    const quantityElement = row.querySelector('.product-quantity');
    const price = parseFloat(priceElement.innerText.replace(' Ron', ''));
    const quantity = quantityElement.value;
    total += (price * quantity);
  });

  total = total * (1 - discount);

  document.querySelector('.total-price').innerText = total.toFixed(2) + ' Ron';
  document.querySelector('.cart-quantity').textContent = productRows.length;
}

// Purchase items
const purchaseBtn = document.querySelector('.purchase-btn');

purchaseBtn.addEventListener('click', purchaseBtnClicked);

function purchaseBtnClicked() {
  const cartItems = document.querySelector('.product-rows');
  if (cartItems.children.length === 0) {
    alert('Coșul este Gol');
    return;
  }
  const totalPrice = document.querySelector('.total-price').innerText;
  while (cartItems.firstChild) {
    cartItems.removeChild(cartItems.firstChild);
  }
  updateCartPrice();
  window.location.href = `adress.php?total=${encodeURIComponent(totalPrice)}`;
}

// Confirm order function for address page
function confirmOrder() {
  const city = document.getElementById('city').value.trim();
  const county = document.getElementById('county').value.trim();
  const address = document.getElementById('address').value.trim();
  const totalPrice = new URLSearchParams(window.location.search).get('total');

  if (city && county && address) {
    alert(`Comanda Confirmată! Gogoșile tale vor fi trimise la adresa: ${address}, ${city}, ${county}. Total de plată: ${totalPrice}`);
    document.getElementById('orderForm').reset(); // Clear the form
    window.location.href = 'shop.php';
  } else {
    alert('Te rog completează toate câmpurile.');
  }
}
