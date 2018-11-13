//add pictures/icons to the dropdown list *Materialize*
document.addEventListener('DOMContentLoaded', function() {
  let elems = document.querySelectorAll('select');
  let instances = M.FormSelect.init(elems);
});

//remove error spansvar passwordInput =  document.getElementById("password");
window.onload = function() {
  let prodCodeErr = document.getElementById('prodCodeErr');
  let productCode = document.getElementById('product-code');

  function removeProdCodeErrError() {
    if (prodCodeErr !== null) {
      prodCodeErr.parentNode.removeChild(prodCodeErr);
    }
  }

  productCode.addEventListener('focus', removeProdCodeErrError);
};
