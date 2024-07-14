document.addEventListener("DOMContentLoaded", function () {
  const sortLowToHighButton = document.getElementById("sort-low-to-high");
  const sortHighToLowButton = document.getElementById("sort-high-to-low");
  const productContainer = document.querySelector(".shop_section .row");
  const initialProducts = Array.from(productContainer.querySelectorAll(".col-sm-3.col-md-3.col-lg-4"));
  
  

  document.getElementById('openPopup').addEventListener('click', function() {
      document.getElementById('popup').style.display = 'flex';
      console.log("Popup opened");
  });
  
  document.getElementById('closePopup').addEventListener('click', function() {
      document.getElementById('popup').style.display = 'none'; 
      productContainer.innerHTML = "";
      initialProducts.forEach(product => {
          productContainer.appendChild(product);
      });
      
  });

  sortLowToHighButton.addEventListener("click", function () {
      sortProducts(true);
  });

  sortHighToLowButton.addEventListener("click", function () {
      sortProducts(false);
  });

  function sortProducts(ascending) {
      const products = Array.from(productContainer.querySelectorAll(".col-sm-3.col-md-3.col-lg-4"));

      const sortedProducts = products
          .map(product => {
              const priceElement = product.querySelector(".product-price");
              const price = parseFloat(priceElement.textContent.replace(" Ron", ""));
              return { element: product, price: price };
          })
          .sort((a, b) => ascending ? a.price - b.price : b.price - a.price);

      productContainer.innerHTML = "";

      sortedProducts.forEach(product => {
          productContainer.appendChild(product.element);
      });
  }
});
