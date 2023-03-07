/* header sticky */

const nav = document.querySelector(".nav");

window.addEventListener("scroll", function () {

  window.scrollY >= 100 ? nav.classList.add("active") : nav.classList.remove("active");

});

//onchange amount number
var cookieValue = document.getElementById("price").value;

jQuery(function ($) {

  $('#num').on('input', function () {
    $('#amountt').text(($('#num').val()) * (cookieValue) +"$");
    $('input[name="amount"]').val(($('#num').val()) * (cookieValue));
    $('input[name="qty"]').val($(this).val());
  });
});

// $('input[name="name"]').change(function() {
//   $('input[name="firstname"]').val($(this).val());
// });









