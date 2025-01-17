
document.addEventListener("DOMContentLoaded", () => {
  const cartTable = document.querySelector("table");
  const subtotalElement = document.querySelector(".subtotal .price");
  const quantityInputs = cartTable.querySelectorAll('input[type="number"]');
  const removeLinks = cartTable.querySelectorAll(".remove");

  
  quantityInputs.forEach((input) => {
      input.addEventListener("input", () => {
          const row = input.closest("tr");
          const priceElement = row.querySelector(".price");
          const price = parseFloat(row.querySelector(".price").textContent.replace("$", ""));
          const quantity = parseInt(input.value);

       
          const totalElement = row.querySelectorAll(".price")[1];
          totalElement.textContent = `$${(price * quantity).toFixed(2)}`;

   
          updateSubtotal();
      });
  });


  removeLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
          event.preventDefault();
          const row = link.closest("tr");
          row.remove();

      
          updateSubtotal();
      });
  });


  function updateSubtotal() {
      const totalElements = cartTable.querySelectorAll("tbody tr .price:last-child");
      let subtotal = 0;

      totalElements.forEach((totalElement) => {
          subtotal += parseFloat(totalElement.textContent.replace("$", ""));
      });

      subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
  }
});
