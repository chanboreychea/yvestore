/* header sticky */

const nav = document.querySelector(".nav");

window.addEventListener("scroll", function () {

  window.scrollY >= 100 ? nav.classList.add("active") : nav.classList.remove("active");

});







